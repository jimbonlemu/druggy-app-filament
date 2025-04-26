<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PembelianDetailSeeder extends Seeder
{
    public function run(): void
    {
        $pembelians = DB::table('pembelians')->pluck('Nota');
        $obats = DB::table('obats')->pluck('KdObat');

        for ($i = 0; $i < 10; $i++) {
            DB::table('pembelian_details')->insert([
                [
                    'id' => Str::uuid(),
                    'Nota' => $pembelians->random(),
                    'KdObat' => $obats->random(),
                    'Jumlah' => rand(50, 100),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
