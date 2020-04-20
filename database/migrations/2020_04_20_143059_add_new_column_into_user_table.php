<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumnIntoUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_social')->after('avata')->default(0);            
        });

        Schema::create('social_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('social_id');
            $table->string('social_name');
            $table->unsignedBigInteger('user_id');
            $table->date('birthday')->nullable();
            $table->string('gender')->nullable();
            $table->string('picture')->nullable();
            $table->timestamps();

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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_social');
        });

        Schema::table('social_users', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('social_users');
    }
}
