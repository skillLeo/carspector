<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvailibiltyTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('availibilty_times', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('examiner_id')->nullable();
            $table->unsignedBigInteger('availability_id')->nullable();
            $table->time('time')->nullable();
            $table->enum('status',['checked','unchecked'])->nullable();
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
        Schema::dropIfExists('availibilty_times');
    }
}
