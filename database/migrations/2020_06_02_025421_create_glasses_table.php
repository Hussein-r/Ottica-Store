<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glasses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("brand_id");
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->unsignedBigInteger("color_id");
            $table->foreign('color_id')->references('id')->on('colors');
            $table->unsignedBigInteger("secondary_color_id");
            $table->foreign('secondary_color_id')->references('id')->on('colors');
            $table->integer('price_before_discount');
            $table->integer('price_after_discount');
            $table->unsignedBigInteger("face_shape_id");
            $table->foreign('face_shape_id')->references('id')->on('face_shapes');
            $table->unsignedBigInteger("frame_shape_id");
            $table->foreign('frame_shape_id')->references('id')->on('frame_shapes');
            $table->unsignedBigInteger("material_id");
            $table->foreign('material_id')->references('id')->on('materials');
            $table->unsignedBigInteger("secondary_material_id");
            $table->foreign('secondary_material_id')->references('id')->on('materials');
            $table->unsignedBigInteger("fit_id");
            $table->foreign('fit_id')->references('id')->on('fits');
            $table->enum('gender', ['male', 'female','unisex']);
            $table->enum('glass_type', ['sunglass', 'eyeglass']);
            $table->string('label');
            $table->string('glass_code');
            $table->boolean('best_seller');
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
        Schema::dropIfExists('glasses');
    }
}
