<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ObatSeeder extends Seeder
{
    public function run(): void
    {
        $supliers = DB::table('supliers')->pluck('KdSuplier');

        DB::table('obats')->insert([
            [
                'KdObat' => Str::uuid(),
                'NmObat' => 'Paracetamol 500mg',
                'Jenis' => 'Tablet',
                'Satuan' => 'Strip',
                'HargaBeli' => 5000,
                'HargaJual' => 8000,
                'Stok' => 200,
                'KdSuplier' => $supliers->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'KdObat' => Str::uuid(),
                'NmObat' => 'Amoxicillin 250mg',
                'Jenis' => 'Kapsul',
                'Satuan' => 'Box',
                'HargaBeli' => 15000,
                'HargaJual' => 22000,
                'Stok' => 120,
                'KdSuplier' => $supliers->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
