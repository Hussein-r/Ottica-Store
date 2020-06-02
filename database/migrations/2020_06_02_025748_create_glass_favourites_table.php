<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlassFavouritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glass_favourites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger("glass_id");
            $table->foreign('glass_id')->references('id')->on('glasses');
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
        Schema::dropIfExists('glass_favourites');
    }
}
