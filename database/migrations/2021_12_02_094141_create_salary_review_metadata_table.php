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
            $table->foreignId('salary_review_id')->constrained()->cascadeOnDelete();
            $table->string('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('categorical_info');
            $table->string('behavioural_info');
            $table->string('performance');
            $table->boolean('promotion');
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
