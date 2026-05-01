<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('order_damage_summaries', function (Blueprint $table) {
            if (!Schema::hasColumn('order_damage_summaries', 'remarks')) {
                $table->text('remarks')->nullable()->after('selling_price');
            }
            if (!Schema::hasColumn('order_damage_summaries', 'show_in_pdf')) {
                $table->boolean('show_in_pdf')->default(false)->after('remarks');
            }
        });
    }

    public function down(): void
    {
        Schema::table('order_damage_summaries', function (Blueprint $table) {
            if (Schema::hasColumn('order_damage_summaries', 'remarks')) {
                $table->dropColumn('remarks');
            }
            if (Schema::hasColumn('order_damage_summaries', 'show_in_pdf')) {
                $table->dropColumn('show_in_pdf');
            }
        });
    }
};
