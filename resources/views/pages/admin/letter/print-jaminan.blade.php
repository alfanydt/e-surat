<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Jaminan SHM</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding-top: 50px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 18px;
            margin: 0;
        }
        .header p {
            font-size: 14px;
            margin: 0;
        }
        .content {
            margin-top: 20px;
        }
        .content p {
            font-size: 14px;
            margin: 5px 0;
            text-align: justify;
        }
        .footer {
            text-align: center;
            margin-top: 50px;
        }
        .signature {
            margin-top: 40px;
            text-align: right;
        }
        .signature p {
            text-align: right;
            margin-top: 20px;
        }
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
            <img src="{{ asset('path/to/your/logo.png') }}" alt="Logo" style="max-height: 50px;">
            <h1>PT. BPR EKADHARMA BHINARAHARJA</h1>
            <p>Jl. Raya Jaranan - Ngadirejo Kec. Kawedanan – Magetan</p>
        </div>
        <div class="content">
            <h3 style="text-align: center; text-decoration: underline;">SURAT KETERANGAN</h3>
            <p style="text-align: center;">No. {{ $letter_no }}</p>
            <p>Yang bertanda tangan di bawah ini:</p>
            <p>Nama : {{ $sender_name }}</p>
            <p>Jabatan : {{ $sender_position }}</p>
            <p>Alamat : {{ $sender_address }}</p>
            <p>Menerangkan bahwa SHM:</p>
            <p>Sertifikat Hak Milik Nomor: {{ $shm_number }} seluas {{ $shm_area }} m² ({{ $shm_area_text }} Meter Persegi) terletak di {{ $shm_location }} terdaftar atas nama {{ $shm_owner }}.</p>
            <p>Bukan merupakan jaminan kredit di PT. BPR EKADHARMA BHINARAHARJA.</p>
            <p>Demikian surat keterangan ini kami buat dengan sebenarnya.</p>
        </div>
        <div class="signature">
            <p>{{ date('d F Y', strtotime($letter_date)) }}</p>
            <p>PT. BPR EKADHARMA BHINARAHARJA<br>
            Kawedanan - Magetan<br>
            Direksi<br><br><br>
            {{ $sender_name }}<br>
            {{ $sender_position }}
            </p>
        </div>
        <div class="content">
            <p>Tembusan :</p>
            <p>1. Arsip</p>
        </div>
    </div>
    <script>
        window.print();
        window.onafterprint = window.close;
    </script>
</body>
</html>
