<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewSoftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('soft_info', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('name', 50);
        $table->string('description', 200)->nullable();
        $table->unsignedInteger('rate')->nullable();
        $table->unsignedBigInteger('user_id');
        $table->string('note')->nullable();
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users');
      });

      Schema::create('soft_attach', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('info_id');
        $table->unsignedBigInteger('user_id');

        $table->string('name', 20);
        $table->string('description', 150);
        $table->string('link', 250);
        $table->string('link_qc', 250)->nullable();
        $table->string('note')->nullable();

        $table->timestamps();
        $table->foreign('info_id')->references('id')->on('soft_info');
        $table->foreign('user_id')->references('id')->on('users');
      });

      Schema::create('soft_content', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('info_id');
          $table->unsignedBigInteger('user_id');

          $table->string('title', 20);
          $table->string('content');
          $table->unsignedInteger('priority')->default(100);
          $table->string('note')->nullable();
          $table->boolean('active')->default(1);   
          $table->timestamps();

          $table->foreign('info_id')->references('id')->on('soft_info');
          $table->foreign('user_id')->references('id')->on('users');
      });

      Schema::create('soft_rate', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('content_id');
        $table->unsignedBigInteger('user_id');

        $table->unsignedInteger('score');
        $table->string('note')->nullable();
        $table->boolean('active')->default(1);   
        $table->timestamps();

        $table->foreign('content_id')->references('id')->on('soft_content');
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
      Schema::dropIfExists('soft_rate');
      Schema::dropIfExists('soft_content');
      Schema::dropIfExists('soft_attach');
      Schema::dropIfExists('soft_info');
    }
}
