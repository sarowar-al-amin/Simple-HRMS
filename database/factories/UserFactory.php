<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition()
    {
        return [
            'id' => $this->faker->unique()->numerify('BS####'),
            'name' => $this->faker->unique()->name(),
            'email' => $this->faker->unique()->email(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => $this->faker->randomElement(['Admin', 'SBU', 'PM']),
            //'state' => 'active',
            'remember_token' => Str::random(10),

            'expertise_area' => $this->faker->randomElement(['Reactjs', 'Angularjs', 'Nodejs', 'Java', 'C#', '.Net', 'Vuejs', 'Laravel', 'PHP', 'Kotlyn', 'Sales', 'Administration', 'Marketing', 'HR']),
            'employee_type' => $this->faker->randomElement(['Developer', 'Non Developer', 'QA', 'N/A']),
            'managerial_capacity' => $this->faker->randomElement(['Managers', 'Others', 'Self', 'N/A']),
            'employee_category' => $this->faker->randomElement(['Contractual', 'Permanent', 'Probation']),
            'designation' => $this->faker->randomElement(['Software Engineer', 'UI/UX Designer', 'BA', 'Trainee', 'HR', 'Marketing Maneger', 'Project Maneger']),
            // 'work_type' => $this->faker->randomElement(['Billable', 'Billable(investment)', 'Non-billable(L&D)', 'Non-billable(Trainee)', 'Non-billable(Bench)']),
            'level' => $this->faker->randomElement(['IC1', 'IC1B', 'IC2', 'IC2B', 'IC3', 'IC3B', 'M1', 'M1B', 'M2', 'M2B', 'M3', 'M3B']),

            'sbu' => $this->faker->randomElement(['Raisul Islam', 'Support', 'Miftah Zaman']),
            'partner' => $this->faker->randomElement(['Raisul Kabir', 'Mizanur Rahman', 'MJ Ferdous', 'Support']),
            'hr' => $this->faker->randomElement(['Nayem', 'Sojib', 'Siyam', 'Sohel', 'Support', 'Tori']),
            'pm' => $this->faker->randomElement(['Nayem', 'Sojib', 'Siyam', 'Sohel', 'Support', 'Tori']),
            'team' => $this->faker->randomElement(['GLPG', 'Hungry Naki', 'GP', 'ML', 'Support','Bench']),
            'previous_team' => $this->faker->randomElement(['GLPG', 'Hungry Naki', 'GP', 'ML', 'Support']),
            
            'joining_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'confirmation_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'career_start_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),

            'blood_group' => $this->faker->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
            'engagement' => $this->faker->numberBetween($min=50, $max=100),

            'q_1_jul_sep_performance' => $this->faker->randomElement(['Need Improvement', 'Meet Expectation', 'Exceed Expectation']),
            'q_2_oct_dec_performance' => $this->faker->randomElement(['Need Improvement', 'Meet Expectation', 'Exceed Expectation']),
            'q_3_jan_mar_performance' => $this->faker->randomElement(['Need Improvement', 'Meet Expectation', 'Exceed Expectation']),
            'q_1_jul_sep_percentage' => $this->faker->randomFloat(max:3),
            'q_2_oct_dec_percentage' => $this->faker->randomFloat(max:3),
            'q_3_jan_mar_percentage' => $this->faker->randomFloat(max:3),
            'promotion_22a' => $this->faker->randomElement(['Yes', 'No']),
            'promotion_21B' => $this->faker->randomElement(['Yes', 'No']),
            'promotion_21a' => $this->faker->randomElement(['Yes', 'No']),


            //'last_performance' => $this->faker->randomElement(['Need Improvement', 'Meet Expectation Very Well', 'Exceeding Expectations Heavily', 'N/A']),
            //'last_review' => $this->faker->randomElement(['Yes', 'No', 'N/A']),
            // 'comments' => $this->faker->randomElement(['very good developer', 'Lacks concentration', 'N/A']),

            'plan_1' => $this->faker->randomElement(['Warning', 'Bench', 'N/A', 'L&D']),
            'plan_2' => $this->faker->randomElement(['Warning', 'Bench', 'N/A', 'L&D']),
            'current_status' => $this->faker->randomElement(['Bench', 'N/A', 'L&D']),
            'available_from' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
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
