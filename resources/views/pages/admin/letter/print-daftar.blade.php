<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pendaftaran</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 40px;
        }
        .header, .footer {
            width: 100%;
            text-align: left;
        }
        .header p, .footer p {
            margin: 0;
            line-height: 1.0;
        }
        .underline {
            text-decoration: underline;
        }
        .content {
            margin-top: 20px;
        }
        .content p {
            line-height: 1.0;
            margin: 0;
        }
        .line-space-15 {
            line-height: 1.5;
        }
        .signature {
            margin-top: 40px;
            text-align: right;
        }
        .text-right {
            text-align: right;
        }
        .indent {
            text-indent: 50px;
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
    <div class="header">
        <p>Nomor: {{ $data['letter_no'] }}</p>
        <p>Perihal: {{ $data['regarding'] }}</p>
        <p>Lamp: {{ $data['attachment'] }}</p>
    </div>
    
    <div class="content">
        <p>Kepada Yth :</p>
        <p>Saudara/i {{ $data['recipient_name'] }}</p>
        <p>Di {{ $data['recipient_address'] }}</p>
        
        <p>Yang bertanda tangan dibawah ini :</p>
        <blockquote class="line-space-15">
            <p>Nama: {{ $data['sender_name'] }}<br>
            Jabatan: {{ $data['sender_position'] }}<br>
            Alamat: {{ $data['sender_address'] }}</p>
        </blockquote>

        <p>Dengan ini kami beritahukan bahwa agunan kredit Saudara/i di PT. BPR EKADHARMA BHINARAHARJA sebagai berikut:</p>
        <blockquote>
            <p>{{ $data['collateral_description'] }}</p>
        </blockquote>

        <p>Akan kami daftarkan ke lembaga lelang KPKNL Madiun pada tanggal {{ $data['auction_date'] }}.</p>
        <p>Demikian pemberitahuan ini disampaikan untuk menjadi perhatian Saudara/i.</p>
    </div>

    <div class="footer">
        <p>PT. BPR “EKADHARMA BHINARAHARJA”</p>
        <p>Kawedanan – Magetan</p>
        <p>Direksi</p>
        
        <div class="signature">
            <p>{{ $data['sender_name'] }}<br>
            Direktur Utama</p>
        </div>
    </div>
    
    <div class="tembusan">
        <p class="underline">Tembusan :</p>
        <p>{{ $data['cc'] }}</p>
    </div>

    <script>
        window.print();
        window.onafterprint = window.close;
    </script>
</body>
</html>
