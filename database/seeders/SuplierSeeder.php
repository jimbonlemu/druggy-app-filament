<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SuplierSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('supliers')->insert([
            [
                'KdSuplier' => Str::uuid(),
                'NmSuplier' => 'PT Kimia Farma',
                'Alamat' => 'Jl. Veteran No. 10',
                'Kota' => 'Jakarta',
                'Telpon' => '021-1234567',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'KdSuplier' => Str::uuid(),
                'NmSuplier' => 'PT Indofarma',
                'Alamat' => 'Jl. Sudirman No. 55',
                'Kota' => 'Bandung',
                'Telpon' => '022-7654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
