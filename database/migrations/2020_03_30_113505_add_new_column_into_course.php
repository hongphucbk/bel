<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumnIntoCourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_info', function (Blueprint $table) {
            $table->boolean('is_display')->default(1)->after('linkpicture');
        });

        Schema::table('course_lesson', function (Blueprint $table) {
            $table->boolean('is_display')->default(1)->after('is_fee'); 
        });

        Schema::table('course_content', function (Blueprint $table) {
            $table->boolean('is_display')->default(1)->after('content'); 
        });

        Schema::table('soft_info', function (Blueprint $table) {
            $table->boolean('is_display')->default(1)->after('user_id'); 
        });

        Schema::table('news_info', function (Blueprint $table) {
            $table->boolean('is_display')->default(1)->after('user_id'); 
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
            $table->dropColumn('is_display');
        });

        Schema::table('course_lesson', function (Blueprint $table) {
            $table->dropColumn('is_display');
        });

        Schema::table('course_content', function (Blueprint $table) {
            $table->dropColumn('is_display');
        });

        Schema::table('soft_info', function (Blueprint $table) {
            $table->dropColumn('is_display');
        });

        Schema::table('news_info', function (Blueprint $table) {
            $table->dropColumn('is_display');
        });
    }
}
