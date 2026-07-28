<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateB2bPartnerPricesTable extends Migration
{
    public function up()
    {
        Schema::create('b2b_partner_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('b2b_partner_id');
            $table->string('service_type');   // e.g. "Check XL", "Check XXL"
            $table->decimal('price', 8, 2);
            $table->timestamps();

            $table->foreign('b2b_partner_id')->references('id')->on('b2b_partners')->cascadeOnDelete();
            $table->unique(['b2b_partner_id', 'service_type']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('b2b_partner_prices');
    }
}
