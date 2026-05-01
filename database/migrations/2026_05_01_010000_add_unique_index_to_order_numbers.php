<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable('orders') || !Schema::hasColumn('orders', 'orderno')) {
            return;
        }

        DB::table('orders')
            ->where(function ($query) {
                $query->whereNull('orderno')->orWhere('orderno', '');
            })
            ->orderBy('id')
            ->chunkById(500, function ($orders) {
                foreach ($orders as $order) {
                    $year = $order->created_at ? date('Y', strtotime($order->created_at)) : date('Y');

                    DB::table('orders')
                        ->where('id', $order->id)
                        ->update(['orderno' => static::formatOrderNumber($year, $order->id)]);
                }
            });

        DB::table('orders')
            ->select('orderno')
            ->whereNotNull('orderno')
            ->where('orderno', '!=', '')
            ->groupBy('orderno')
            ->havingRaw('COUNT(*) > 1')
            ->orderBy('orderno')
            ->chunk(200, function ($duplicates) {
                foreach ($duplicates as $duplicate) {
                    $orders = DB::table('orders')
                        ->where('orderno', $duplicate->orderno)
                        ->orderBy('id')
                        ->get();

                    $keepFirst = true;

                    foreach ($orders as $order) {
                        if ($keepFirst) {
                            $keepFirst = false;
                            continue;
                        }

                        $year = $order->created_at ? date('Y', strtotime($order->created_at)) : date('Y');

                        DB::table('orders')
                            ->where('id', $order->id)
                            ->update(['orderno' => static::formatOrderNumber($year, $order->id)]);
                    }
                }
            });

        Schema::table('orders', function (Blueprint $table) {
            $table->unique('orderno', 'orders_orderno_unique');
        });
    }

    public function down(): void
    {
        if (!Schema::hasTable('orders') || !Schema::hasColumn('orders', 'orderno')) {
            return;
        }

        Schema::table('orders', function (Blueprint $table) {
            $table->dropUnique('orders_orderno_unique');
        });
    }

    private static function formatOrderNumber(string $year, int $id): string
    {
        return 'CS-' . $year . '-' . str_pad((string) $id, 5, '0', STR_PAD_LEFT);
    }
};
