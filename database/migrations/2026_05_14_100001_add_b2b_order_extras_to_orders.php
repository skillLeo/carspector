<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddB2bOrderExtrasToOrders extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            if (!Schema::hasColumn('orders', 'soh_check')) {
                $table->boolean('soh_check')->default(false)->after('b2b_special_notes');
            }
            if (!Schema::hasColumn('orders', 'b2b_vehicle_country')) {
                $table->string('b2b_vehicle_country')->nullable()->after('soh_check');
            }
            if (!Schema::hasColumn('orders', 'b2b_cancel_requested')) {
                $table->boolean('b2b_cancel_requested')->default(false)->after('b2b_vehicle_country');
            }
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['soh_check', 'b2b_vehicle_country', 'b2b_cancel_requested']);
        });
    }
}
