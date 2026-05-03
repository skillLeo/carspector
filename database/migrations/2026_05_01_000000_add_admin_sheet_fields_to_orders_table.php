<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            if (!Schema::hasColumn('orders', 'admin_order_date')) {
                $table->date('admin_order_date')->nullable()->after('orderno');
            }

            if (!Schema::hasColumn('orders', 'customer_name')) {
                $table->string('customer_name')->nullable()->after('email');
            }

            if (!Schema::hasColumn('orders', 'examiner_name')) {
                $table->string('examiner_name')->nullable()->after('examiner_id');
            }

            if (!Schema::hasColumn('orders', 'admin_status')) {
                $table->string('admin_status', 100)->nullable()->after('status');
            }

            if (!Schema::hasColumn('orders', 'completed_at')) {
                $table->timestamp('completed_at')->nullable()->after('admin_status');
            }

            if (!Schema::hasColumn('orders', 'paid_at')) {
                $table->timestamp('paid_at')->nullable()->after('completed_at');
            }
        });

        if (Schema::hasColumn('orders', 'admin_order_date')) {
            DB::table('orders')
                ->whereNull('admin_order_date')
                ->update(['admin_order_date' => DB::raw('DATE(COALESCE(date_time, created_at))')]);
        }

        if (Schema::hasColumn('orders', 'admin_status')) {
            DB::table('orders')
                ->whereNull('admin_status')
                ->update(['admin_status' => DB::raw("CASE
                    WHEN status = 'completed' THEN 'Completed'
                    WHEN status = 'inspecting' THEN 'Prüfung'
                    WHEN status = 'processing' THEN 'Prüfung'
                    WHEN status = 'visited' THEN 'Fertigstellung'
                    ELSE 'New'
                END")]);
        }

        if (Schema::hasColumn('orders', 'paid_at') && Schema::hasColumn('orders', 'cleared_at')) {
            DB::table('orders')
                ->whereNull('paid_at')
                ->whereNotNull('cleared_at')
                ->update(['paid_at' => DB::raw('cleared_at')]);
        }
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            foreach (['paid_at', 'completed_at', 'admin_status', 'examiner_name', 'customer_name', 'admin_order_date'] as $column) {
                if (Schema::hasColumn('orders', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
