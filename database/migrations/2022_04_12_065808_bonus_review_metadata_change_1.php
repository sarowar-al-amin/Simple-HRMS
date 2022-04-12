<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BonusReviewMetadataChange1 extends Migration
{
    public function up()
    {
        Schema::table('bonus_review_metadata', function (Blueprint $table) {
            $table->string('approval_state')->nullable();

        });
    }

    public function down()
    {
        Schema::table('bonus_review_metadata', function (Blueprint $table) {
            $table->dropColumn('approval_state')->nullable();
        });
    }
}
