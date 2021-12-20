<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeLevelsTable extends Migration
{
    public function up()
    {
        Schema::create('employee_levels', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->integer('rank');
            $table->text('details');
            $table->text('appraisal_questions');
            $table->integer('basic');
            $table->integer('increment');
            $table->integer('gross');
        });
    }

    public function down()
    {
        Schema::dropIfExists('employee_levels');
    }
}
