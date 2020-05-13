<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumnIntoContentCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_content', function (Blueprint $table) {
            $table->unsignedBigInteger('type_id')->after('user_id')->default(1);
            $table->foreign('type_id')->references('id')->on('course_content_type');
        });

        Schema::table('course_lesson', function (Blueprint $table) {
            $table->boolean('is_member')->after('is_video')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_content', function (Blueprint $table) {
            $table->dropForeign(['type_id']);
        });

        Schema::table('course_content', function (Blueprint $table) {
            $table->dropColumn('type_id');
        });

        Schema::table('course_lesson', function (Blueprint $table) {
            $table->dropColumn('is_member');
        });

        
    }
}
