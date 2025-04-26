<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PenjualanDetailSeeder extends Seeder
{
    public function run(): void
    {
        $penjualan = DB::table('penjualans')->first();
        $obat = DB::table('obats')->first();

        DB::table('penjualan_details')->insert([
            [
                'id' => Str::uuid(),
                'Nota' => $penjualan->Nota,
                'KdObat' => $obat->KdObat,
                'Jumlah' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
