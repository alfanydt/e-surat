<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Perjanjian Sewa Kendaraan Bermotor</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif; 
            line-height: 1.2;  /* Reduced line-height */
            margin: 10px; /* Reduced margin */
        }

        .container {
            width: 80%; 
            margin: 0 auto;
            padding: 10px; /* Reduced padding */
            /* border: 1px solid #ccc;  */
        }

        .header {
            text-align: center;
            margin-bottom: 20px; /* Reduced margin-bottom */
        }

        .header h1 {
            margin-bottom: 5px; /* Reduced margin-bottom for title */
            font-size: 18pt; /* Adjusted font-size for title */
        }
        .content h3 {
            text-decoration: underline;
            font-size: 14pt;
            margin-bottom: -10px;
        }
        .content p {
            margin-bottom: 10px; /* Reduced margin-bottom for paragraphs */
            text-align: justify; 
            font-size: 14pt; /* Reduced font-size */
        }

        .content ol {
            margin-left: 20px; 
            list-style-type: decimal; 
            font-size: 14pt; /* Reduced font-size */
        }

        .footer {
            /* margin-top: 30px; 
            display: flex;
            justify-content: space-between;
            align-items: flex-end; */
            display: flex;
            justify-content: space-between; /* Membagi ruang secara merata antara dua elemen */
            align-items: flex-start; /* Menyusun elemen di bagian atas */
            padding: 0 20px; /* Menambahkan padding horizontal */
            margin-top: 50px; /* Jarak antara bagian atas dan footer */
        }

        .signature {
            width: 45%;
            margin-top: 50px;
            text-align: center;
            font-size: 14pt;
            /* align-items: center; */
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            height: 200px;
        }

        .signature-left, .signature-right {
            text-align: center; /* Menyelaraskan teks ke tengah dalam setiap kolom */
            font-size: 14pt;
            flex: 1; /* Membuat kolom kiri dan kanan memiliki lebar yang sama */
        }
        .signature-left {
            margin-right: 20px; /* Memberikan jarak antara kolom kiri dan kanan */
        }

        .signature-right p {
            margin: 5px 0; /* Mengatur jarak vertikal antar paragraf */
        }

        .signature-left p {
            margin: 5px 0; /* Mengatur jarak vertikal antar paragraf */
        }
        /* .signature-left {
            flex-basis: 45%; 
            text-align: left;
        } */
        .signature p span {
            text-decoration: underline;
        }

        /* .signature-right {
            text-align: right;
        } */

        .signature p {
            margin: 3px 0; /* Reduced margin for signature lines */
            font-size: 14pt; /* Reduced font-size */
        }
        @media print {
            a[href]:after, .header, {
                content: none !important;
                display: none !important;
            }
            @page {
                margin: 1cm 1cm 2cm 1cm;
                size: A4; /* Mengatur ukuran kertas menjadi A4 */

            }
            body {
                font-size: 12pt; /* Set the font size to 12pt */
            }

            .header h1, 
            .content h3, 
            .content p, 
            .content ol, 
            .signature, 
            .signature-left, 
            .signature-right, 
            .signature p {
                font-size: 12pt; /* Ensure all text elements print in 12pt */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content" style="text-align: center;">
            <h3>SURAT PERJANJIAN SEWA KENDARAAN BERMOTOR</h3>
            <p style="text-align: center;">NOMOR : {{ $data['letter_no'] }}</p>
        </div>
        <div class="content">
            <!-- <p>Pada hari ini {{ \Carbon\Carbon::parse($data['letter_date'])->isoFormat('dddd, D MMMM YYYY') }} kami yang bertanda tangan di bawah ini :</p>
            <p>Nama: {{ $data['first_party_name'] }}</p>
            <p>Alamat: {{ $data['first_party_address'] }}</p>
            <p>NIK: {{ $data['first_party_nik'] }}</p>
            <p>Untuk selanjutnya disebut sebagai Pihak Pertama atau Pemilik.</p>
            <p>Nama: {{ $data['second_party_name'] }}</p>
            <p>Alamat: {{ $data['second_party_address'] }}</p>
            <p>Jabatan: {{ $data['second_party_position'] }}</p>
            <p>NIK: {{ $data['second_party_nik'] }}</p> -->
            <p style="text-align: justify;">
                Pada hari ini {{ \Carbon\Carbon::parse($data['letter_date'])->isoFormat('dddd, D MMMM YYYY') }} ({{ \Carbon\Carbon::parse($data['letter_date'])->isoFormat('D MMMM YYYY') }}) kami yang bertanda tangan di bawah ini:
            </p>
            <ol style="list-style-type: decimal; margin-left: 0;">
                <li style="margin-left: 1em;">
                    <div style="display: flex; align-items: center;">
                        <p style="margin-left: 1em; width: 40px;">Nama</p>
                        <p><span>: {{ $data['first_party_name'] }}</span></p>
                    </div>
                    <div style="display: flex; align-items: center;">
                        <p style="margin-left: 1em; width: 40px;">Alamat</p>
                        <p><span>: {{ $data['first_party_address'] }}</span></p>
                    </div>
                    <div style="display: flex; align-items: center;">
                        <p style="margin-left: 1em; width: 40px;">NIK</p>
                        <p><span>: {{ $data['first_party_nik'] }}</span></p>
                    </div>

                    <p style="margin-left: -4.1em;">Untuk selanjutnya disebut sebagai Pihak Pertama atau Pemilik.</p>
                </li>
                <!-- <li style="margin-left: 1em;">
                    <p style="margin-left: 1em;">Nama: <span>{{ $data['second_party_name'] }}</span></p>
                    <p style="margin-left: 1em;">Alamat: <span>{{ $data['second_party_address'] }}</span></p>
                    <p style="margin-left: 1em;">Jabatan: <span>{{ $data['second_party_position'] }}</span></p>
                    <p style="margin-left: 1em;">NIK: <span>{{ $data['second_party_nik'] }}</span></p>
                </li> -->
                <li style="margin-left: 1em;">
                <div style="display: flex; align-items: center; margin-left: 1em;">
                    <p style="width: 40px;">Nama</p>
                    <p><span>: {{ $data['second_party_name'] }}</span></p>
                </div>
                <div style="display: flex; align-items: center; margin-left: 1em;">
                    <p style="width: 40px;">Alamat</p>
                    <p><span>: {{ $data['second_party_address'] }}</span></p>
                </div>
                <div style="display: flex; align-items: center; margin-left: 1em;">
                    <p style="width: 40px;">Jabatan</p>
                    <p><span>: {{ $data['second_party_position'] }}</span></p>
                </div>
                <div style="display: flex; align-items: center; margin-left: 1em;">
                    <p style="width: 40px;">NIK</p>
                    <p><span>: {{ $data['second_party_nik'] }}</span></p>
                </div>
            </li>
            </ol>
            <p>Untuk selanjutnya disebut sebagai Pihak Kedua atau Penyewa dan bertindak untuk dan atas nama PT. BPR EKADHARMA BHINARAHARJA.</p>
            <p>Selanjutnya kedua belah pihak setuju untuk melakukan transaksi sewa menyewa 1 (satu) unit kendaraan bermotor dengan spesifikasi sebagai berikut:</p>
        
            <div style="display: flex; flex-direction: column;">
                <div style="display: flex;">
                    <p style="width: 70px;">Jenis</p>
                    <p>: {{ $data['vehicle_type'] }}</p>
                </div>
                <div style="display: flex;">
                    <p style="width: 70px;">Merk</p>
                    <p>: {{ $data['vehicle_brand'] }}</p>
                </div>
                <div style="display: flex;">
                    <p style="width: 70px;">Type</p>
                    <p>: {{ $data['vehicle_model'] }}</p>
                </div>
                <div style="display: flex;">
                    <p style="width: 70px;">Tahun</p>
                    <p>: {{ $data['vehicle_year'] }}</p>
                </div>
                <div style="display: flex;">
                    <p style="width: 70px;">Warna</p>
                    <p>: {{ $data['vehicle_color'] }}</p>
                </div>
                <div style="display: flex;">
                    <p style="width: 70px;">Isi Silinder</p>
                    <p>: {{ $data['vehicle_engine_size'] }}</p>
                </div>
                <div style="display: flex;">
                    <p style="width: 70px;">No. Rangka</p>
                    <p>: {{ $data['vehicle_frame_no'] }}</p>
                </div>
                <div style="display: flex;">
                    <p style="width: 70px;">No. Mesin</p>
                    <p>: {{ $data['vehicle_engine_no'] }}</p>
                </div>
                <div style="display: flex;">
                    <p style="width: 70px;">No. BPKB</p>
                    <p>: {{ $data['vehicle_bpkb_no'] }}</p>
                </div>
                <div style="display: flex;">
                    <p style="width: 70px;">No. Polisi</p>
                    <p>: {{ $data['vehicle_plate_no'] }}</p>
                </div>
                <div style="display: flex;">
                    <p style="width: 70px;">Atas Nama</p>
                    <p>: {{ $data['vehicle_owner'] }}</p>
                </div>
                <div style="display: flex;">
                    <p style="width: 70px;">Alamat</p>
                    <p>: {{ $data['vehicle_owner_address'] }}</p>
                </div>
            </div>

            <p>Adapun syarat sewa menyewa sebagai berikut:</p>
            <ol style="text-align: justify;">
                <li>Harga sewa Rp. 350.000,- per bulan dan dibayarkan setiap bulannya kepada Pihak Pertama.</li>
                <li>Harga sewa merupakan harga tetap yang tidak akan berubah selama perjanjian sewa ini berlangsung.</li>
                <li>Masa sewa adalah 12 (dua belas) bulan sejak tanggal berlakunya perjanjian ini.</li>
                <li>Perjanjian ini akan berakhir apabila baki debet Pihak Pertama dibawah ketentuan perjanjian sewa kendaraan yaitu kurang dari Rp. 1.500.000.000,00 (Satu miliar lima ratus juta rupiah).</li>
                <li>BBM operasional ditanggung oleh Pihak Kedua sesuai dengan ketentuan yang berlaku.</li>
                <li>Pajak kendaraan, service rutin, ganti oli, ganti spare part, ganti ban menjadi tanggung jawab Pihak Pertama.</li>
                <li>Keamanan, kebersihan, dan cuci kendaraan menjadi tanggung jawab Pihak Pertama.</li>
                <li>Kehilangan atau kerusakan yang diakibatkan oleh kecelakaan selama Jam Kerja ditanggung kedua belah pihak.</li>
                <li>Kedua belah pihak dibebaskan dari segala macam tuntutan ganti rugi atau tanggung jawab jika terjadi Force Majeure.</li>
                <li>Pihak Pertama tidak diperkenankan menyewakan atau memindah tangankan ke Pihak Ketiga selama perjanjian masih berlaku.</li>
                <li>Bila Pihak Pertama atau Pihak Kedua bermaksud memutuskan kontrak sewa menyewa maka kedua belah pihak harus memberitahukan selambat-lambatnya 2 minggu sebelumnya.</li>
            </ol>
            <p>Demikian surat perjanjian sewa menyewa ini dibuat agar dapat dipergunakan sebagaimana mestinya dan dibuat rangkap 2 (dua) dengan dilampirkan materai serta mempunyai kekuatan hukum yang sama.</p>
        </div>
        <!-- <div class="footer">
            <div class="signature signature-left">
                <p style="margin-bottom: 80px;">PIHAK PERTAMA</p> 
                <p>{{ $data['first_party_name'] }}</p>
            </div>
            <div class="signature">
                <p>PIHAK KEDUA<br>
                PT. BPR EKADHARMA BHINARAHARJA<br>
                Kawedanan - Magetan<br>
                Direksi<br><br><br>
                <span>{{ $data['second_party_name'] }}</span><br>
                {{ $data['second_party_position'] }}</p>
            </div>
        </div>
    </div> -->
    <div class="footer">
    <div class="signature-left">
        <p style="margin-bottom: 80px;">PIHAK PERTAMA</p> 
        <p>{{ $data['first_party_name'] }}</p>
    </div>
    <div class="signature-right">
        <p>PIHAK KEDUA<br>
        PT. BPR EKADHARMA BHINARAHARJA<br>
        Kawedanan - Magetan<br>
        Direksi<br><br><br>
        <span>{{ $data['second_party_name'] }}</span><br>
        {{ $data['second_party_position'] }}</p>
    </div>
</div>
    <script>
        window.print();
        window.onafterprint = window.close;
    </script>
</body>
</html>