<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('pdf_number')->nullable()->unique()->after('id');
        });

        // Backfill existing rows with unique random numbers
        $generate = function (): int {
            return random_int(10000000, 99999999); // 8-digit number
        };

        // Build a quick set of existing numbers to minimize queries
        $existing = DB::table('orders')->whereNotNull('pdf_number')->pluck('pdf_number')->all();
        $used = array_flip($existing);

        DB::table('orders')->whereNull('pdf_number')->orderBy('id')->chunkById(500, function ($rows) use (&$used, $generate) {
            foreach ($rows as $row) {
                do {
                    $num = $generate();
                } while (isset($used[$num]));
                $used[$num] = true;
                DB::table('orders')->where('id', $row->id)->update(['pdf_number' => $num]);
            }
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            if (Schema::hasColumn('orders', 'pdf_number')) {
                $table->dropUnique(['pdf_number']);
                $table->dropColumn('pdf_number');
            }
        });
    }
};

