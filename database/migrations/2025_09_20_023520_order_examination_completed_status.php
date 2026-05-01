<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderExaminationCompletedStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_examinations', function (Blueprint $table) {
            $table->enum('status', ['pending', 'completed','draft','finished','finishing','completing'])->default('pending')->after('tires');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_examinations', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
