<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlertManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('managers', function (Blueprint $table) {
            $table->string('name')->unique()->change();
            $table->integer('active')->after('password');
            $table->integer('level')->after('active');
            $table->json('upper_id');
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
        Schema::table('managers', function (Blueprint $table) {
            $table->dropUnique('managers_name_unique')->change();
            $table->dropColumn('active');
            $table->dropColumn('level');
            $table->dropColumn('upper_id');
            $table->dropSoftDeletes();
        });
    }
}
