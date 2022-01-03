<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('voters'))
            Schema::create('voters', function (Blueprint $table) {
                $table->id();
                $table->string('name', 60);
                $table->string('special_id', 60);
                $table->integer('vote_counter');
                //$table->integer('election_id')->unsigned();
                $table->unsignedbiginteger('election_id');
                $table->unsignedbiginteger('position_id');
                $table->unsignedbiginteger('nominee_id');

                $table->foreign('election_id')
                      ->references('id')
                      ->on('elections')
                      ->onDelete('cascade');

                $table->foreign('position_id')
                      ->references('id')
                      ->on('positions')
                      ->onDelete('cascade');

                $table->foreign('nominee_id')
                      ->references('id')
                      ->on('nominees')
                      ->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voters');
    }
}
