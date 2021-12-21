<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('salary_reviews', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->date('start');
            $table->date('end');
            $table->string('quarter_id');
            $table->foreign('quarter_id')->references('id')->on('quarters')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('salary_reviews');
    }
}
