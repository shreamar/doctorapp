<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('city','CityController');
Route::resource('hospital','HospitalController');
Route::resource('doctor','DoctorController');

Route::post('city/addHospitalsToCity','CityController@addHospitalsToCity');
Route::post('city/removeHospitalsFromCity','CityController@removeHospitalsFromCity');

Route::post('hospital/addDoctorsToHospital','HospitalController@addDoctorsToHospital');
Route::post('hospital/removeDoctorsFromHospital','HospitalController@removeDoctorsFromHospital');

Route::post('doctor/addHospitalsToDoctor','DoctorController@addHospitalsToDoctor');
Route::post('doctor/removeHospitalsFromDoctor','DoctorController@removeHospitalsFromDoctor');