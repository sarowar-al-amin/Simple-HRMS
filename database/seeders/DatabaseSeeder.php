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
    }
}
