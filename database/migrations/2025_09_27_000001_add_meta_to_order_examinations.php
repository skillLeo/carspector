<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('order_examinations', function (Blueprint $table) {
            $table->string('document_type')->nullable()->after('order_id');
            $table->string('examiner_name')->nullable()->after('document_type');
            $table->string('client_name')->nullable()->after('examiner_name');
        });
    }

    public function down(): void
    {
        Schema::table('order_examinations', function (Blueprint $table) {
            $table->dropColumn(['document_type','examiner_name','client_name']);
        });
    }
};

