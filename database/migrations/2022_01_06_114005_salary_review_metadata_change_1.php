<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SalaryReviewMetadataChange1 extends Migration
{
    public function up()
    {
        Schema::table('salary_review_metadata', function (Blueprint $table) {
            $table->text('categorical_justifications')->nullable()->change();
            $table->text('behavioural_justifications')->nullable()->change();
            $table->text('sbu_comment')->change();
        });
    }

    public function down()
    {
        
    }
}
