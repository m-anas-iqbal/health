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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('patient_fullname')->nullable();
            $table->string('patient_martialStatus')->nullable();
            $table->string('patient_dob')->nullable();
            $table->string('patient_gender')->nullable();
            $table->string('patient_weight')->nullable();
            $table->string('patient_height_Feet')->nullable();
            $table->string('patient_height_Inches')->nullable();
            $table->string('patient_bloodGroup')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('patient_password')->nullable();
            $table->string('patient_phone')->nullable();
            $table->text('patient_address')->nullable();
            $table->string('patient_country')->nullable();
            $table->string('patient_city')->nullable();
            $table->string('patient_state')->nullable();
            $table->string('patient_status')->nullable();
            $table->string('patient_profileImage', 2000)->nullable();
            $table->string('patient_InheritedDesease')->nullable();
            $table->string('role')->default(2);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
};
