<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuaterlyBonusCalculationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quaterly_bonus_calculations', function (Blueprint $table) {
            $table->id();
            $table->string('bonus_review_id');
            $table->foreign('bonus_review_id')->references('id')->on('bonus_reviews')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('knowledge_rating')->nullable();
            $table->integer('knowledge_score')->nullable();
            $table->text('knowledge_justification')->nullable();
            $table->string('independence_rating')->nullable();
            $table->integer('independence_score')->nullable();
            $table->text('independence_justification')->nullable();
            $table->string('influence_rating')->nullable();
            $table->integer('influence_score')->nullable();
            $table->text('influence_justification')->nullable();
            $table->string('organizational_scope_rating')->nullable();
            $table->integer('organizational_scope_score')->nullable();
            $table->text('organizational_scope_justification')->nullable();
            $table->string('job_contrast_rating')->nullable();
            $table->integer('job_contrast_score')->nullable();
            $table->text('job_contrast_justification')->nullable();
            $table->string('execution_rating')->nullable();
            $table->integer('execution_score')->nullable();
            $table->text('execution_justification')->nullable();

            $table->string('sbu_total_performance_rating')->nullable();
            $table->integer('sbu_total_performance_score')->nullable();
            $table->string('sbu_bonus_recommendation')->nullable();
            $table->text('sbu_comment')->nullable();

            $table->string('pm_total_performance_rating')->nullable();
            $table->integer('pm_total_performance_score')->nullable();
            $table->string('pm_bonus_recommendation')->nullable();
            $table->text('pm_comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quaterly_bonus_calculations');
    }
}
