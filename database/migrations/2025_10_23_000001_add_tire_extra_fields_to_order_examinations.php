<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('order_examinations', function (Blueprint $table) {
            if (!Schema::hasColumn('order_examinations', 'tire_extra')) {
                $table->string('tire_extra')->nullable()->after('tires');
            }
            if (!Schema::hasColumn('order_examinations', 'tire_extra_size')) {
                $table->string('tire_extra_size')->nullable()->after('tire_extra');
            }
            if (!Schema::hasColumn('order_examinations', 'tire_repair_expiry')) {
                $table->string('tire_repair_expiry')->nullable()->after('tire_extra_size');
            }
            if (!Schema::hasColumn('order_examinations', 'vehicle_tires_comment')) {
                $table->text('vehicle_tires_comment')->nullable()->after('tire_repair_expiry');
            }
        });
    }

    public function down(): void
    {
        Schema::table('order_examinations', function (Blueprint $table) {
            if (Schema::hasColumn('order_examinations', 'vehicle_tires_comment')) {
                $table->dropColumn('vehicle_tires_comment');
            }
            if (Schema::hasColumn('order_examinations', 'tire_repair_expiry')) {
                $table->dropColumn('tire_repair_expiry');
            }
            if (Schema::hasColumn('order_examinations', 'tire_extra_size')) {
                $table->dropColumn('tire_extra_size');
            }
            if (Schema::hasColumn('order_examinations', 'tire_extra')) {
                $table->dropColumn('tire_extra');
            }
        });
    }
};

