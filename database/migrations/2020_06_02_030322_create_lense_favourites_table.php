<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLenseFavouritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lense_favourites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger("lense_id");
            $table->foreign('lense_id')->references('id')->on('contact_lenses');
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
        Schema::dropIfExists('lense_favourites');
    }
}
