<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderedLensesPrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordered_lenses_prescriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("order_id");
            $table->foreign('order_id')->references('id')->on('orders');
            $table->unsignedBigInteger("product_id");
            $table->foreign('product_id')->references('id')->on('contact_lenses');
            $table->string('image');
            $table->float('left_bc');
            $table->float('right_bc');
            $table->float('right_power');
            $table->float('left_power');
            $table->float('left_dia');
            $table->float('right_dia');
            $table->float('left_qty');
            $table->float('right_qty');
            $table->unsignedBigInteger("left_color");
            $table->foreign('left_color')->references('id')->on('colors');
            $table->unsignedBigInteger("right_color");
            $table->foreign('right_color')->references('id')->on('colors');
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
        Schema::dropIfExists('ordered_lenses_prescriptions');
    }
}
