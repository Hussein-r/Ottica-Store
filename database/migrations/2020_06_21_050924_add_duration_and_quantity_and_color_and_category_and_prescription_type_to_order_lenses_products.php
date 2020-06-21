<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDurationAndQuantityAndColorAndCategoryAndPrescriptionTypeToOrderLensesProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_lenses_products', function (Blueprint $table) {
            $table->integer('duration');
            $table->integer('quantity');
            $table->unsignedBigInteger("color_id");
            $table->foreign('color_id')->references('id')->on('colors');
            $table->string('category');
            $table->string('prescription_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_lenses_products', function (Blueprint $table) {
            //
        });
    }
}
