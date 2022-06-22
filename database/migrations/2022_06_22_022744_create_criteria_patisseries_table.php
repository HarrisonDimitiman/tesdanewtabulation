<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriteriaPatisseriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criteria_patisseries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quali_id');
            $table->string('crit_name')->nullable();
            $table->string('crit_percentage');
            $table->timestamps();

            $table->foreign('quali_id')
            ->references('id')
            ->on('qualifications')
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
        Schema::dropIfExists('criteria_patisseries');
    }
}
