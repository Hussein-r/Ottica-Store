<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderedGlassesPrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordered_glasses_prescriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("order_id");
            $table->foreign('order_id')->references('id')->on('orders');
            $table->unsignedBigInteger("product_id");
            $table->foreign('product_id')->references('id')->on('glasses');
            $table->string('image');
            $table->float('right_sphere');
            $table->float('left_sphere');
            $table->float('right_cylinder');
            $table->float('left_cylinder');
            $table->float('right_axis');
            $table->float('left_axis');
            $table->float('right_add');
            $table->float('left_add');
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
        Schema::dropIfExists('ordered_glasses_prescriptions');
    }
}
