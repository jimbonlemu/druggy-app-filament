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

        DB::table('pembelians')->insert([
            [
                'Nota' => Str::uuid(),
                'TglNota' => now()->subDays(10),
                'Diskon' => 5,
                'KdSuplier' => $supliers->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
