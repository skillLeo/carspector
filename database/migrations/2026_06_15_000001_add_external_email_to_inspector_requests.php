<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        // Add a plain index on order_id so the FK constraint keeps its required index
        // after we drop the composite unique index below
        DB::statement('ALTER TABLE inspector_requests ADD INDEX idx_ir_order_id (order_id)');
        // Now safe to drop the composite unique index
        DB::statement('ALTER TABLE inspector_requests DROP INDEX inspector_requests_order_id_inspector_id_unique');
        // Make inspector_id nullable
        DB::statement('ALTER TABLE inspector_requests MODIFY inspector_id BIGINT UNSIGNED NULL');
        // Add external_email column
        DB::statement('ALTER TABLE inspector_requests ADD COLUMN external_email VARCHAR(255) NULL AFTER inspector_id');
    }

    public function down(): void
    {
        DB::statement('ALTER TABLE inspector_requests DROP COLUMN IF EXISTS external_email');
        DB::statement('ALTER TABLE inspector_requests MODIFY inspector_id BIGINT UNSIGNED NOT NULL');
        DB::statement('ALTER TABLE inspector_requests ADD UNIQUE inspector_requests_order_id_inspector_id_unique (order_id, inspector_id)');
        DB::statement('ALTER TABLE inspector_requests DROP INDEX IF EXISTS idx_ir_order_id');
    }
};
