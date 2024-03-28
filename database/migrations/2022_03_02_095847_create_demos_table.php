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
        Schema::create('demos', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('description', 400)->nullable();
            $table->longText('content')->nullable();
            $table->decimal('price', 15)->nullable();
            $table->integer('author_id')->nullable();
            $table->boolean('auto_renew')->default(false);
            $table->string('email')->index();
            $table->string('token')->index();
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
        Schema::dropIfExists('demos');
    }
};
