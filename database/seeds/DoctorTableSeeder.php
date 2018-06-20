<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        for ($i=0;$i<50;$i++){
            DB::table('doctor')->insert([
                'firstName'=>$faker->firstName,
                'lastName'=>$faker->lastName,
                'age'=>$faker->numberBetween(25,50),
                'gender'=>$faker->boolean,
                'created_at'=>$faker->dateTime(),
            ]);
        }
    }
}
