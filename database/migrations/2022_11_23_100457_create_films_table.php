<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string("name_it");
            $table->string("name_eng");
            $table->string("actor_one");
            $table->string("actor_two")->nullable();
            $table->string("actor_three")->nullable();
            $table->string("actor_four")->nullable();
            $table->string("actor_five")->nullable();
            $table->date("release_date");
            $table->string("trailer")->nullable();
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
        Schema::dropIfExists('films');
    }
}
