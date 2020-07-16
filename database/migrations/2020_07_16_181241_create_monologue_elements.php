<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonologueElements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monologue_elements', function (Blueprint $table) {
            $table->id();
            $table->integer('monologue_id')->unsigned();
            $table->string('line_type', '20');
            $table->string('line_value');
            $table->timestamps();

            $table->foreign('monologue_id')->references('id')->on('monologues');
        });

        // Add the start and end times with a raw query to inclue milliseconds. 
        \DB::statement("ALTER TABLE `monologue_elements` ADD COLUMN start_time TIME(3) NULL");
        \DB::statement("ALTER TABLE `monologue_elements` ADD COLUMN end_time TIME(3) NULL");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monologue_elements');
    }
}
