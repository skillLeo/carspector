<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('order_damage_summaries', function (Blueprint $table) {
            if (!Schema::hasColumn('order_damage_summaries', 'market_average_cost')) {
                $table->decimal('market_average_cost', 12, 2)->nullable()->after('selling_price');
            }
        });
    }

    public function down(): void
    {
        Schema::table('order_damage_summaries', function (Blueprint $table) {
            if (Schema::hasColumn('order_damage_summaries', 'market_average_cost')) {
                $table->dropColumn('market_average_cost');
            }
        });
    }
};

