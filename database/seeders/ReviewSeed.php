<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ReviewSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Factory::create();
        $examiners=User::where('type','examiner')->get();
        $arr=['Perfekt','Sehr gut','Zufrieden','Top'];
        foreach ($examiners as $examiner){
            $users=User::where('type','user')->get()->random(5);
            foreach ($users as $user){
                $review=new Review();
                $review->examiner_id=$examiner->id;
                $review->user_id =$user->id;
                $review->name=$user->name;
                $review->rating_with_examiner=mt_rand(3,5);
                $review->rating_about_examiner=$arr[mt_rand(0,3)];
                $review->save();
            }
        }
    }
}
