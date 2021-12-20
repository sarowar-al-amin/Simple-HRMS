<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),

            // $table->string('id')->unique();
            // $table->string('name');
            // $table->string('email')->unique();
            // $table->string('password');
            // $table->integer('role')->default(1);
            // $table->integer('state')->default(1);
            // $table->rememberToken();

            // $table->string('expertise_area')->nullable();
            // $table->string('employee_type')->nullable();
            // $table->string('managerial_capacity')->nullable();
            // $table->string('employee_category')->nullable();
            // $table->string('designation')->nullable();
            // $table->string('level')->nullable();
            

            // $table->string('sbu')->nullable();
            // $table->string('partner')->nullable();
            // $table->string('hr')->nullable();
            // $table->string('team')->nullable();
            // $table->string('previous_team')->nullable();

            // $table->date('joining_date')->nullable();
            // $table->date('confirmation_date')->nullable();
            // $table->date('career_start_date')->nullable();

            // $table->string('blood_group')->nullable();
            // $table->integer('engagement')->nullable();
        ];
    }

    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
