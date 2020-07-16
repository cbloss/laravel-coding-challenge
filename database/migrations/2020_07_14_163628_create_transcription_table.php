<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * 
 */
class CreateTranscriptionTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('transcriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('transcriptions');
    }
}
