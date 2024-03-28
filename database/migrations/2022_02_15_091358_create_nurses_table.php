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
        Schema::create('nurses', function (Blueprint $table) {
            $table->id();
            $table->string('nurse_name')->nullable();
            $table->string('nurse_gender')->nullable();
            $table->string('nurse_address')->nullable();
            $table->string('nurse_phone')->nullable();
            $table->bigInteger('nurse_hospitalID')->unsigned();
            $table->timestamps();
        });

        Schema::table('nurses', function (Blueprint $table) {
            $table->foreign('nurse_hospitalID')->references('id')->on('hospitals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nurses');
    }
};
