<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessorCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_professor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('professor_id');
            $table->integer('course_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<< HEAD
        Schema::dropIfExists('professor_courses');
=======
        Schema::dropIfExists('course_professor');
>>>>>>> a2cb0adaa16ee1751af090997da96b8158cf5d36
    }
}
