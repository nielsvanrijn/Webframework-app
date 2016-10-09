<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('genres'))
        {
            Schema::create('genres', function (Blueprint $table)
            {
                $table->increments('id');
                $table->string('genre');
            });
            if (!Schema::hasTable('movie_genre'))
            {
                Schema::create('movie_genre', function (Blueprint $table)
                {
                    $table->increments('id');
                    $table->integer(['movie_id', 'genre_id']);
                    // when dealing with a auto increment field of the primary key
                    // always use unsigned()
                    $table->integer('movie_id')->unsigned()->index();
                    $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
                    $table->integer('genre_id')->unsigned()->index();
                    $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genres');
        Schema::dropIfExists('movie_genre');
    }
}
