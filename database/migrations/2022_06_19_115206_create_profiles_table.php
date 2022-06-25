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
<<<<<<<< HEAD:database/migrations/2022_06_08_082841_create_questions_table.php
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question');
            $table->unsignedInteger('subject_id');
            $table->unsignedInteger('student_id');
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
========
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('image')->nullable;
            $table->string('mobile')->nullable;  
            $table->string('line1')->nullable;
            $table->string('city')->nullable;
            $table->string('province')->nullable;
            $table->string('country')->nullable;
>>>>>>>> master:database/migrations/2022_06_19_115206_create_profiles_table.php
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
<<<<<<<< HEAD:database/migrations/2022_06_08_082841_create_questions_table.php
        Schema::dropIfExists('questions');
========
        Schema::dropIfExists('profiles');
>>>>>>>> master:database/migrations/2022_06_19_115206_create_profiles_table.php
    }
};
