<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactLensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_lenses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('quantity');
            $table->string('label');
            $table->integer('price_before_discount');
            $table->integer('price_after_discount');
            $table->string('description');
            $table->unsignedBigInteger("brand_id");
            $table->foreign('brand_id')->references('id')->on('lense_brands');
            $table->unsignedBigInteger("type_id");
            $table->foreign('type_id')->references('id')->on('lense_types');
            $table->unsignedBigInteger("manufacturerer_id");
            $table->foreign('manufacturerer_id')->references('id')->on('lense_manufacturerers');
            $table->string('material_of_content');
            $table->string('water_of_content');
            $table->enum('lense_purpose', ['medical', 'beauty']);
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
        Schema::dropIfExists('contact_lenses');
    }
}
