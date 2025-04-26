<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PembelianDetailSeeder extends Seeder
{
    public function run(): void
    {
        $pembelian = DB::table('pembelians')->first();
        $obat = DB::table('obats')->first();

        DB::table('pembelian_details')->insert([
            [
                'id' => Str::uuid(),
                'Nota' => $pembelian->Nota,
                'KdObat' => $obat->KdObat,
                'Jumlah' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
