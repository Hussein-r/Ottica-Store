<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderLensesProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_lenses_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("order_id");
            $table->foreign('order_id')->references('id')->on('orders');
            $table->unsignedBigInteger("product_id");
            $table->foreign('product_id')->references('id')->on('contact_lenses');
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
        Schema::dropIfExists('order_lenses_products');
    }
}
