<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PenjualanDetailSeeder extends Seeder
{
    public function run(): void
    {
        $penjualans = DB::table('penjualans')->pluck('Nota');
        $obats = DB::table('obats')->pluck('KdObat');

        for ($i = 0; $i < 10; $i++) {
            DB::table('penjualan_details')->insert([
                [
                    'id' => Str::uuid(),
                    'Nota' => $penjualans->random(),
                    'KdObat' => $obats->random(),
                    'Jumlah' => rand(1, 5),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
