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
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->string('hospital_name')->nullable();
            $table->text('hospital_address')->nullable();
            $table->string('hospital_phone')->nullable();
            $table->string('hospital_city')->nullable();
            $table->string('hospital_zip')->nullable();
            $table->string('hospital_province')->nullable();
            $table->string('hospital_emergencyServices')->nullable();
            $table->string('hospital_em_value1')->nullable();
            $table->string('hospital_em_value2')->nullable();
            $table->string('hospital_em_value3')->nullable();

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
        Schema::dropIfExists('hospitals');
    }
};
