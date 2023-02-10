<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'name' => 'admin',
            'email' => 'admin@example.com',
            'role' => 1,
            'status' => 1,
            'password' => bcrypt('password'),
        ];

        $user = [
            'name' => 'user',
            'email' => 'user@example.com',
            'role' => 2,
            'status' => 0,
            'password' => bcrypt('password'),
        ];

        User::create($user);
        User::create($admin);
    }
}
