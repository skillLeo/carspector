<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('b2b_partners', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('logo_path')->nullable();
            $table->enum('status', ['pending', 'active', 'inactive'])->default('pending');
            $table->string('registration_token', 64)->nullable()->index();
            $table->timestamp('token_expires_at')->nullable();
            $table->timestamp('email_sent_at')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('b2b_partners');
    }
};
