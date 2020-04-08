<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewTabelCourseCountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_count', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('course_lesson_id');
            $table->string('ip')->nullable();
            $table->string('location')->nullable();
            $table->string('browser')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('note')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('course_lesson_id')->references('id')->on('course_lesson');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_count');
    }
}
