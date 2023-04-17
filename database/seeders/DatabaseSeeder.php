<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
Use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Storage::deleteDirectory('pdf');
        Storage::makeDirectory('pdf');

        $this->call(UserSeeder::class);
        $this->call(PedidosSeeder::class);
    }
}
