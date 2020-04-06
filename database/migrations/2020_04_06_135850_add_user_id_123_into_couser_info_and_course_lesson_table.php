<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserId123IntoCouserInfoAndCourseLessonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_info', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->default(1)->after('note');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('course_lesson', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->default(1)->after('note'); 
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_info', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        Schema::table('course_lesson', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });



    }
}
