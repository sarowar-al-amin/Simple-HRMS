<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSalaryReviewsToUsers extends Migration
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
            $table->string('q_2_oct_dec22_performance')->nullable();
            $table->string('q_1_jul_sep22_performance')->nullable();
            $table->string('promotion_23a')->nullable();
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
            $table->dropColumn('q_2_oct_dec22_performance');
            $table->dropColumn('q_1_jul_sep22_performance');
            $table->dropColumn('promotion_23a');
        });
    }
}
