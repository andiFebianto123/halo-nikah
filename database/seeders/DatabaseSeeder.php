<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::updateOrCreate([
            'email' => 'admin@javamicepro.com'
        ], [
            'name' => 'Admin',
            'email' => 'admin@javamicepro.com',
            'password' => bcrypt('12345678'),
            'no_wa' => '08984036667',
            'role' => 'admin',
        ]);

        // User::updateOrCreate([
        //     'email' => 'admin@javamicepro.com'
        // ], [
        //     'name' => 'Admin',
        //     'email' => 'admin@javamicepro.com',
        //     'password' => bcrypt('12345678'),
        //     'no_wa' => '08984036667',
        //     'role' => 'cs',
        // ]);
    }
}
