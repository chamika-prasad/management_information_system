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
        Schema::create('uploading_contents', function (Blueprint $table) {
            $table->increments('id');
            // $table->time('Date_and_time')->default('2022-02-03');
            $table->string('zoomLink');
            $table->string('pdf');
            $table->string('recordingLink');
            $table->date('Date');
            $table->unsignedInteger('subject_id');
            $table->unsignedInteger('grade_name');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign('grade_name')->references('id')->on('classrooms')->onDelete('cascade');
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
        Schema::dropIfExists('uploading_contents');
    }
};
