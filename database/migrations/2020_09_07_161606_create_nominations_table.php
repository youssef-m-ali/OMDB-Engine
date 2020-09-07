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
        Schema::create('nominationLists', function (Blueprint $table) {
            $table->id();
						$table->json('movies')->nullable();
						$table->bigInteger('user_id')->unsigned()->nullable()->default(1);
            $table->string('uuid')->unique()->nullable();
						$table->timestamps();

						//$table->foreign('user_id')->references('id')->on('users');
				});

				Schema::create('movies', function (Blueprint $table) {
					$table->id();
					$table->bigInteger('user_id')->unsigned()->nullable()->default(1);
					$table->string('ImdbId');
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
    }
}
