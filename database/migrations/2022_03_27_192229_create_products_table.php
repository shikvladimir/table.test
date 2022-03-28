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
        Schema::create('products', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedInteger('userID');
            $table->string('article',255)->unique();
            $table->string('name',255);
            $table->string('status',255)->default('unavailable');
            $table->jsonb('color');
            $table->jsonb('size');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('userID')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
