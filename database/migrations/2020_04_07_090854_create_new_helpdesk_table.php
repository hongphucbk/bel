<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewHelpdeskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('helpdesk_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->string('note', 100)->nullable();
            $table->unsignedInteger('is_display')->default(1);
            $table->timestamps();
        });

        Schema::create('helpdesk_status', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedInteger('code');
            $table->string('label', 50)->nullable();
            $table->string('note')->nullable();
            $table->timestamps();
        });

        Schema::create('helpdesk_ticket', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 200);
            $table->string('content', 500);
            $table->unsignedInteger('priority');
            $table->unsignedBigInteger('assign_id')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('helpdesk_category');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('assign_id')->references('id')->on('users');
        });

        Schema::create('helpdesk_activity', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ticket_id');            
            $table->string('solution', 200)->nullable();
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('is_display')->default(1);
            $table->timestamps();

            $table->foreign('ticket_id')->references('id')->on('helpdesk_ticket');
            $table->foreign('status_id')->references('id')->on('helpdesk_status');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('helpdesk_attach', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ticket_id');            
            $table->string('name', 100);
            $table->string('link', 200);
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('is_display')->default(1);
            $table->timestamps();

            $table->foreign('ticket_id')->references('id')->on('helpdesk_ticket');
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
        Schema::dropIfExists('helpdesk_attach');
        Schema::dropIfExists('helpdesk_activity');
        Schema::dropIfExists('helpdesk_ticket');
        Schema::dropIfExists('helpdesk_status');
        Schema::dropIfExists('helpdesk_category');
    }
}
