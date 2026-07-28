<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('inspector_service_areas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inspector_id')->constrained('inspectors')->cascadeOnDelete();
            $table->enum('type', ['city', 'postal_range']);
            $table->string('city_name')->nullable();
            $table->string('postal_min', 10)->nullable();
            $table->string('postal_max', 10)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inspector_service_areas');
    }
};
