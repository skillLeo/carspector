<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Factory::create();
        $admin=new User();
        $admin->name='Admin';
        $admin->first_name='Admin';
        $admin->last_name='John';
        $admin->email='admin@gmail.com';
        $admin->password=bcrypt('123456');
        $admin->type='admin';
        $admin->save();


        $user=new User();
        $user->first_name='User';
        $user->last_name='Doe';
        $user->email='user@gmail.com';
        $user->password=bcrypt('123456');
        $user->type='user';
        $user->save();


    for ($i=0;$i<=30;$i++){
        $user=new User();
        $user->name=$faker->name;
        $user->first_name=$faker->firstName;
        $user->last_name=$faker->lastName;
        $user->email=$faker->email;
        $user->password=bcrypt('123456');
        $user->type='user';
        $user->save();
    }
    }
}
