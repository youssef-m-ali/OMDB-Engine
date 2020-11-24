<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNominationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nominations', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->bigInteger('user_id')->default(1);
						$table->timestamps();

        });

				Schema::create('movies', function (Blueprint $table) {
					$table->id();
          //$table->foreignId('user_id')->constrained()->onDelete('cascade');
          $table->bigInteger('user_id')->default(1);
          $table->string('imdbID');
          $table->string('poster');
          $table->string('year');
          $table->string('title');
					$table->timestamps();

      });
      
      Schema::create('nomination_movie', function (Blueprint $table) {

        $table->foreignId('nomination_id')->constrained()->onDelete('cascade');
        $table->foreignId('movie_id')->constrained()->onDelete('cascade');

    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nomination_movie');
        Schema::dropIfExists('nominations');
        Schema::dropIfExists('movies');

    }
}
