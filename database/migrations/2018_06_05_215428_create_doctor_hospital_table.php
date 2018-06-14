<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorHospitalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_hospital', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('hospital_id');
            $table->unsignedInteger('doctor_id');
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('hospital_id')->references('id')->on('hospital');
            $table->foreign('doctor_id')->references('id')->on('doctor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('doctor_hospital', function (Blueprint $table) {
//            $table->dropForeign('doctor_hospital_doctor_id_foreign');
//            $table->dropForeign('doctor_hospital_hospital_id_foreign');
//        });


        Schema::dropIfExists('doctor_hospital');

    }
}
