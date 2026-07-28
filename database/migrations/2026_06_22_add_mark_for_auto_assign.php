<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('inspector_requests', function (Blueprint $table) {
            $table->boolean('mark_for_auto_assign')->default(false)->after('status');
            $table->timestamp('assignment_mail_sent_at')->nullable()->after('responded_at');
        });
    }

    public function down(): void
    {
        Schema::table('inspector_requests', function (Blueprint $table) {
            $table->dropColumn(['mark_for_auto_assign', 'assignment_mail_sent_at']);
        });
    }
};
