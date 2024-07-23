<!-- resources/views/print-blokir.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Permohonan Pemblokiran Kendaraan</title>
    <style>
        body {
            font-family:  'Times New Roman', Times, serif;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        .header, .footer {
            width: 100%;
            text-align: left;
        }
        .header p, .content p {
            margin: 0;
            padding: 0;
            line-height: 1.5;
        }
        .underline {
            text-decoration: underline;
        }
        .content {
            margin-top: 10px;
        }
        .content p {
            text-align: justify;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: left;
            line-height: 1.0;
        }
        .signature {
            margin-top: 40px;
            text-align: right;
        }
        .signature p {
            text-align: right;
            margin-top: 20px;
        }
        /* .signature-right p {
            margin: 0;
            padding: 0;
            line-height: 1.5;
        }  */
        @media print {
            a[href]:after, .header, .footer {
                content: none !important;
                display: none !important;
            }
            @page {
                margin: 0;
            }
            body {
                margin: 1.6cm;
            }
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="header">
        <p>Nomor: {{ $data['letter_no'] }}</p>
        <p>Lamp: {{ $data['lamp'] }}</p>
        <p>Perihal: {{ $data['regarding'] }}</p>
    </div><br>
        <div class="content">
        <p>Kepada Yth :</p>
        <p>Saudara/i {{ $data['recipient_name'] }}</p>
        <p>Di {{ $data['recipient_address'] }}</p><br>
            <p>Dengan hormat,<br>
            Yang bertanda tangan di bawah ini:
            </p>
            <blockquote class="line-space-15">
                <p>Nama : {{ $data['sender_name'] }}<br>
                Jabatan : {{ $data['sender_position'] }}<br>
                Alamat  : {{ $data['sender_address'] }}</p>
            </blockquote>
            <p>
                Dengan ini kami mengajukan permohonan pemblokiran kendaraan dengan identitas sebagai berikut:
            </p>
            <table>
                <tr>
                    <th>No</th>
                    <th>Identitas</th>
                    <th>Keterangan</th>
                </tr>
                @php
                    $identities = [
                        'Merk / Type',
                        'Model',
                        'Tahun',
                        'Warna',
                        'No. Mesin',
                        'No. Rangka',
                        'No. BPKB',
                        'No. Polisi',
                        'Atas Nama',
                        'Alamat'
                    ];
                @endphp
                @foreach ($identities as $index => $identity)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $identity }}</td>
                    <td>{{ explode("\n", $data['vehicle_details'])[$index] ?? 'Tidak ada data' }}</td>
                </tr>
                @endforeach
            </table>
            <p>
                Hal ini dikarenakan kendaraan tersebut sebagai barang jaminan kredit di PT. BPR EKADHARMA BHINARAHARJA dan dinyatakan macet. (Fotocopy BPKB dan STNK terlampir).
            </p><br>
            <p>
                Demikian surat permohonan ini kami buat untuk mendapatkan persetujuannya. Atas bantuan dan kerjasamanya disampaikan terima kasih.
            </p>
            <div class="signature">
                <p>PT. BPR EKADHARMA BHINARAHARJA<br>
                Kawedanan - Magetan<br>
                Direksi<br><br><br>
                DWIATMODJO BAHAGIO SP<br>
                Direktur Yang Membawahkan Fungsi Kepatuhan
                </p>
            </div>
            <div class="tembusan">
                <p class="underline">Tembusan :</p>
                <p>{{ $data['cc'] }}</p>
            </div>
        </div>
    </div>
    <script>
        window.print();
        window.onafterprint = window.close;
    </script>
</body>
</html>
