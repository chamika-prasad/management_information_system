<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->increment('examid')->primary();
            $table->unsignedInteger('subjectid');
            $table->string('description_about_exam');
            $table->string('add_exam_paper');
            $table->time('date_and_time');
            $table->string('guidline');
            $table->unsignedInteger('student_id');
            $table->unsignedInteger('teacher_id');
            $table->integer('grade');
            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('subjectid');
            $table->foreign('subjectid')->references('subjectid')->on('subjects')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            


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
        Schema::dropIfExists('exams');
    }
};
