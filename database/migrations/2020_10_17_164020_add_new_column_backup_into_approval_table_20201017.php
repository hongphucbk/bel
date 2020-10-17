<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnBackupIntoApprovalTable20201017 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doc_approval', function (Blueprint $table) {
            $table->smallInteger('is_backup')->after('priority')->default(0);
            $table->dateTime('remind_date')->after('note')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doc_approval', function (Blueprint $table) {
            $table->dropColumn('is_backup');
            $table->dropColumn('remind_date');
        });
    }
}
