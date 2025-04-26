<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PelangganSeeder extends Seeder
{
    public function run(): void
    {
        $pelangganData = [
            'Budi Santoso',
            'Siti Aminah',
            'Agus Prabowo',
            'Dina Sari',
            'Rudi Setiawan',
            'Mira Cahya',
            'Yuni Siska',
            'Vera Puspita',
            'Dewi Kurnia',
            'Farhan Rizki'
        ];

        foreach ($pelangganData as $nama) {
            DB::table('pelanggans')->insert([
                [
                    'KdPelanggan' => Str::uuid(),
                    'NmPelanggan' => $nama,
                    'Alamat' => 'Jl. Merdeka No. ' . rand(1, 100),
                    'Kota' => 'Surabaya',
                    'Telpon' => '031-' . rand(1000000, 9999999),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
