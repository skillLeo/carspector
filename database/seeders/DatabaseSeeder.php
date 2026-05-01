<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
    $this->call(UserTableSeed::class);
        $this->call(CityTableSeed::class);
    $this->call(ExaminerSeed::class);
    $this->call(ExaminerFakeSeed::class);
    $this->call(ReviewSeed::class);
    $this->call(SettingSeed::class);
    $this->call(ExaminerCitySeed::class);

    }
}
