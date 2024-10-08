<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuartersTable extends Migration
{
    public function up()
    {
        Schema::create('quarters', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->date('start');
            $table->date('end');
        });
    }

    public function down()
    {
        Schema::dropIfExists('quarters');
    }
}
