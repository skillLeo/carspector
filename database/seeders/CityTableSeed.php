<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CityTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $contents = File::get(public_path('cities.json'));
        $json = json_decode($contents);
        foreach ($json as $ct){
            $city=new City();
                $city->name = $ct->name;
                $city->zip_code = mt_rand(100000,999999);
                $city->save();
        }

    }
}
