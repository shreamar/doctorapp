<?php

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
        $this->call([
            CityTableSeeder::class,
            HospitalTableSeeder::class,
            DoctorTableSeeder::class,
            DoctorHospitalPivotTableSeeder::class,
        ]);
    }
}
