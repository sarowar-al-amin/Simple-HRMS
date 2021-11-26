<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 'BS0942',
            'role' => 4,
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'active' => true,
            'benched' => false,
            'SBU' => 'Raisul Islam'
        ]);

        DB::table('users')->insert([
            'id' => 'BS0943',
            'role' => 4,
            'name' => 'SBU',
            'email' => 'sbu@gmail.com',
            'password' => Hash::make('password'),
            'active' => true,
            'benched' => false,
            'SBU' => 'Raisul Islam'
        ]);

        DB::table('users')->insert([
            'id' => 'BS0944',
            'role' => 4,
            'name' => 'HR',
            'email' => 'hr@gmail.com',
            'password' => Hash::make('password'),
            'active' => true,
            'benched' => false,
            'SBU' => 'Miftah Zaman'
        ]);

        DB::table('users')->insert([
            'id' => 'BS0945',
            'role' => 4,
            'name' => 'Partner',
            'email' => 'partner@gmail.com',
            'password' => Hash::make('password'),
            'active' => true,
            'benched' => false,
            'SBU' => 'Miftah Zaman'
        ]);
    }
}
