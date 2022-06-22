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
        Schema::create('grade_semtwos', function (Blueprint $table) {
            $table->id();
            $table->integer('semTwoBudhdha');
            $table->integer('semTwoPali');
            $table->integer('semTwoAbhi');
            $table->integer('semTwoAssignment');
            $table->unsignedInteger('student_id');
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
        Schema::dropIfExists('grade_semtwos');
    }
};
