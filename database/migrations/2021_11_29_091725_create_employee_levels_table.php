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
            $table->string('next_level')->nullable();
            $table->integer('rank');
            $table->integer('basic');
            $table->integer('increment');
            $table->integer('gross');
            $table->text('objective_details')->nullable();
            $table->text('summary_details')->nullable();
            $table->text('knowledge_details')->nullable();
            $table->text('independence_details')->nullable();
            $table->text('influence_details')->nullable();
            $table->text('organizational_scope_details')->nullable();
            $table->text('job_contrast_details')->nullable();
            $table->text('execution_details')->nullable();
            $table->text('knowledge_questions')->nullable();
            $table->text('independence_questions')->nullable();
            $table->text('influence_questions')->nullable();
            $table->text('organizational_scope_questions')->nullable();
            $table->text('job_contrast_questions')->nullable();
            $table->text('execution_questions')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employee_levels');
    }
}
