<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuantityAndColorsToGlassOrderProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_glasses_products', function (Blueprint $table) {
            //
            $table->integer('quantity')->default(1);
            // $table->unsignedBigInteger("color_id");
            // $table->foreign('color_id')->references('id')->on('colors');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('glass_order_product', function (Blueprint $table) {
            //
            $table->dropColumn('quantity');

        });
    }
}
