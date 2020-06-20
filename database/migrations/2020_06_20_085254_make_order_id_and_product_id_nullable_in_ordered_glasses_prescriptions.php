<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeOrderIdAndProductIdNullableInOrderedGlassesPrescriptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ordered_glasses_prescriptions', function (Blueprint $table) {
            $table->integer('order_id')->nullable()->change();
            $table->integer('product_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ordered_glasses_prescriptions', function (Blueprint $table) {
            //
        });
    }
}
