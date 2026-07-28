<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('inspector_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->foreignId('inspector_id')->constrained('inspectors')->cascadeOnDelete();
            $table->enum('status', ['pending', 'accepted', 'declined'])->default('pending');
            $table->text('email_body')->nullable();
            $table->timestamp('sent_at')->nullable();
            $table->timestamp('responded_at')->nullable();
            $table->timestamps();

            $table->unique(['order_id', 'inspector_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inspector_requests');
    }
};
