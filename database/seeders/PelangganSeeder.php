<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PelangganSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pelanggans')->insert([
            [
                'KdPelanggan' => Str::uuid(),
                'NmPelanggan' => 'Budi Santoso',
                'Alamat' => 'Jl. Merdeka No. 45',
                'Kota' => 'Surabaya',
                'Telpon' => '031-5678901',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'KdPelanggan' => Str::uuid(),
                'NmPelanggan' => 'Siti Aminah',
                'Alamat' => 'Jl. Ahmad Yani No. 12',
                'Kota' => 'Yogyakarta',
                'Telpon' => '0274-123456',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
