<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->integer('user_level');
            $table->integer('company_id');
            $table->integer('department_id');
            $table->string('avatar', 100)->nullable();
            $table->string('current_status', 3);
            $table->string('last_time', 30);  
            $table->integer('reg_id')->nullable();  
            $table->integer('account_id');          
            $table->string('dob', 10)->nullable();
            $table->string('gender', 20)->nullable();
            $table->string('mobile_no', 20)->nullable();
            $table->string('job_title', 100)->nullable();
            $table->string('rfid', 200)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
