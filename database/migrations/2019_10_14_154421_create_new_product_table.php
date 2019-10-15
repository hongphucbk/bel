<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50);
            $table->unsignedInteger('rate')->nullable();
            $table->unsignedInteger('price')->nullable();
            $table->unsignedInteger('promote_price')->nullable();
            $table->string('description', 200)->nullable();
            $table->string('note')->nullable();
            $table->timestamps();
        });

        Schema::create('product_attach', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_info_id');
            $table->string('name', 20);
            $table->string('link', 200);
            $table->string('note')->nullable();
            $table->timestamps();
            $table->foreign('product_info_id')->references('id')->on('product_info');
        });

        Schema::create('product_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_info_id');
            $table->string('title', 20);
            $table->string('content');
            $table->string('note')->nullable();
            $table->boolean('active')->default(1);   
            $table->timestamps();

            $table->foreign('product_info_id')->references('id')->on('product_info');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_attach');
        Schema::dropIfExists('product_detail');
        Schema::dropIfExists('product_info');
    }
}
