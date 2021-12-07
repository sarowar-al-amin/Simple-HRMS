<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryReviewMetadataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_review_metadata', function (Blueprint $table) {
            $table->id();
            $table->string('salary_review_id');
            $table->foreign('salary_review_id')->references('id')->on('salary_reviews');
            $table->string('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('feedback');
            $table->text('justification');
            $table->string('behaviour');
            $table->string('performance');
            $table->string('promotion');
            $table->string('comment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salary_review_metadata');
    }
}
