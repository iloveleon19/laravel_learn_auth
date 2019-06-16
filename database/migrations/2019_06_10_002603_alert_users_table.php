<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlertUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->unique()->change();
            $table->integer('active')->after('password');
            $table->integer('level')->after('active');
            $table->json('upper_id')->nullable()->after('level');
            $table->json('relation_id')->nullable()->after('upper_id');
            $table->json('discount')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique('users_name_unique');
            $table->dropColumn('active');
            $table->dropColumn('level');
            $table->dropColumn('upper_id');
            $table->dropColumn('relation_id');
            $table->dropColumn('discount');
            $table->dropSoftDeletes();
        });
    }
}
