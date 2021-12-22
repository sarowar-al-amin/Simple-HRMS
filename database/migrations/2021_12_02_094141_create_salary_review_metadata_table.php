<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryReviewMetadataTable extends Migration
{
    public function up()
    {
        Schema::create('salary_review_metadata', function (Blueprint $table) {
            $table->id();
            $table->string('salary_review_id');
            $table->foreign('salary_review_id')->references('id')->on('salary_reviews');
            $table->string('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('feedbacks');
            $table->string('justifications');
            $table->string('behaviours');
            $table->string('performance');
            $table->string('promotion');
            $table->string('comment');
        });
    }

    public function down()
    {
        Schema::dropIfExists('salary_review_metadata');
    }
}
