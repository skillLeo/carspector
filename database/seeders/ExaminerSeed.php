<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ExaminerSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Factory::create();

        $examiner=new User();
        $examiner->first_name='Examiner';
        $examiner->name='Examiner';
        $examiner->last_name='John';
        $examiner->email='examiner@gmail.com';
        $examiner->password=bcrypt('123456');
        $examiner->company_name='Carspector';
        $examiner->company_address="München street 2 house #110 ";
        $examiner->about_me='“Hello , my name is Ionut and my experience In cleaning is based on my own personal life.
As I grow up in a family that always likes to clean at our home , it was impregnated in my everyday tasks to clean , I can say that I accumulated some experience and skills in cleaning and that is now a part of my life , I don’t say it just me it says also the reviews that I have on my profile in Airbnb , every time I was traveling and renting one apartment, I was taking care and cleaning like it was my own';
   $examiner->experience_1='3 Jahre Kfz-Mechaniker bei VW';
   $examiner->experience_2='7 Jahre Sachverständiger';
   $examiner->experience_3='BMW Experte';
   $examiner->training_1='Ausbildung zum Kfz-Mechatroniker 2008';
   $examiner->training_2='Fortbildung zum Sachverständigen 2015';
   $examiner->price=199;
   $examiner->type='examiner';
   $examiner->save();

//   for ($i=0;$i<=200;$i++) {
//       $cities=City::all()->random(5)->pluck('id');
//       $examiner = new User();
//       $examiner->name=$faker->name;
//       $examiner->first_name = $faker->firstName;
//       $examiner->last_name = $faker->lastName;
//       $examiner->email = $faker->email;
//       $examiner->password = bcrypt('123456');
//       $examiner->company_name = $faker->company;
//       $examiner->company_address = $faker->address;
//       $examiner->about_me = '“Hello , my name is Ionut and my experience In cleaning is based on my own personal life.
//As I grow up in a family that always likes to clean at our home , it was impregnated in my everyday tasks to clean , I can say that I accumulated some experience and skills in cleaning and that is now a part of my life , I don’t say it just me it says also the reviews that I have on my profile in Airbnb , every time I was traveling and renting one apartment, I was taking care and cleaning like it was my own';
//       $examiner->experience_1 = '3 Jahre Kfz-Mechaniker bei VW';
//       $examiner->experience_2 = '7 Jahre Sachverständiger';
//       $examiner->experience_3 = 'BMW Experte';
//       $examiner->training_1 = 'Ausbildung zum Kfz-Mechatroniker 2008';
//       $examiner->training_2 = 'Fortbildung zum Sachverständigen 2015';
//       $examiner->price = $faker->numberBetween(199,10000);
//       $examiner->type = 'examiner';
//       $examiner->verify_status='verified';
//       $examiner->save();
//
//       $examiner->cities()->sync($cities);
//
//   }

    }
}
