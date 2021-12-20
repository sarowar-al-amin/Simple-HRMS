<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Extension\Table\Table;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->string('id')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->integer('role')->default(1);
            $table->integer('state')->default(1);
            $table->rememberToken();

            $table->string('expertise_area')->nullable();
            $table->string('employee_type')->nullable();
            $table->string('managerial_capacity')->nullable();
            $table->string('employee_category')->nullable();
            $table->string('designation')->nullable();
            $table->string('level')->nullable();
            

            $table->string('sbu')->nullable();
            $table->string('partner')->nullable();
            $table->string('hr')->nullable();
            $table->string('mm')->nullable();
            $table->string('team')->nullable();
            $table->string('previous_team')->nullable();

            $table->date('joining_date')->nullable();
            $table->date('confirmation_date')->nullable();
            $table->date('career_start_date')->nullable();

            $table->string('blood_group')->nullable();
            $table->integer('engagement')->nullable();

            $table->string('last_performence')->nullable();
            $table->string('last_review')->nullable();
            $table->text('comments')->nullable();

            $table->string('plan_1')->nullable();
            $table->string('plan_2')->nullable();
            $table->string('current_status')->nullable();
            $table->string('available_from')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
