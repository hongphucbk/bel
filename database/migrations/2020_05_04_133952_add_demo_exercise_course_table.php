<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDemoExerciseCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_content_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->unsignedBigInteger('code')->nullable();
            $table->string('label')->nullable();
            $table->unsignedBigInteger('is_active')->default(1);
            $table->unsignedBigInteger('priority')->default(100);
            $table->string('note')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });


        Schema::create('course_exercise', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('course_lesson_id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('content')->nullable();
            $table->string('link')->nullable();
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
        Schema::table('course_exercise', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['course_lesson_id']);
        });

        Schema::table('course_content_type', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('course_exercise');
        Schema::dropIfExists('course_content_type');
    }
}
