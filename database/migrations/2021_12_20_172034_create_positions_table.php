<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('positions'))
            Schema::create('positions', function (Blueprint $table) {
                $table->id();
                $table->string('name', 60);
                
                $table->unsignedbiginteger('election_id');
                $table->foreign('election_id')
                      ->references('id')
                      ->on('elections')
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
        Schema::dropIfExists('positions');
    }
}
