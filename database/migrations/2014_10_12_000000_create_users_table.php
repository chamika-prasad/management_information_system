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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('index',50);
            $table->string('firstName',50);
            $table->string('lastName',50);
            $table->date('dateOfBirth');
            $table->string('address',200);
            $table->boolean('admin');
            $table->boolean('teacher');
            $table->boolean('student');
            $table->boolean('parent');
            $table->string('mobileNumber',12);
            $table->string('email',100)->unique();
            $table->string('password',100);
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
};
