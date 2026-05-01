<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\User;
use Illuminate\Database\Seeder;

class ExaminerCitySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $cities=City::all();
        foreach ($cities as $city){

            $examiners=User::where('type','examiner')->take(mt_rand(10,30))->get();
            $city->examiners()->attach($examiners);
        }
    }
}
