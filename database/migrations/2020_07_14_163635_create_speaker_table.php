<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * 
 */
class CreateSpeakerTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('speakers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');
            $table->integer('transcription_id')->unsigned();
            $table->timestamps();

            $table->foreign('transcription_id')->references('id')->on('transcriptions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('speakers');
    }
}
