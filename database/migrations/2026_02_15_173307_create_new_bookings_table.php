<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('street');
            $table->string('house_number');
            $table->string('postal_code');
            $table->string('city');
            $table->string('license_plate_type');
            $table->string('desired_license_plate')->nullable();
            $table->string('reservation_pin')->nullable();
            $table->boolean('is_seasonal')->default(false);
            $table->string('season_from_month')->nullable();
            $table->string('season_to_month')->nullable();
            $table->string('special_plate')->nullable();
            $table->string('status')->default('pending');
            $table->string('checkout_status')->nullable();
            $table->string('checkout_session_id')->nullable();
            $table->decimal('amount_eur', 8, 2)->nullable();
            $table->string('tax_rate_id')->nullable();
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
        Schema::dropIfExists('new_bookings');
    }
}
