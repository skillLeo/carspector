<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddOrderTypeToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            if (!Schema::hasColumn('orders', 'order_type')) {
                $table->string('order_type', 10)->default('B2C')->after('orderno');
            }

            if (!Schema::hasColumn('orders', 'b2b_partner_id')) {
                $table->unsignedBigInteger('b2b_partner_id')->nullable()->after('user_id');
                $table->index('b2b_partner_id');
            }
        });

        DB::table('orders')
            ->whereNull('order_type')
            ->orWhere('order_type', '')
            ->update(['order_type' => 'B2C']);
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            if (Schema::hasColumn('orders', 'b2b_partner_id')) {
                $table->dropIndex(['b2b_partner_id']);
                $table->dropColumn('b2b_partner_id');
            }

            if (Schema::hasColumn('orders', 'order_type')) {
                $table->dropColumn('order_type');
            }
        });
    }
}
