<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PembelianSeeder extends Seeder
{
    public function run(): void
    {
        $supliers = DB::table('supliers')->pluck('KdSuplier');

        for ($i = 0; $i < 10; $i++) {
            DB::table('pembelians')->insert([
                [
                    'Nota' => Str::uuid(),
                    'TglNota' => now()->subDays(rand(1, 30)),
                    'Diskon' => rand(1, 20),
                    'KdSuplier' => $supliers->random(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
