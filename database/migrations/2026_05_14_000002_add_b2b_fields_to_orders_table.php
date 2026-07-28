<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // b2b_partner_id already exists from a previous migration — skip if present
            if (!Schema::hasColumn('orders', 'order_source')) {
                $table->enum('order_source', ['b2c', 'b2b'])->default('b2c')->after('order_type');
            }
            if (!Schema::hasColumn('orders', 'b2b_logo_path')) {
                $table->string('b2b_logo_path')->nullable()->after('order_source');
            }
            if (!Schema::hasColumn('orders', 'b2b_contact_person')) {
                $table->string('b2b_contact_person')->nullable()->after('b2b_logo_path');
            }
            if (!Schema::hasColumn('orders', 'b2b_contact_phone')) {
                $table->string('b2b_contact_phone')->nullable()->after('b2b_contact_person');
            }
            if (!Schema::hasColumn('orders', 'b2b_vehicle_location')) {
                $table->text('b2b_vehicle_location')->nullable()->after('b2b_contact_phone');
            }
            if (!Schema::hasColumn('orders', 'b2b_special_notes')) {
                $table->text('b2b_special_notes')->nullable()->after('b2b_vehicle_location');
            }
            if (!Schema::hasColumn('orders', 'b2b_order_email_sent_at')) {
                $table->timestamp('b2b_order_email_sent_at')->nullable()->after('b2b_special_notes');
            }
            if (!Schema::hasColumn('orders', 'b2b_order_email_log')) {
                $table->text('b2b_order_email_log')->nullable()->after('b2b_order_email_sent_at');
            }
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            foreach ([
                'b2b_order_email_log',
                'b2b_order_email_sent_at',
                'b2b_special_notes',
                'b2b_vehicle_location',
                'b2b_contact_phone',
                'b2b_contact_person',
                'b2b_logo_path',
                'order_source',
            ] as $col) {
                if (Schema::hasColumn('orders', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
