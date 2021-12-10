<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('expertise_area')->nullable();
            $table->string('sbu')->nullable();
            $table->string('partner_id')->nullable();
            $table->string('employee_type')->nullable();
            $table->string('managerial_capacity')->nullable();
            $table->string('hr')->nullable();
            $table->date('joining_date')->nullable();
            $table->date('confirmation_date')->nullable();
            $table->date('career_start_date')->nullable();
            $table->string('employee_category')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('designation')->nullable();
            $table->string('level');
            $table->string('team')->nullable();
            $table->string('previous_team')->nullable();
            $table->integer('engagement')->nullable();
            $table->integer('role');
            $table->string('password');
            $table->integer('state')->default(1);
            $table->rememberToken();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
