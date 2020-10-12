<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnIntoAttachTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doc_attach', function (Blueprint $table) {
            $table->string('path', 100)->after('name')->nullable();
            $table->string('extend')->after('description')->nullable();
            $table->string('size')->after('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doc_attach', function (Blueprint $table) {
            $table->dropColumn('path');
            $table->dropColumn('extend');
            $table->dropColumn('size');
        });
    }
}
