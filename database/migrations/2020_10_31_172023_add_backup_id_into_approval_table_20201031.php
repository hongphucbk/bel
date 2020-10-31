<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBackupIdIntoApprovalTable20201031 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doc_approval', function (Blueprint $table) {
            $table->unsignedBigInteger('backup_id')->after('is_backup')->nullable();

            $table->foreign('backup_id')->references('id')->on('users');
        });

        Schema::table('doc_status', function (Blueprint $table) {
            $table->string('label', 50)->after('description')->nullable();
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
            $table->dropForeign(['backup_id']);
            $table->dropColumn('backup_id');
        });

        Schema::table('doc_status', function (Blueprint $table) {
            $table->dropColumn('label');
        });
    }
}
