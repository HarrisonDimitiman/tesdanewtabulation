<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuidelineRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guideline_restaurants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_crit_id');
            $table->string('gd_name');
            $table->string('gd_total');
            $table->timestamps();

            $table->foreign('restaurant_crit_id')
            ->references('id')
            ->on('criteria_restaurants')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guideline_restaurants');
    }
}
