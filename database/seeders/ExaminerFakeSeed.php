<?php

namespace Database\Seeders;

use App\Models\AvailibiltyTime;
use App\Models\City;
use App\Models\ExaminerAvailability;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ExaminerFakeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filename = public_path('examiners.csv');
        $file = fopen($filename, "r");
        $all_data = array();



        $i=0;
        $faker=Factory::create();
        while ( ($line = fgets($file)) !== false) {

            if ($i > 2){
                $data=str_getcsv($line, ",", '"');

                $name=explode($data[1],' ');
                $image = null;
                $imageContent = @file_get_contents($data[2]);
                if ($imageContent !== false) {
                    $image = 'pictures/'.$data[1].$data[0].'-profile'.'.png';
                    Storage::disk('public')->put($image, $imageContent);
                }
                $examiner = new User();
                $examiner->name=$data[1];
                $examiner->first_name = isset($name[0])?$name[0]:'';
                $examiner->last_name = isset($name[1])?$name[1]:'';
                $examiner->email = $faker->email;
                $examiner->password = bcrypt('123456');
                $examiner->company_name = $faker->company;
                $examiner->company_address = $faker->address;
                $examiner->about_me = $data[6];
                $examiner->experience_1 = $data[7];
                $examiner->experience_2 = $data[8];
                $examiner->experience_3 = $data[9];
                $examiner->training_1 = $data[10];
                $examiner->training_2 = $data[11];
                $examiner->training_3 = $data[12];
                $examiner->price = $data[3];
                $examiner->type = 'examiner';
                $examiner->verify_status='verified';
                $examiner->picture=$image;
                $examiner->is_fake=1;
                $examiner->save();


                for ($i=1;$i<3;$i++){
                    $now=Carbon::now();
                    $now->addDays($i);

                    $availability=new ExaminerAvailability();
                    $availability->date=$now->toDateString();
                    $availability->examiner_id=$examiner->id;
                    $availability->save();

                    $now=$now->startOfDay();
                    for ($j=0;$j<4;$j++){
                        $now->addMinutes(30);
                        $AvTime=new AvailibiltyTime();
                        $AvTime->availability_id=$availability->id;
                        $AvTime->time=$now->format('H:i:s');
                        $AvTime->save();
                    }





                }




            }
            $i++;
        }
    }
}
