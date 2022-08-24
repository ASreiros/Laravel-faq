<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ongoings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ongoings', function (Blueprint $table) {
            $table->increments("id");
            $table->string('username');
            $table->string('name');
            $table->string('testnumber');
            $table->tinyInteger('points');
            $table->tinyInteger('currentquestion');
            $table->json('questionlist');
            $table->json('statistics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ongoings');
    }
}
