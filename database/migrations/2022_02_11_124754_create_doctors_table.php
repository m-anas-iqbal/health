<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('doctor_fullname')->nullable();
            $table->string('doctor_martialStatus')->nullable();
            $table->string('doctor_dob')->nullable();
            $table->string('doctor_gender')->nullable();
            $table->string('doctor_degree')->nullable();
            $table->string('doctor_experience')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('doctor_phone')->nullable();
            $table->string('doctor_PMDC')->nullable();
            $table->string('doctor_country')->nullable();
            $table->string('doctor_city')->nullable();
            $table->string('doctor_state')->nullable();
            $table->string('doctor_status')->nullable();
            $table->string('doctor_hospital_id');
            $table->string('doctor_specialty_id');
            $table->string('doctor_course_id');
            $table->string('doctor_doctorType_id');
            $table->string('doctor_profileImage', 2000)->nullable();
            $table->string('doctor_rating')->nullable();
            $table->string('role')->default(1);
            $table->rememberToken();
            $table->timestamps();

           

        });
        // Schema::table('doctors', function (Blueprint $table) {
        //     $table->foreign('doctor_hospital_id')->references('id')->on('hospitals')->onDelete('cascade');
        // });

        // Schema::table('doctors', function (Blueprint $table) {
        //     $table->foreign('hospital_id')->references('id')->on('hospitals')->onDelete('cascade');
        //     $table->foreign('specialty_id')->references('id')->on('specialties')->onDelete('cascade');
        //     $table->foreign('course_id')->references('id')->on('course_forms')->onDelete('cascade');
        //     $table->foreign('doctorType_id')->references('id')->on('doctor_types')->onDelete('cascade');
        // });

        // Schema::table('doctors', function (Blueprint $table) {
        //     $table->foreign('specialty_id')->references('id')->on('specialties')->onDelete('cascade');
        // });

        // Schema::table('doctors', function (Blueprint $table) {
        //     $table->foreign('course_id')->references('id')->on('course_forms')->onDelete('cascade');
        // });

        // Schema::table('doctors', function (Blueprint $table) {
        //     $table->foreign('doctorType_id')->references('id')->on('doctor_types')->onDelete('cascade');
        // });

       
    }

    public function down()
    {
        Schema::dropIfExists('doctors');
    }
};