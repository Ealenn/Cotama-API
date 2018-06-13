<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->dateTime('date_start');
            $table->integer('foyer_id')->unsigned()->index();
            $table->foreign('foyer_id')->references('id')->on('foyers');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('mission_housework', function (Blueprint $table){
            $table->increments('id');
            $table->integer('mission_id')->unsigned()->index();
            $table->foreign('mission_id')->references('id')->on('missions');
            $table->integer('housework_id')->unsigned()->index();
            $table->foreign('housework_id')->references('id')->on('houseworks');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('mission_housework');
        Schema::dropIfExists('missions');
    }
}
