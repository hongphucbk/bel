<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBackupUserIntoTable20201028 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doc_role_user', function (Blueprint $table) {
            $table->unsignedBigInteger('backup_id')->nullable()->after('user_id');

            $table->foreign('backup_id')->references('id')->on('users');
        });

        Schema::table('doc_approval', function (Blueprint $table) {
            $table->unsignedBigInteger('approved_id')->after('is_backup')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doc_role_user', function (Blueprint $table) {
            $table->dropForeign(['backup_id']);
            $table->dropColumn('backup_id');
        });

        Schema::table('doc_approval', function (Blueprint $table) {
            $table->dropColumn('approved_id');
        });
    }
}
