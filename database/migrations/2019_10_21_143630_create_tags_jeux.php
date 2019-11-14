<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsJeux extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags_jeux', function (Blueprint $table) {
            $table->bigInteger('tags_id')->unsigned();
            $table->bigInteger('jeux_id')->unsigned();
            $table->foreign('tags_id')->references('id')->on('tags')
                ->onDelete('cascade');
            $table->foreign('jeux_id')->references('id')->on('jeux')
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
        Schema::dropIfExists('tags_jeux');
    }
}
