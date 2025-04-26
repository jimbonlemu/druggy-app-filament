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

        for ($i = 0; $i < 10; $i++) {
            DB::table('penjualans')->insert([
                [
                    'Nota' => Str::uuid(),
                    'TglNota' => now()->subDays(rand(1, 30)),
                    'KdPelanggan' => $pelanggan->random(),
                    'Diskon' => rand(5, 20),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
