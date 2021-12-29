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
            $table->string('next_level');
            $table->integer('rank');
            $table->integer('basic');
            $table->integer('increment');
            $table->integer('gross');
            $table->string('objective_details');
            $table->string('summary_details');
            $table->string('knowledge_details');
            $table->string('independence_details');
            $table->string('influence_details');
            $table->string('organizational_scope_details');
            $table->string('job_contrast_details');
            $table->string('execution_details');
            $table->string('knowledge_questions');
            $table->string('independence_questions');
            $table->string('influence_questions');
            $table->string('organizational_scope_questions');
            $table->string('job_contrast_questions');
            $table->string('execution_questions');
        });
    }

    public function down()
    {
        Schema::dropIfExists('employee_levels');
    }
}
