<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnCityIntoCourseCountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_count', function (Blueprint $table) {
            $table->string('iso_code')->nullable()->after('note');
            $table->string('country')->nullable()->after('note');
            $table->string('city')->nullable()->after('note');
            $table->string('state')->nullable()->after('note');
            $table->string('state_name')->nullable()->after('note');
            $table->string('lat')->nullable()->after('note');
            $table->string('lon')->nullable()->after('note');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_count', function (Blueprint $table) {
            $table->dropColumn('iso_code');
            $table->dropColumn('country');
            $table->dropColumn('city');
            $table->dropColumn('state');
            $table->dropColumn('state_name');
            $table->dropColumn('lat');
            $table->dropColumn('lon');
        });
    }
}
