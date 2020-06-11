<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_id');
            $table->string('hue', 10); //Hex Code
            $table->string('sat', 10); //Hex Code
            $table->string('hue_pass', 10); //Hex Code
            $table->string('sat_pass', 10); //Hex Code
            $table->string('hue_vis', 10); //Hex Code
            $table->string('sat_vis', 10); //Hex Code
            $table->string('welcome_col')->nullable();
            $table->string('welcome_stroke')->nullable();
            $table->string('welcome_stroke_col')->nullable();
            $table->string('choice', 10);
            $table->string('bg_image', 150)->nullable();
            $table->string('bg_colour', 10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('layouts');
    }
}
