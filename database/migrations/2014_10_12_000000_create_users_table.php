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
            $table->string('role')->default('employee')->nullable();
            $table->string('state')->default('active');
            $table->rememberToken();

            $table->string('expertise_area')->nullable();
            $table->string('employee_type')->nullable();
            $table->string('managerial_capacity')->nullable();
            $table->string('employee_category')->nullable();
            $table->string('designation')->nullable();
            $table->string('work_type')->nullable();
            $table->string('level')->nullable();
            

            $table->string('sbu')->nullable();
            $table->string('partner')->nullable();
            $table->string('hr')->nullable();
            $table->string('pm')->nullable();
            $table->string('mm')->nullable();
            $table->string('team')->nullable();
            $table->string('previous_team')->nullable();

            $table->date('joining_date')->nullable();
            $table->date('confirmation_date')->nullable();
            $table->date('career_start_date')->nullable();
            $table->string('experience')->nullable();

            $table->string('blood_group')->nullable();
            $table->integer('engagement')->nullable();

            $table->string('eligible_salary_review')->nullable();
            $table->string('eligible_bonus_review')->nullable();

            //$table->string('last_performance')->nullable();
            //$table->string('second_last_performance')->nullable();
            //$table->string('last_promotion')->nullable();
            //$table->string('second_last_promotion')->nullable();
            //$table->text('comments')->nullable();

            $table->string('q_1_jul_sep_performance')->nullable();
            $table->float('q_1_jul_sep_percentage')->nullable();
            $table->string('q_2_oct_dec_performance')->nullable();
            $table->float('q_2_oct_dec_percentage')->nullable();
            $table->string('q_3_jan_mar_performance')->nullable();
            $table->float('q_3_jan_mar_percentage')->nullable();
            $table->string('promotion_22a')->nullable();
            $table->string('promotion_21b')->nullable();
            $table->string('promotion_21a')->nullable();

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