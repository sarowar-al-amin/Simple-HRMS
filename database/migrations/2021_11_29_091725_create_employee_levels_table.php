<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_levels', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->text('details');
            $table->text('appraisal_questions');
            $table->integer('basic');
            $table->integer('increment');
            $table->integer('gross');
            $table->integer('house')->default(0);
            $table->integer('medical')->default(0);
            $table->integer('conveyan')->default(0);
            $table->integer('tada')->default(0);
            $table->integer('others')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_levels');
    }
}
