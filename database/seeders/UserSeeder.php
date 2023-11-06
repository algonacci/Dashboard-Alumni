<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@dashboardalumni.com',
                'role' => 'admin',
                'password' => bcrypt('Admin123.'),
            ],
            [
                'id' => 2,
                'name' => 'User',
                'email' => 'user@dashboardalumni.com',
                'role' => 'user',
                'password' => bcrypt('user12345.'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
