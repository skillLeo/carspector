<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('examination_images', function (Blueprint $table) {
            if (!Schema::hasColumn('examination_images', 'sort_order')) {
                $table->unsignedInteger('sort_order')->nullable()->index();
            }
        });
    }

    public function down(): void
    {
        Schema::table('examination_images', function (Blueprint $table) {
            if (Schema::hasColumn('examination_images', 'sort_order')) {
                $table->dropColumn('sort_order');
            }
        });
    }
};

