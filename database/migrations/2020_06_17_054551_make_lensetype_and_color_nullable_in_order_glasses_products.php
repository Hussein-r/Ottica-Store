<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeLensetypeAndColorNullableInOrderGlassesProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_glasses_products', function (Blueprint $table) {
            $table->string('lense_type')->nullable()->change();
            $table->integer('color_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_glasses_products', function (Blueprint $table) {
            //
        });
    }
}
