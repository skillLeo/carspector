<?php

use Illuminate\Database\Migrations\Migration;
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
                    $orderNumber = 'CS-' . $year . '-' . str_pad((string) $order->id, 5, '0', STR_PAD_LEFT);

                    DB::table('orders')
                        ->where('id', $order->id)
                        ->update(['orderno' => $orderNumber]);
                }
            });
    }

    public function down(): void
    {
        if (!Schema::hasTable('orders') || !Schema::hasColumn('orders', 'orderno')) {
            return;
        }

        DB::table('orders')
            ->where('orderno', 'like', 'CS-%')
            ->update(['orderno' => null]);
    }
};
