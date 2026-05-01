<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Add 'staff' to the allowed enum values for users.type
        DB::statement("ALTER TABLE users MODIFY COLUMN type ENUM('user','examiner','admin','partner','staff') NOT NULL DEFAULT 'user'");
    }

    public function down(): void
    {
        // Downgrade: convert existing 'staff' users to 'user' then remove value from enum
        DB::statement("UPDATE users SET type = 'user' WHERE type = 'staff'");
        DB::statement("ALTER TABLE users MODIFY COLUMN type ENUM('user','examiner','admin','partner') NOT NULL DEFAULT 'user'");
    }
};

