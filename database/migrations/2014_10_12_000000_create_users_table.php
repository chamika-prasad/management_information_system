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
            $table->string('usertype');   
            $table->string('firstName',50);
            $table->string('lastName',50);
            $table->date('birthdate');
            $table->string('address',200);
            $table->string('mobileNumber',12);
            $table->string('email',100)->unique();
            $table->string('password',100);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('birthplace');
            $table->integer('requestgrade');
            $table->string('gender');
            $table->string('school');
            $table->integer('schoolgrade');
            $table->string('fathername');
            $table->string('f_occupation');
            $table->string('f_place');
            $table->string('mothername');
            $table->string('m_occupation');
            $table->string('m_place');
            $table->string('admissioncategory');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('users');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
};
