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

        $obatData = [
            'Paracetamol 500mg',
            'Amoxicillin 250mg',
            'Ibuprofen 400mg',
            'Aspirin 100mg',
            'Metformin 500mg',
            'Vitamin C 500mg',
            'Antibiotic 300mg',
            'Cough Syrup',
            'Anti-allergy',
            'Multivitamin'
        ];

        foreach ($obatData as $obat) {
            DB::table('obats')->insert([
                [
                    'KdObat' => Str::uuid(),
                    'NmObat' => $obat,
                    'Jenis' => 'Tablet',
                    'Satuan' => 'Strip',
                    'HargaBeli' => rand(4000, 15000),
                    'HargaJual' => rand(6000, 25000),
                    'Stok' => rand(50, 200),
                    'KdSuplier' => $supliers->random(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
