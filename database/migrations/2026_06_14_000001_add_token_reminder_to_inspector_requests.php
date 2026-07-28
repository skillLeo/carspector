<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTokenReminderToInspectorRequests extends Migration
{
    public function up()
    {
        Schema::table('inspector_requests', function (Blueprint $table) {
            $table->string('response_token', 64)->nullable()->unique()->after('email_body');
            $table->timestamp('reminder_sent_at')->nullable()->after('responded_at');
        });
    }

    public function down()
    {
        Schema::table('inspector_requests', function (Blueprint $table) {
            $table->dropColumn(['response_token', 'reminder_sent_at']);
        });
    }
}
