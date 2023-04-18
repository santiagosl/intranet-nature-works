<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'Administrador@nature-works.com',
            'password' => bcrypt('6rG5B6')
        ])->assignRole('Admin');

        User::factory(5)->create();
    }
}
