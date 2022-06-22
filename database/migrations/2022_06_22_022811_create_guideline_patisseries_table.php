<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuidelinePatisseriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guideline_patisseries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patisserie_crit_id');
            $table->string('gd_name');
            $table->string('gd_total');
            $table->timestamps();

            $table->foreign('patisserie_crit_id')
            ->references('id')
            ->on('criteria_patisseries')
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
        Schema::dropIfExists('guideline_patisseries');
    }
}
