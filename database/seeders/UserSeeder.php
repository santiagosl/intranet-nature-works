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
            'name' => 'Santiago Sanchez Ruiz',
            'email' => 'santiagosl314@hotmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('Admin');

        User::factory(5)->create();
    }
}
