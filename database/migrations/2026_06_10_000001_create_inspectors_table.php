<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('inspectors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('phone')->nullable();
            $table->enum('status', ['pending', 'active', 'inactive'])->default('pending');
            $table->string('invitation_token', 64)->nullable()->index();
            $table->timestamp('token_expires_at')->nullable();
            $table->timestamp('invitation_sent_at')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inspectors');
    }
};
