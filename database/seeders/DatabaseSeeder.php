<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create(['username' => 'admin', 'password' => bcrypt('password'), 'role' => 'admin']);
        User::create(['username' => 'staff', 'password' => bcrypt('password'), 'role' => 'staff']);
        User::create(['username' => 'user', 'password' => bcrypt('password'), 'role' => 'user']);
    }
}