<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseStudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('course_student', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->boolean('authorized');
            $table->timestamps();


            $table->foreign('users_id')->references('id')->on('users')
                    ->onDelete('cascade');

            $table->foreign('course_id')->references('id')->on('courses')
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
        Schema::dropIfExists('course_course');
    }
}