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
            font-size: 12px;
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
            font-size: 12px;
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
            font-size: 12px;
        }
        .signature {
            margin-top: 50px;
            text-align: center;
            font-size: 12px;
            /* align-items: center; */
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            height: 200px;
        }
        .signature p {
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
        }
        .signature p span {
            text-decoration: underline;
        }
        .line-space-15 {
            line-height: 1.5;
            text-align: left;
            margin: 0;
        }
        @media print {
            @page {
                size: A4; /* Mengatur ukuran kertas menjadi A4 */
                margin: 2cm; /* Mengatur margin */
            }
            a[href]:after, .header, .footer {
                content: none !important;
                display: none !important;
            }
            @page {
                margin: 0;
            }
            body {
                margin: 1.8cm;
            }
        }
    </style>
</head>
<body>
<p style="text-align: right; font-size: 12px">
    Magetan, {{ \Carbon\Carbon::parse($data['letter_date'])->formatLocalized('%d %B %Y') }}
</p>
    <div class="container">
    <div class="content">
        <p>Nomor : {{ $data['letter_no'] }}</p>
        <p>Lamp : {{ $data['lamp'] }}</p>
        <p>Perihal : {{ $data['regarding'] }}</p>
    </div>
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
            </blockquote><br>
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
            </p>
            <p>
                Demikian surat permohonan ini kami buat untuk mendapatkan persetujuannya. Atas bantuan dan kerjasamanya disampaikan terima kasih.
            </p>
            <div class="signature">
            <p>PT. BPR EKADHARMA BHINARAHARJA<br>
                        Kawedanan - Magetan<br>
                        Direksi<br><br><br>
                        <span>DWIATMODJO BAHAGIO, SP</span><br>
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
