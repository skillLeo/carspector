<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
           $table->unsignedBigInteger('user_id')->nullable();
           $table->unsignedBigInteger('examiner_id')->nullable();
            $table->string('orderno')->nullable();
            $table->timestamp('date_time')->nullable();
           $table->time('time')->nullable();
           $table->string('brand')->nullable();
           $table->date('date')->nullable();
           $table->string('vehicle_make_model')->nullable();
           $table->string('make_year')->nullable();
           $table->string('link')->nullable();
           $table->text('desc')->nullable();
           $table->string('inspection_address')->nullable();
           $table->string('street')->nullable();
           $table->string('house_no')->nullable();
           $table->string('postal_code')->nullable();
           $table->string('city')->nullable();
           $table->string('addition')->nullable();
           $table->string('phone')->nullable();
           $table->string('price')->nullable();
           $table->enum('payment_type',['stripe','card','paypal','bank'])->nullable();
           $table->double('commission')->nullable();
           $table->double('total_amount')->nullable();
           $table->boolean('cleared')->default(0)->nullable();
           $table->timestamp('cleared_at')->nullable();
            $table->enum('status',['active','inactive','visited','inspecting','processing','completed'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
