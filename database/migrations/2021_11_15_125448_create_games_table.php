<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('IdGame');
            $table->text('Description')->nullable();
            $table->string('Name')->nullable();
            $table->float('Mark')->nullable();
            $table->date('Date')->nullable();
            $table->integer('Watch')->nullable();
            $table->integer('Memory')->nullable();
            $table->text('Image')->nullable();
            $table->text('Video')->nullable();
            $table->text('Download')->nullable();
            $table->string('Language')->nullable();
            $table->integer('IdPublisher')->unsigned();
            $table->integer('IdGenre')->unsigned();
            $table->integer('IdRequirement')->unsigned();
            $table->foreign('IdPublisher')->references('IdPublisher')->on('publishers')->onDelete('cascade');
            $table->foreign('IdGenre')->references('IdGenre')->on('genres')->onDelete('cascade');
            $table->foreign('IdRequirement')->references('IdRequirement')->on('requirements')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
