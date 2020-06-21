<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveRightAndLeftQtyAndColorFromOrderedLensesPrescriptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ordered_lenses_prescriptions', function (Blueprint $table) {
            $table->dropForeign(['left_color']);
            $table->dropForeign(['right_color']);
            $table->dropColumn('right_color');
            $table->dropColumn('left_color');
            $table->dropColumn('right_qty');
            $table->dropColumn('left_qty');

        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ordered_lenses_prescriptions', function (Blueprint $table) {
            //
        });
    }
}
