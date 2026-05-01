<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('partner_logos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo_path');
            $table->timestamps();
        });

        Schema::table('orders', function (Blueprint $table) {
            if (!Schema::hasColumn('orders', 'partner_logo_id')) {
                $table->foreignId('partner_logo_id')
                    ->nullable()
                    ->after('pdf_with_partner_logo')
                    ->constrained('partner_logos')
                    ->nullOnDelete();
            }
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            if (Schema::hasColumn('orders', 'partner_logo_id')) {
                $table->dropConstrainedForeignId('partner_logo_id');
            }
        });

        Schema::dropIfExists('partner_logos');
    }
};
