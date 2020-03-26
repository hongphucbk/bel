<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnIntoCourseInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_info', function (Blueprint $table) {
            $table->smallInteger('priority')->default(500);
        });

        Schema::table('course_lesson', function (Blueprint $table) {
            $table->boolean('is_fee')->default(0)->after('course_info_id'); 
            $table->boolean('is_video')->default(0)->after('course_info_id');
            $table->smallInteger('priority')->default(500)->after('course_info_id');
        });

        Schema::table('course_content', function (Blueprint $table) {
            $table->smallInteger('priority')->default(500);
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
            $table->dropColumn('priority');
        });

        Schema::table('course_lesson', function (Blueprint $table) {
            $table->dropColumn('is_fee');
            $table->dropColumn('is_video');
            $table->dropColumn('priority');
        });

        Schema::table('course_content', function (Blueprint $table) {
            $table->dropColumn('priority');
        });
    }
}
