<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('news_category', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('name', 100);
        $table->string('description', 200)->nullable();
        $table->unsignedInteger('active')->default(1);
        $table->string('note', '100')->nullable();
        $table->timestamps();
      });

      Schema::create('news_info', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('category_id');
        $table->string('name', 300);
        $table->string('description', 200)->nullable();
        $table->unsignedInteger('rate')->nullable();
        $table->unsignedBigInteger('user_id');
        $table->string('note')->nullable();
        $table->timestamps();

        $table->foreign('category_id')->references('id')->on('news_category');
        $table->foreign('user_id')->references('id')->on('users');
      });

      Schema::create('news_content', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('info_id');
          $table->unsignedBigInteger('user_id');

          $table->string('title', 200);
          $table->string('content', 5000);
          $table->unsignedInteger('priority')->default(100);
          $table->string('note')->nullable();
          $table->boolean('active')->default(1);   
          $table->timestamps();

          $table->foreign('info_id')->references('id')->on('news_info');
          $table->foreign('user_id')->references('id')->on('users');
      });

      Schema::create('news_rate', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('content_id');
        $table->unsignedBigInteger('user_id');

        $table->unsignedInteger('score');
        $table->string('note')->nullable();
        $table->boolean('active')->default(1);   
        $table->timestamps();

        $table->foreign('content_id')->references('id')->on('news_content');
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
        Schema::dropIfExists('news_rate');
        Schema::dropIfExists('news_content');
        Schema::dropIfExists('news_info');
        Schema::dropIfExists('news_category');

    }
}
