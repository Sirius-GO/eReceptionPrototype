<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('name', 150); // Who am I?
            $table->string('reg_type', 20); // Staff, Visitor, Delivery or Contractor
            $table->string('current_status', 3); //In or Out
            $table->string('sign_out_type', 20)->nullable(); //Scan, Manual, Forced
            $table->string('who', 150); //Visiting who? Delivery for who? where applicable
            $table->integer('location_id'); //Sign In location
            $table->string('car_reg', 10)->nullable(); //Where applicable
            $table->string('from_company', 150); // Who do I work for (if not staff)
            $table->integer('company_id'); // If Staff, what is my company ID?
            $table->string('img', 150)->nullable(); // Image of me - where applicable
            $table->integer('doc_id_1')->nullable();
            $table->string('signature_1', 150)->nullable();
            $table->integer('doc_id_2')->nullable();
            $table->string('signature_2', 150)->nullable();
            $table->integer('doc_id_3')->nullable();
            $table->string('signature_3', 150)->nullable();
            $table->timestamps(); //Sign in time - not updatable
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registers');
    }
}
