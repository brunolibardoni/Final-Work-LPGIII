<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentCourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('student_course', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->integer('course_id')->unsigned();

            $table->foreign('student_id')->references('id')->on('students')
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
        Schema::dropIfExists('student_course');
    }
}