<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory(1000)->create();
        User::factory(1)->create([
            'id' => 'BSSupport001',
            'name' => 'Admin',
            'email' => 'admin@bs23.com',
            'role' => 'Admin',
        ]);
    }
}
