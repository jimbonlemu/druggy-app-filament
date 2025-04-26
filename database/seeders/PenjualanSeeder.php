<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PenjualanSeeder extends Seeder
{
    public function run(): void
    {
        $pelanggan = DB::table('pelanggans')->pluck('KdPelanggan');

        DB::table('penjualans')->insert([
            [
                'Nota' => Str::uuid(),
                'TglNota' => now()->subDays(5),
                'KdPelanggan' => $pelanggan->random(),
                'Diskon' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
