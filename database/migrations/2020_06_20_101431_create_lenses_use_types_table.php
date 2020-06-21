<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLensesUseTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lenses_use_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("lense_id");
            $table->foreign('lense_id')->references('id')->on('contact_lenses');
            $table->integer('duration');
            $table->integer('price');
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
        Schema::dropIfExists('lenses_use_types');
    }
}
