<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'David',
            'sur_name' => 'Corn',
            'group' => 'Group Name',
            'type' => 'student',
            'email' => 'test@user.com',
            'password' => bcrypt('password')
        ]);

    }
}
