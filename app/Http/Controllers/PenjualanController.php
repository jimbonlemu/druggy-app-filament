<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Barryvdh\DomPDF\Facade\Pdf; 
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function cetak(Penjualan $penjualan)
    {
        $penjualan->load('penjualanDetail.obat', 'pelanggan'); // Load relasi
        $pdf = Pdf::loadView('penjualan.nota', compact('penjualan'));

        return $pdf->stream('nota-penjualan-' . $penjualan->Nota . '.pdf');
    }
}
