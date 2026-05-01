<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            if (!Schema::hasColumn('orders', 'pdf_with_partner_logo')) {
                $table->boolean('pdf_with_partner_logo')->default(false)->after('document_in_english');
            }
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            if (Schema::hasColumn('orders', 'pdf_with_partner_logo')) {
                $table->dropColumn('pdf_with_partner_logo');
            }
        });
    }
};
