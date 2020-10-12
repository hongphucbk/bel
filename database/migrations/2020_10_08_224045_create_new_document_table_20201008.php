<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewDocumentTable20201008 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('doc_status', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedInteger('code');
        $table->string('name', 50);
        $table->string('description', 100)->nullable();
        $table->unsignedInteger('is_active')->default(1);
        $table->unsignedInteger('priority')->default(100);
        $table->string('note', '100')->nullable();
        $table->timestamps();
      });

      Schema::create('doc_role', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('code', 20);
        $table->string('name', 50);
        $table->string('description', 100)->nullable();
        $table->unsignedInteger('is_active')->default(1);
        $table->unsignedInteger('priority')->default(100);
        $table->string('note', '100')->nullable();
        $table->timestamps();
      });

      Schema::create('doc_role_user', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('role_id');
        $table->unsignedBigInteger('user_id');
        $table->string('note')->nullable();
        $table->timestamps();

        $table->foreign('role_id')->references('id')->on('doc_role');
        $table->foreign('user_id')->references('id')->on('users');
      });

      Schema::create('doc_infor', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('user_id');
        $table->string('code', 200)->nullable();
        $table->string('name', 200);
        $table->string('description', 400)->nullable();
        $table->unsignedInteger('level_max')->default(2);
        $table->unsignedBigInteger('status_id');
        $table->unsignedInteger('is_active')->default(1);
        $table->unsignedInteger('priority')->default(100);
        $table->string('note', '100')->nullable();
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users');
        $table->foreign('status_id')->references('id')->on('doc_status');
      });

      Schema::create('doc_attach', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('infor_id');
        $table->string('name', 200);
        $table->string('link', 400);
        $table->string('description', 300)->nullable();
        $table->unsignedInteger('is_active')->default(1);
        $table->unsignedInteger('priority')->default(100);
        $table->string('note', '100')->nullable();
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users');
        $table->foreign('infor_id')->references('id')->on('doc_infor');
      });

      Schema::create('doc_flow', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('infor_id');

        $table->unsignedBigInteger('approval_id');        
        $table->string('description', 300)->nullable();
        $table->unsignedInteger('is_active')->default(1);
        $table->unsignedInteger('priority')->default(100);
        $table->unsignedInteger('status')->default(0);
        $table->string('note', '100')->nullable();
        $table->unsignedBigInteger('user_id');
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users');
        $table->foreign('approval_id')->references('id')->on('users');
        $table->foreign('infor_id')->references('id')->on('doc_infor');
      });

      Schema::create('doc_approval', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('infor_id');
        $table->unsignedBigInteger('approval_id');        
        $table->string('comment', 300)->nullable();
        $table->unsignedInteger('is_active')->default(1);
        $table->unsignedInteger('priority')->default(100);
        $table->unsignedInteger('status');
        $table->string('note', '100')->nullable();
        $table->unsignedBigInteger('user_id');
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users');
        $table->foreign('approval_id')->references('id')->on('users');
        $table->foreign('infor_id')->references('id')->on('doc_infor');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doc_approval');
        Schema::dropIfExists('doc_flow');
        Schema::dropIfExists('doc_attach');
        Schema::dropIfExists('doc_infor');
        Schema::dropIfExists('doc_role_user');
        Schema::dropIfExists('doc_role');
        Schema::dropIfExists('doc_status');
    }
}
