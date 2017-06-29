<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foyers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('key')->unique();
            $table->timestamps();
        });

        Schema::create('foyers_users', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('foyer_id')->unsigned()->index();
            $table->foreign('foyer_id')->references('id')->on('foyers');

            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');

            $table->boolean('is_admin')->default(false);

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
        Schema::dropIfExists('foyers');
        Schema::dropIfExists('foyers_users');
    }
}
