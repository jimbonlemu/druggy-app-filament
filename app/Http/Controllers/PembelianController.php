<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Barryvdh\DomPDF\Facade\Pdf;

class PembelianController extends Controller
{
    public function print(Pembelian $pembelian)
    {
      
        $pembelian->load('pembelianDetail.obat', 'suplier'); // Load detail + relasi
        $pdf = Pdf::loadView('pembelian.nota', compact('pembelian'));
        return $pdf->stream('nota-pembelian-' . $pembelian->Nota . '.pdf');
    }
}
