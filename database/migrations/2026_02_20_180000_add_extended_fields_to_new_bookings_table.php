<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('new_bookings', function (Blueprint $table) {
            $table->boolean('has_delivery_address')->default(false);
            $table->string('delivery_first_name')->nullable();
            $table->string('delivery_last_name')->nullable();
            $table->string('delivery_street')->nullable();
            $table->string('delivery_house_number')->nullable();
            $table->string('delivery_postal_code', 30)->nullable();
            $table->string('delivery_city')->nullable();
            $table->text('customer_signature')->nullable();
            $table->text('tax_signature')->nullable();
            $table->text('poa_signature')->nullable();
            $table->boolean('needs_emission_sticker')->default(false);
            $table->boolean('five_day_registration')->default(false);
            $table->string('evb_number')->nullable();
            $table->string('iban')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('new_bookings', function (Blueprint $table) {
            $table->dropColumn([
                'has_delivery_address',
                'delivery_first_name',
                'delivery_last_name',
                'delivery_street',
                'delivery_house_number',
                'delivery_postal_code',
                'delivery_city',
                'customer_signature',
                'tax_signature',
                'poa_signature',
                'needs_emission_sticker',
                'five_day_registration',
                'evb_number',
                'iban',
            ]);
        });
    }
};
