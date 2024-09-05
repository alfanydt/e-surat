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
            font-size: 12pt;
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
            font-size: 14pt;
            margin: 0;
        }
        .header p {
            font-size: 12pt;
            margin: 0;
        }
        .content {
            margin-top: 20px;
        }
        .content p {
            font-size: 12pt;
            margin: 5px 0;
            text-align: justify;
            padding: 2px;
        }
        .footer {
            text-align: center;
            margin-top: 50px;
        }
        .signature {
            margin-top: 50px;
            text-align: center;
            font-size: 12pt;
            /* align-items: center; */
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            height: 200px;
        }
        .signature p {
            /* text-align: right; */
            margin-top: 20px;
            right: 0;
            text-align: center;
        }
        .signature p span {
            text-decoration: underline;
        }
        .indent {
            margin-left: 30px;
        }
        .tembusan {
            margin-top: 0;
            text-align: left;
            padding-left: 60px;
        }
        .signature p:first-child {
            position: relative;
            left: -80px;
            top: 30px;
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
        <div class="content">
        <img src="{{ url('admin/assets/img/bpr.png') }}" alt="Logo" style="max-height: 50px;">
            <!-- <h1>PT. BPR EKADHARMA BHINARAHARJA</h1>
            <p>Jl. Raya Jaranan - Ngadirejo Kec. Kawedanan – Magetan</p> -->
        </div>
        <div class="content">
            <h3 style="text-align: center; text-decoration: underline;">SURAT KETERANGAN</h3>
            <p style="text-align: center; margin-top: -10px;">No. {{ $data ['letter_no'] }}</p>
            <p>Yang bertanda tangan di bawah ini:</p>
            <div class="indent">
                <p>Nama : {{ $data ['sender_name'] }}</p>
                <p>Jabatan : {{ $data ['sender_position'] }}</p>
                <p>Alamat : {{ $data ['sender_address'] }}</p>
            </div><br>
            <p>Menerangkan bahwa SHM:</p>
            <div class="indent">
            <p>Sertifikat Hak Milik Nomor: {{ $data ['shm_number'] }} seluas {{ $data ['shm_area'] }} m² terletak di {{ $data ['shm_location'] }} terdaftar atas nama {{ $data ['shm_owner'] }}.</p>
            <p>Bukan merupakan jaminan kredit di PT. BPR EKADHARMA BHINARAHARJA.</p>
            <p>Demikian surat keterangan ini kami buat dengan sebenarnya.</p>
        </div>
        <div class="signature">
        <p>{{ strftime('%d %B %Y', strtotime($data ['letter_date'])) }}</p>
            <p>PT. BPR EKADHARMA BHINARAHARJA<br><br><br><br><br><br><br>
                        
                        <span>{{ strtoupper($data ['sender_name']) }}</span><br>
                        Direktur Yang Membawahkan Fungsi Kepatuhan 
                        </p>
            </div>
        </div>
        <div class="tembusan">
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
