<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class HospitalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        for ($i=0;$i<5;$i++){
            DB::table('hospital')->insert([
                'name'=>$faker->company,
                'city_id'=>random_int(1,3),
            ]);
        }
    }
}
