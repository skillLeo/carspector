<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('order_examinations', function (Blueprint $table) {
            $table->text('serienausstattung')->nullable()->after('client_name');
            $table->text('sonderausstattung')->nullable()->after('serienausstattung');
        });
    }

    public function down(): void
    {
        Schema::table('order_examinations', function (Blueprint $table) {
            $table->dropColumn(['serienausstattung','sonderausstattung']);
        });
    }
};

