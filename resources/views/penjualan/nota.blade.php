<!DOCTYPE html>
<html>

<head>
    <title>Nota Penjualan</title>
    <style>
        body {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <h2>Nota Penjualan</h2>
    <p>No Nota: {{ $penjualan->Nota }}</p>
    <p>Tanggal: {{ \Carbon\Carbon::parse($penjualan->TglNota)->format('d/m/Y') }}</p>
    <p>Pelanggan: {{ $penjualan->pelanggan->NmPelanggan }}</p>

    <table>
        <thead>
            <tr>
                <th>Obat</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penjualan->penjualanDetail as $item)
                <tr>
                    <td>{{ $item->obat->NmObat }}</td>
                    <td>{{ $item->Jumlah }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p>Diskon: {{ $penjualan->Diskon }}%</p>
</body>

</html>
