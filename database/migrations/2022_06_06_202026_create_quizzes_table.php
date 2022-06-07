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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->integer('quizid')->primary();
            $table->string('subjectid');
            $table->string('description_about_quiz');
            $table->string('add_quiz_paper');
            $table->time('date_and_time');
            $table->string('guidline');
            $table->integer('teacher_id');
            $table->integer('grade');
            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('subjectid');
            $table->foreign('subjectid')->references('subjectid')->on('subjects')->onDelete('cascade');
            


;
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
        Schema::dropIfExists('quizzes');
    }
};
