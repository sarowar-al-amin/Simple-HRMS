<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLatestPerformanceToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('q_4_april_jun_performance')->nullable();
            $table->float('q_4_april_jun_percentage')->nullable();
            $table->string('promotion_22b')->nullable();
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
            //
            $table->dropColumn('q_4_april_jun_performance');
            $table->dropColumn('q_4_april_jun_percentage');
            $table->dropColumn('promotion_22b');
        });
    }
}
