<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSbusTable extends Migration
{
    public function up()
    {
        Schema::create('sbus', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('name');
            $table->string('partner_id');
            // $table->foreign('partner_id')->references('id')->on('partners');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sbus');
    }
}
