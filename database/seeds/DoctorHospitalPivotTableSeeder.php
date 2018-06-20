<?php

use Illuminate\Database\Seeder;

class DoctorHospitalPivotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<100;$i++){
            DB::table('doctor_hospital')->insert([
               'doctor_id'=>random_int(1,\App\Doctor::all()->count()),
                'hospital_id'=>random_int(1,\App\Hospital::all()->count()),
            ]);
        }
    }
}
