<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => 1,
            'name' => 'Frank Lawrent',
            'email' => 'frenklawrent12@gmail.com',
            'password' => '$2y$12$Gx53QPpyswfRPZ0daHbtDu8dhBj4DKJPGrL9ilaTNOCI1y5ZYuypa'
        ]);
    }
}
