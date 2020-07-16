<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonologueTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('monologues', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transcription_id')->unsigned();
            $table->integer('speaker_id')->unsigned();
            $table->timestamps();

            $table->foreign('transcription_id')->references('id')->on('transcriptions');
            $table->foreign('speaker_id')->references('id')->on('speakers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('monologues');
    }
}
