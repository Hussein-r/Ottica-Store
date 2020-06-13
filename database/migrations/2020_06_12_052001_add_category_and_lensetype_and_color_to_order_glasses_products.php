<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryAndLensetypeAndColorToOrderGlassesProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_glasses_products', function (Blueprint $table) {
            $table->enum('category', ['no prescription','single vision','progressive vision','bifocal'])->default('no prescription');
            $table->string('lense_type');
            $table->integer("color_id");        });
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
