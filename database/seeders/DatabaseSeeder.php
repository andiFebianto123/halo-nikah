<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\City;
use App\Models\Province;

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
        $this->provinceSeeder();
        $this->citySeeder();

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

    function provinceSeeder(){
        $response = Http::get('https://api.sevenmediatech.com/provinsi', []);
        if($response->status() == 200){
            $provinces = $response->json();
            foreach($provinces['content'] as $province){
                Province::updateOrCreate([
                    'id' => $province['id']
                ], [
                    'name' => $province['name']
                ]);
            }
        }
    }

    function citySeeder(){
        $response = Http::get('https://api.sevenmediatech.com/kota', []);
        if($response->status() == 200){
            $kota = $response->json();
            foreach($kota['content'] as $k){
                City::updateOrCreate([
                    'id' => $k['id']
                ], [
                    'province_id' => $k['province_id'],
                    'name' => $k['name']
                ]);
            }
        }
    }
}
