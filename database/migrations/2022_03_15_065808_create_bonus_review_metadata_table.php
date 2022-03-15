<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonusReviewMetadataTable extends Migration
{
    public function up()
    {
        Schema::create('bonus_review_metadata', function (Blueprint $table) {
            $table->id();
            $table->string('bonus_review_id');
            $table->foreign('bonus_review_id')->references('id')->on('bonus_reviews')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('sbu')->nullable();
            $table->string('pm')->nullable();
            $table->integer('technical')->nullable();
            $table->integer('execution')->nullable();
            $table->integer('collaboration')->nullable();
            $table->integer('influence')->nullable();
            $table->integer('maturity')->nullable();
            $table->integer('sbu_score')->nullable();
            $table->integer('pm_score')->nullable();
            $table->string('sbu_feedback');
            $table->string('pm_feedback');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bonus_review_metadata');
    }
}
