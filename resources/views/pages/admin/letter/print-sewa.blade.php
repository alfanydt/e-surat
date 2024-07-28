<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Perjanjian Sewa Kendaraan Bermotor</title>
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
            <h1>Surat Perjanjian Sewa Kendaraan Bermotor</h1>
            <p>No: {{ $letter_no }}</p>
        </div>
        <div class="content">
            <p>Pada hari ini {{ \Carbon\Carbon::parse($letter_date)->isoFormat('dddd, D MMMM YYYY') }} kami yang bertanda tangan di bawah ini :</p>
            <p>Nama: {{ $first_party_name }}</p>
            <p>Alamat: {{ $first_party_address }}</p>
            <p>NIK: {{ $first_party_nik }}</p>
            <p>Untuk selanjutnya disebut sebagai Pihak Pertama atau Pemilik.</p>
            <p>Nama: {{ $second_party_name }}</p>
            <p>Alamat: {{ $second_party_address }}</p>
            <p>Jabatan: {{ $second_party_position }}</p>
            <p>NIK: {{ $second_party_nik }}</p>
            <p>Untuk selanjutnya disebut sebagai Pihak Kedua atau Penyewa dan bertindak untuk dan atas nama PT. BPR EKADHARMA BHINARAHARJA.</p>
            <p>Selanjutnya kedua belah pihak setuju untuk melakukan transaksi sewa menyewa 1 (satu) unit kendaraan bermotor dengan spesifikasi sebagai berikut:</p>
            <p>Jenis: {{ $vehicle_type }}</p>
            <p>Merk: {{ $vehicle_brand }}</p>
            <p>Type: {{ $vehicle_model }}</p>
            <p>Tahun: {{ $vehicle_year }}</p>
            <p>Warna: {{ $vehicle_color }}</p>
            <p>Isi Silinder: {{ $vehicle_engine_size }}</p>
            <p>No. Rangka: {{ $vehicle_frame_no }}</p>
            <p>No. Mesin: {{ $vehicle_engine_no }}</p>
            <p>No. BPKB: {{ $vehicle_bpkb_no }}</p>
            <p>No. Polisi: {{ $vehicle_plate_no }}</p>
            <p>Atas Nama: {{ $vehicle_owner }}</p>
            <p>Alamat: {{ $vehicle_owner_address }}</p>
            <p>Adapun syarat sewa menyewa sebagai berikut:</p>
            <p>1. Harga sewa Rp. 350.000,- per bulan dan dibayarkan setiap bulannya kepada Pihak Pertama.</p>
            <p>2. Harga sewa merupakan harga tetap yang tidak akan berubah selama perjanjian sewa ini berlangsung.</p>
            <p>3. Masa sewa adalah 12 (dua belas) bulan sejak tanggal berlakunya perjanjian ini.</p>
            <p>4. Perjanjian ini akan berakhir apabila baki debet Pihak Pertama dibawah ketentuan perjanjian sewa kendaraan yaitu kurang dari Rp. 1.500.000.000,00 (Satu miliar lima ratus juta rupiah).</p>
            <p>5. BBM operasional ditanggung oleh Pihak Kedua sesuai dengan ketentuan yang berlaku.</p>
            <p>6. Pajak kendaraan, service rutin, ganti oli, ganti spare part, ganti ban menjadi tanggung jawab Pihak Pertama.</p>
            <p>7. Keamanan, kebersihan, dan cuci kendaraan menjadi tanggung jawab Pihak Pertama.</p>
            <p>8. Kehilangan atau kerusakan yang diakibatkan oleh kecelakaan selama Jam Kerja ditanggung kedua belah pihak.</p>
            <p>9. Kedua belah pihak dibebaskan dari segala macam tuntutan ganti rugi atau tanggung jawab jika terjadi Force Majeure.</p>
            <p>10. Pihak Pertama tidak diperkenankan menyewakan atau memindah tangankan ke Pihak Ketiga selama perjanjian masih berlaku.</p>
            <p>11. Bila Pihak Pertama atau Pihak Kedua bermaksud memutuskan kontrak sewa menyewa maka kedua belah pihak harus memberitahukan selambat-lambatnya 2 minggu sebelumnya.</p>
            <p>Demikian surat perjanjian sewa menyewa ini dibuat agar dapat dipergunakan sebagaimana mestinya dan dibuat rangkap 2 (dua) dengan dilampirkan materai serta mempunyai kekuatan hukum yang sama.</p>
        </div>
        <div class="footer">
            <div class="signature">
                <p>{{ date('d F Y', strtotime($letter_date)) }}</p>
                <p>PT. BPR EKADHARMA BHINARAHARJA<br>
                Kawedanan - Magetan<br>
                Direksi<br><br><br>
                {{ $second_party_name }}<br>
                {{ $second_party_position }}
                </p>
            </div>
            <div class="signature" style="text-align: left;">
                <p>PIHAK PERTAMA</p>
                <p>{{ $first_party_name }}</p>
            </div>
        </div>
    </div>
</body>
</html>
