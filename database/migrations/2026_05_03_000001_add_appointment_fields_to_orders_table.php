<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            if (!Schema::hasColumn('orders', 'appointment_date')) {
                $table->date('appointment_date')->nullable()->after('paid_at');
            }

            if (!Schema::hasColumn('orders', 'appointment_time')) {
                $table->time('appointment_time')->nullable()->after('appointment_date');
            }
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            foreach (['appointment_time', 'appointment_date'] as $column) {
                if (Schema::hasColumn('orders', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
