<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoreBakingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('score_bakings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quali_id');
            $table->unsignedBigInteger('baking_crit_id');
            $table->unsignedBigInteger('baking_quide_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('con_id');
            $table->string('total');
            $table->string('overAllTotal')->nullable();
            $table->string('overAllTotalJudge')->nullable();
            $table->string('score');
            $table->timestamps();

            $table->foreign('quali_id')
            ->references('id')
            ->on('qualifications')
            ->onDelete('cascade');

            $table->foreign('baking_crit_id')
            ->references('id')
            ->on('criteria_bakings')
            ->onDelete('cascade');

            $table->foreign('baking_quide_id')
            ->references('id')
            ->on('guideline_bakings')
            ->onDelete('cascade');
            
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('con_id')
            ->references('id')
            ->on('contestants')
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
        Schema::dropIfExists('score_bakings');
    }
}
