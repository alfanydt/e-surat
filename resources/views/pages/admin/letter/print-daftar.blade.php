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
            font-size: 12px;
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
            text-align: left;
            margin: 0;
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
            /* text-align: right; */
            margin-top: 20px;
            text-decoration: none;
        }
        .signature p span {
            text-decoration: underline;
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
                margin: 3cm;
            }
        }
    </style>
</head>
<body>
<p style="text-align: right;">
    Magetan, {{ \Carbon\Carbon::parse($data['letter_date'])->formatLocalized('%d %B %Y') }}
</p>
<div class="container">
    <div class="content">
        <p>Nomor  : {{ $data['letter_no'] }}</p>
        <p>Perihal: {{ $data['regarding'] }}</p>
        <p>Lamp   : {{ $data['attachment'] }}</p>
      </div><br>
    <div class="content">
        <p>Kepada Yth :</p>
        <p>Saudara/i {{ $data['recipient_name'] }}</p>
        <p>Di {{ $data['recipient_address'] }}</p><br>
        
        <p>Yang bertanda tangan dibawah ini :</p><br>
        <blockquote class="line-space-15">
            <p>Nama: {{ $data['sender_name'] }}</p>
            <p>Jabatan: {{ $data['sender_position'] }}</p>
            <p>Alamat: {{ $data['sender_address'] }}</p>
        </blockquote><br>

        <p>Dengan ini kami beritahukan bahwa agunan kredit Saudara/i di PT. BPR EKADHARMA BHINARAHARJA sebagai berikut:</p>
        <blockquote>
            <p>{{ $data['collateral_description'] }}</p>
        </blockquote>

        <p>Akan kami daftarkan ke lembaga lelang KPKNL Madiun pada tanggal {{ $data['auction_date'] }}.</p>
        <p>Demikian pemberitahuan ini disampaikan untuk menjadi perhatian Saudara/i.</p>
    </div>

    <div class="signature">
    <p>PT. BPR EKADHARMA BHINARAHARJA<br>
                Kawedanan - Magetan<br>
                Direksi<br><br><br>
                <span>MUHAMMAD NUF BERNADIN, SE</span><br>
                Direktur Utama
                </p>
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
