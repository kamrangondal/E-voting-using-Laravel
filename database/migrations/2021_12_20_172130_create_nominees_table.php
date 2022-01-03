<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNomineesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('nominees'))
            Schema::create('nominees', function (Blueprint $table) {
                $table->id();
                $table->string('name', 60);
                $table->unsignedbiginteger('position_id');
                $table->unsignedbiginteger('election_id');

                $table->foreign('election_id')
                      ->references('id')
                      ->on('elections')
                      ->onDelete('cascade');

                $table->foreign('position_id')
                      ->references('id')
                      ->on('positions')
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
        Schema::dropIfExists('nominees');
    }
}
