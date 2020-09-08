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
						$table->json('movies')->nullable();
						$table->bigInteger('user_id')->unsigned()->nullable()->default(1);
						$table->timestamps();

						//$table->foreign('user_id')->references('id')->on('users');
				});

				Schema::create('movies', function (Blueprint $table) {
					$table->id();
					$table->bigInteger('user_id')->unsigned()->nullable()->default(1);
          $table->json('omdbData');
          $table->string('imdbId');
					$table->timestamps();

					//$table->foreign('user_id')->references('id')->on('users');
			});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nominations');
        Schema::dropIfExists('movies');
    }
}
