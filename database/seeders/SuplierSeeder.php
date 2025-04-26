<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SuplierSeeder extends Seeder
{
    public function run(): void
    {
        $suplierData = [
            'PT Kimia Farma',
            'PT Indofarma',
            'PT Sidomuncul',
            'PT Kalbe Farma',
            'PT Herbalife',
            'PT Dexa Medica',
            'PT Novartis',
            'PT Merck',
            'PT Roche',
            'PT Sanofi'
        ];

        foreach ($suplierData as $nama) {
            DB::table('supliers')->insert([
                [
                    'KdSuplier' => Str::uuid(),
                    'NmSuplier' => $nama,
                    'Alamat' => 'Jl. ' . Str::random(10) . ' No. ' . rand(1, 100),
                    'Kota' => 'Jakarta',
                    'Telpon' => '021-' . rand(1000000, 9999999),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
