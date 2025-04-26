<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([
            UserSeeder::class,
            SuplierSeeder::class,
            ObatSeeder::class,
            PelangganSeeder::class,
            PembelianSeeder::class,
            PembelianDetailSeeder::class,
            PenjualanSeeder::class,
            PenjualanDetailSeeder::class,
        ]);
    }
}
