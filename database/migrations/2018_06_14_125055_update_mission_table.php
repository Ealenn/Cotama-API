<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('missions', function($table) {
            $table->integer('state_id')->nullable()->unsigned()->index();
            $table->foreign('state_id')->references('id')->on('states');
        });

        Schema::table('mission_housework', function($table) {
            $table->integer('state_id')->nullable()->unsigned()->index();
            $table->foreign('state_id')->references('id')->on('states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('missions', function($table) {
            $table->dropForeign(['state_id']);
            $table->dropColumn('state_id');
        });

        Schema::table('mission_housework', function($table) {
            $table->dropForeign(['state_id']);
            $table->dropColumn('state_id');
        });
    }
}
