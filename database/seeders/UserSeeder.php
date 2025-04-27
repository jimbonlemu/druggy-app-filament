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
            'name' => 'Iqbal Ben Avraham',
            'email' => 'iql@sanews.com',
            'role' => 'admin',
            'password' => bcrypt('secured'),
        ]);
        User::create([
            'name' => 'Iqbal Maulana',
            'email' => 'mim@m.com',
            'role' => 'apoteker',
            'password' => bcrypt('secured'),
        ]);
        User::create([
            'name' => 'Eko Khanedy',
            'email' => 'eko@e.com',
            'role' => 'pelanggan',
            'password' => bcrypt('secured'),
        ]);
    }
}
