<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewWarehouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('wh_facility', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('code', 20);
        $table->string('name', 50);
        $table->string('description', 100)->nullable();
        $table->unsignedInteger('is_active')->default(1);
        $table->string('note', '100')->nullable();
        $table->timestamps();
      });

      Schema::create('wh_warehouse', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('facility_id');
        $table->string('code', 20);
        $table->string('name', 50);
        $table->string('description', 100)->nullable();
        $table->string('address', 100)->nullable();
        $table->unsignedInteger('is_active')->default(1);
        $table->string('note', '100')->nullable();
        $table->timestamps();

        $table->foreign('facility_id')->references('id')->on('wh_facility');
      });

      Schema::create('wh_category', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('code', 20);
        $table->string('name', 100);
        $table->string('description', 200)->nullable();
        $table->unsignedInteger('is_active')->default(1);
        $table->unsignedBigInteger('user_id');
        $table->string('note')->nullable();
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users');
      });

      Schema::create('wh_item', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('category_id');
        $table->string('code', 50);
        $table->string('name', 100);
        $table->string('description', 200)->nullable();
        $table->string('unit', 50)->nullable();
        $table->string('partnumber', 100)->nullable();
        $table->string('color', 50)->nullable();
        $table->string('weight', 50)->nullable();
        $table->unsignedInteger('rate')->nullable();
        $table->unsignedBigInteger('user_id');
        $table->string('note')->nullable();
        $table->timestamps();

        $table->foreign('category_id')->references('id')->on('wh_category');
        $table->foreign('user_id')->references('id')->on('users');
      });

      Schema::create('wh_warehouse_item', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('warehouse_id');
          $table->unsignedBigInteger('item_id');
          $table->unsignedBigInteger('user_id');

          $table->unsignedInteger('min_stock')->default(0);
          $table->unsignedInteger('max_stock')->default(10000);
          $table->unsignedInteger('start_quantity')->default(0);

          $table->unsignedInteger('priority')->default(100);
          $table->string('note')->nullable();
          $table->boolean('is_active')->default(1);
          $table->boolean('is_alarm')->default(0);   
          $table->timestamps();

          $table->foreign('warehouse_id')->references('id')->on('wh_warehouse');
          $table->foreign('item_id')->references('id')->on('wh_item');
          $table->foreign('user_id')->references('id')->on('users');
      });

      Schema::create('wh_supplier', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('code', 20);
        $table->string('name', 100);
        $table->string('description', 200)->nullable();
        
        $table->string('email', 50)->nullable();
        $table->string('address', 50)->nullable();
        $table->string('tax_id_number', 30)->nullable();
        $table->string('account_number', 50)->nullable();
        $table->string('contact_name', 50)->nullable();
        $table->string('note')->nullable();
        $table->boolean('is_active')->default(1);
        $table->unsignedBigInteger('user_id');   
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users');
      });

      Schema::create('wh_customer', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('code', 20);
        $table->string('name', 100);
        $table->string('description', 200)->nullable();
        
        $table->string('email', 50)->nullable();
        $table->string('address', 50)->nullable();
        $table->string('tax_id_number', 30)->nullable();
        $table->string('account_number', 50)->nullable();
        $table->string('contact_name', 50)->nullable();
        $table->string('note')->nullable();
        $table->boolean('is_active')->default(1);
        $table->unsignedBigInteger('user_id');   
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users');
      });

      Schema::create('wh_project', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('code', 20);
        $table->string('name', 100);
        $table->string('description', 200)->nullable();
        $table->string('address', 50)->nullable();

        $table->unsignedBigInteger('customer_id');

        $table->string('note')->nullable();
        $table->boolean('is_active')->default(1);
        $table->unsignedBigInteger('user_id');   
        $table->timestamps();

        $table->foreign('customer_id')->references('id')->on('wh_customer');
        $table->foreign('user_id')->references('id')->on('users');
      });

      Schema::create('wh_good_receipt', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('item_id');
        $table->unsignedBigInteger('supplier_id');
        $table->date('good_receipt_date');
        $table->integer('quantity');
        $table->string('po_number', 30)->nullable();
        $table->string('invoice_number', 30)->nullable();
        $table->unsignedBigInteger('price')->nullable();
        $table->unsignedBigInteger('other_price')->nullable();
        $table->unsignedBigInteger('vat')->nullable();
        $table->unsignedBigInteger('vat_price')->nullable();

        $table->string('note')->nullable();
        $table->boolean('is_active')->default(1);
        $table->unsignedBigInteger('user_id');   
        $table->timestamps();

        $table->foreign('item_id')->references('id')->on('wh_warehouse_item');
        $table->foreign('supplier_id')->references('id')->on('wh_supplier');
        $table->foreign('user_id')->references('id')->on('users');
      });

      Schema::create('wh_good_issue', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('item_id');
        $table->unsignedBigInteger('project_id');
        $table->date('good_issue_date');
        $table->integer('quantity');
        $table->string('po_number', 30)->nullable();
        $table->string('invoice_number', 30)->nullable();
        $table->unsignedBigInteger('price')->nullable();

        $table->string('note')->nullable();
        $table->boolean('is_active')->default(1);
        $table->unsignedBigInteger('user_id');   
        $table->timestamps();

        $table->foreign('item_id')->references('id')->on('wh_warehouse_item');
        $table->foreign('project_id')->references('id')->on('wh_project');
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
        Schema::dropIfExists('wh_good_issue');
        Schema::dropIfExists('wh_good_receipt');
        Schema::dropIfExists('wh_project');
        Schema::dropIfExists('wh_customer');
        Schema::dropIfExists('wh_supplier');
        Schema::dropIfExists('wh_warehouse_item');
        Schema::dropIfExists('wh_item');
        Schema::dropIfExists('wh_category');
        Schema::dropIfExists('wh_warehouse');
        Schema::dropIfExists('wh_facility');
    }
}
