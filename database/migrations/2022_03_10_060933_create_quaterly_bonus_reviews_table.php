<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuaterlyBonusReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quaterly_bonus_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('quaterly_bonus_id');
            $table->string('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            // $table->string('user_name');
            $table->string('last_performance');
            $table->foreign('last_performance')->references('performance')->on('salary_review_metadata')->cascadeOnUpdate();
            $table->unsignedInteger('point_1')->default(0);
            $table->unsignedInteger('point_2')->default(0);
            $table->unsignedInteger('point_3')->default(0);
            $table->unsignedInteger('point_4')->default(0);
            $table->unsignedInteger('point_5')->default(0);
            $table->unsignedInteger('total_point_pm')->default(0);
            $table->unsignedInteger('total_point_sbu')->default(0);
            $table->string('comment');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quaterly_bonus_reviews');
    }
}
