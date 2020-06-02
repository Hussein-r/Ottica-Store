<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLenseColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lense_colors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("lense_id");
            $table->foreign('lense_id')->references('id')->on('contact_lenses');
            $table->unsignedBigInteger("color_id");
            $table->foreign('color_id')->references('id')->on('colors');
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
        Schema::dropIfExists('lense_colors');
    }
}
