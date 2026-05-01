<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('order_damages', function (Blueprint $table) {
            if (!Schema::hasColumn('order_damages', 'remarks')) {
                $table->string('remarks')->nullable()->after('amount');
            }
//            $table->boolean('show_in_pdf')->default(false)->after('remarks');
        });
    }

    public function down(): void
    {
        Schema::table('order_damages', function (Blueprint $table) {
            if (Schema::hasColumn('order_damages', 'remarks')) {
                $table->dropColumn('remarks');
            }
//            $table->dropColumn('show_in_pdf');
        });
    }
};

