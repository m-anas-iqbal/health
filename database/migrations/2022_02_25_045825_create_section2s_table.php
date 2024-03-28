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
        Schema::create('section2s', function (Blueprint $table) {
            $table->id();
            $table->string('image1',2000)->nullable();
            $table->string('image2',2000)->nullable();
            $table->string('heading')->nullable();
            $table->text('description')->nullable();
            $table->string('btntext')->nullable();
            $table->string('btnlink')->nullable();
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
        Schema::dropIfExists('section2s');
    }
};
