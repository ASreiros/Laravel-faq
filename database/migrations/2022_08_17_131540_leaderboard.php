<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Leaderboard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaderboards', function (Blueprint $table) {
            $table->increments("id");
            $table->string('username');
            $table->string('identifier');
            $table->string('testnumber');
            $table->tinyInteger('points');
            $table->json('statistics');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaderboards');
    }
}
