<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryReview22bMetadataTable extends Migration
{
    public function up()
    {
        Schema::create('salary_review22b_metadata', function (Blueprint $table) {
            $table->id();
            $table->string('salary_review_id');
            $table->foreign('salary_review_id')->references('id')->on('salary_reviews')->cascadeOnDelete()->cascadeOnUpdate();
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
            $table->string('ownership_rating')->nullable();
            $table->integer('ownership_score')->nullable();
            $table->text('ownership_justification')->nullable();
            $table->string('passion_rating')->nullable();
            $table->integer('passion_score')->nullable();
            $table->text('passion_justification')->nullable();
            $table->string('agility_rating')->nullable();
            $table->integer('agility_score')->nullable();
            $table->text('agility_justification')->nullable();
            $table->string('team_spirit_rating')->nullable();
            $table->integer('team_spirit_score')->nullable();
            $table->text('team_spirit_justification')->nullable();
            $table->string('honesty_rating')->nullable();
            $table->integer('honesty_score')->nullable();
            $table->text('honesty_justification')->nullable();
            $table->string('sbu_total_performance_rating')->nullable();
            $table->integer('sbu_total_performance_score')->nullable();
            $table->string('sbu_promotion_recommendation')->nullable();
            $table->text('sbu_comment')->nullable();
            $table->string('pm_total_performance_rating')->nullable();
            $table->integer('pm_total_performance_score')->nullable();
            $table->string('pm_promotion_recommendation')->nullable();
            $table->text('pm_comment')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('salary_review22b_metadata');
    }
}
