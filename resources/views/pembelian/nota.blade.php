<!DOCTYPE html>
<html>

<head>
    <title>Nota Pembelian</title>
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
    <h2>Nota Pembelian</h2>
    <p>No Nota: {{ $pembelian->Nota }}</p>
    <p>Tanggal: {{ \Carbon\Carbon::parse($pembelian->TglNota)->format('d/m/Y') }}</p>
    <p>Suplier: {{ $pembelian->suplier->NmSuplier }}</p>

    <table>
        <thead>
            <tr>
                <th>Obat</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembelian->pembelianDetail as $item)
                <tr>
                    <td>{{ $item->obat->NmObat }}</td>
                    <td>{{ $item->Jumlah }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p>Diskon: {{ $pembelian->Diskon }}%</p>
</body>

</html>
