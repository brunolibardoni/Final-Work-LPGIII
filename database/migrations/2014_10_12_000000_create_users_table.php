<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('student_name', 100);
            $table->string('email')->unique();
            $table->string('password');
            $table->date('date_of_birth');
            $table->string('cpf', 11)->unique();
            $table->string('rg', 7);
            $table->string('adress', 100);
            $table->string('cellphone', 20);
            $table->boolean('admin');  
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
