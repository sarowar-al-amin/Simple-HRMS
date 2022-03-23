<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnglishCommunicationSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('english_communication_skills', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->unique();
            $table->foreign('user_id')->references('id')->on('users');
            $table->float('speaking')->default(0);
            $table->float('writing')->default(0);
            $table->float('listening')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('english_communication_skills');
    }
}
