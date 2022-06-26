<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
           // $table->engine = 'InnoDB';
            $table->id();
            $table->String('name');
            //$table->foreignId('category')->constrained()->nullable();//relational database
            $table->String('category',200)->references('name')->on('categories')->onDelete()->onUpdate();
            $table->String('author');
            $table->String('publisher');
            $table->string('file');
            $table->timestamps();
            //$table->foreign('category')->references('name')->on('categories')->onDelete('cascade');
            //$table->foreignId('category')->constrained('category')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
