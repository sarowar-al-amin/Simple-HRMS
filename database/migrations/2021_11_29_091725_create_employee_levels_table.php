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
            $table->string('objective_details')->nullable();
            $table->string('summary_details')->nullable();
            $table->string('knowledge_details')->nullable();
            $table->string('independence_details')->nullable();
            $table->string('influence_details')->nullable();
            $table->string('organizational_scope_details')->nullable();
            $table->string('job_contrast_details')->nullable();
            $table->string('execution_details')->nullable();
            $table->string('knowledge_questions')->nullable();
            $table->string('independence_questions')->nullable();
            $table->string('influence_questions')->nullable();
            $table->string('organizational_scope_questions')->nullable();
            $table->string('job_contrast_questions')->nullable();
            $table->string('execution_questions')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employee_levels');
    }
}
