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
<<<<<<<< HEAD:database/migrations/2022_06_08_084035_create_comments_table.php
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comment');
            $table->unsignedInteger('question');
            $table->unsignedInteger('student_id');
            $table->unsignedInteger('teacher_id');
            $table->foreign('question')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
========
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->integer('semOneBudhdha');
            $table->integer('semOnePali');
            $table->integer('semOneAbhi');
            $table->integer('semOneAssignment');
            $table->unsignedInteger('student_id');
>>>>>>>> master:database/migrations/2022_06_21_080745_create_grades_table.php
            $table->timestamps();
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<<< HEAD:database/migrations/2022_06_08_084035_create_comments_table.php
        Schema::dropIfExists('comments');
========
        Schema::dropIfExists('grades');
>>>>>>>> master:database/migrations/2022_06_21_080745_create_grades_table.php
    }
};
