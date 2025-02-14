<?php

namespace Database\Seeders;

use App\Models\Post;
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
            'name' => 'Client User',
            'email' => 'client@email.com',
            'password' => bcrypt('password'),
            'role' => 'client'
        ]);

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@email.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        Post::factory()->count(10)->create();
    }
}
