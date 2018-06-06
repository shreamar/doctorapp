<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,3) as $i) {
            DB::table('city')->insert([
                'name' => $faker->city,
                'country'=>$faker->country,
            ]);
        }
    }
}
