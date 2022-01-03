<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('results'))
            Schema::create('results', function (Blueprint $table) {
                $table->id();
                $table->unsignedbiginteger('voter_id');
                $table->unsignedbiginteger('position_id');
                $table->unsignedbiginteger('nominee_id');

                $table->unsignedbiginteger('election_id');

                $table->foreign('election_id')
                      ->references('id')
                      ->on('elections')
                      ->onDelete('cascade');

                $table->foreign('position_id')
                      ->references('id')
                      ->on('positions')
                      ->onDelete('cascade');                      

                $table->foreign('voter_id')
                      ->references('id')
                      ->on('voters')
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
        Schema::dropIfExists('results');
    }
}
