<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultBestsellerGlassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('glasses', function (Blueprint $table) {
            $table->boolean('best_seller')->default(0)->change();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('glasses', function (Blueprint $table) {
            $table->dropColumn('best_seller');
            $table->dropSoftDeletes();
        });
    }
}
