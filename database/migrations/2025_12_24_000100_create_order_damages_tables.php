<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_damages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->string('title');
            $table->string('cost_type')->nullable();
            $table->decimal('amount', 10, 2)->default(0);
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });

        Schema::create('order_damage_summaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->decimal('market_average', 12, 2)->nullable();
            $table->decimal('dat_value', 12, 2)->nullable();
            $table->decimal('selling_price', 12, 2)->nullable();
            $table->timestamps();
            $table->unique('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_damage_summaries');
        Schema::dropIfExists('order_damages');
    }
};

