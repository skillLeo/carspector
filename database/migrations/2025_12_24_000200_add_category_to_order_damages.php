<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('order_damages', function (Blueprint $table) {
            $table->string('category', 8)->default('upc')->after('title'); // dep, add, upc
        });
    }

    public function down(): void
    {
        Schema::table('order_damages', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }
};

