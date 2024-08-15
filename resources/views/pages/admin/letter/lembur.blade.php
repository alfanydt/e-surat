@extends('layouts.admin')

@section('title')
    Daftar Surat
@endsection

@section('container')
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-fluid px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="file-text"></i></div>
                                Daftar Surat
                            </h1> 
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>NO</th>
                                <th>AKSI</th>
                                <th>NAMA SURAT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" onclick="showForm('Surat Upah Lembur')">
                                        <i class="fas fa-file-word"></i> Buat Surat
                                    </button>
                                    <!-- <button class="btn btn-warning btn-sm">
                                        <i class="fas fa-star"></i>
                                    </button> -->
                                </td>
                                <td>Surat Permohonan Upah Lembur</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" onclick="showForm('Surat Pendaftaran')">
                                        <i class="fas fa-file-word"></i> Buat Surat
                                    </button>
                                    <!-- <button class="btn btn-warning btn-sm">
                                        <i class="fas fa-star"></i>
                                    </button> -->
                                </td>
                                <td>Surat Pemberitahuan Pendaftaran</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" onclick="showForm('Surat Pemblokiran')">
                                        <i class="fas fa-file-word"></i> Buat Surat
                                    </button>
                                    <!-- <button class="btn btn-warning btn-sm">
                                        <i class="fas fa-star"></i>
                                    </button> -->
                                </td>
                                <td>Permohonan Pemblokiran Kendaraan</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" onclick="showForm('Surat Jaminan SHM')">
                                        <i class="fas fa-file-word"></i> Buat Surat
                                    </button>
                                    <!-- <button class="btn btn-warning btn-sm">
                                        <i class="fas fa-star"></i>
                                    </button> -->
                                </td>
                                <td>Keterangan Jaminan SHM</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" onclick="showForm('Surat Sewa Kendaraan Bermotor')">
                                        <i class="fas fa-file-word"></i> Buat Surat
                                    </button>
                                    <!-- <button class="btn btn-warning btn-sm">
                                        <i class="fas fa-star"></i>
                                    </button> -->
                                </td>
                                <td>Perjanjian Sewa Kendaraan Bermotor</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Form Pembuatan Surat -->
            <div id="formSurat" style="display: none;">
                <!-- Form Konten Akan Ditambahkan di Sini Melalui JavaScript -->
            </div>
        </div>
    </main>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.1.1/dist/select2-bootstrap-5-theme.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .btn-primary {
            background-color: #6c5ce7;
            border-color: #6c5ce7;
        }
        .btn-warning {
            background-color: #fdcb6e;
            border-color: #fdcb6e;
        }
    </style>
@endpush

@push('addon-script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(".selectx").select2({
            theme: "bootstrap-5"
        });

        function showForm(letterType) {
            let formSurat = document.getElementById('formSurat');
            formSurat.style.display = 'block';

            let formContent = '';
            if (letterType === 'Surat Upah Lembur') {
                formContent = `
                    <div class="card mb-4">
                        <div class="card-header">Form Surat Upah Lembur</div>
                        <div class="card-body">
                            <form action="{{ route('letter.printLembur') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="form-group">
                                    <label for="letter_date">Tanggal Surat</label>
                                    <input type="date" class="form-control" id="letter_date" name="letter_date" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient">Kepada Yth</label>
                                    <input type="text" class="form-control" id="recipient" name="recipient" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <input type="text" class="form-control" id="address" name="address" required>
                                </div>
                                <div class="form-group">
                                    <label for="sender_name">Nama Pengirim</label>
                                    <input type="text" class="form-control" id="sender_name" name="sender_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="sender_position">Jabatan Pengirim</label>
                                    <input type="text" class="form-control" id="sender_position" name="sender_position" required>
                                </div>
                                <div class="form-group">
                                    <label for="overtime_reason">Alasan Lembur</label>
                                    <textarea class="form-control" id="overtime_reason" name="overtime_reason" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="employee_details">Detail Pegawai (Nama, Jumlah Hari)</label>
                                    <textarea class="form-control" id="employee_details" name="employee_details" rows="5" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="approval1">Nama Persetujuan 1</label>
                                    <input type="text" class="form-control" id="approval1" name="approval1" required>
                                </div>
                                <div class="form-group">
                                    <label for="approval1_position">Jabatan Persetujuan 1</label>
                                    <input type="text" class="form-control" id="approval1_position" name="approval1_position" required>
                                </div>
                                <div class="form-group">
                                    <label for="approval2">Nama Persetujuan 2</label>
                                    <input type="text" class="form-control" id="approval2" name="approval2" required>
                                </div>
                                <div class="form-group">
                                    <label for="approval2_position">Jabatan Persetujuan 2</label>
                                    <input type="text" class="form-control" id="approval2_position" name="approval2_position" required>
                                </div>
                                <div class="form-group">
                                    <label for="approval3">Nama Mengetahui</label>
                                    <input type="text" class="form-control" id="approval3" name="approval3" required>
                                </div>
                                <div class="form-group">
                                    <label for="approval3_position">Jabatan Mengetahui</label>
                                    <input type="text" class="form-control" id="approval3_position" name="approval3_position" required>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-sm-9 offset-sm-0">
                                        <button type="submit" class="btn btn-primary">Cetak</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                `;
            } else if (letterType === 'Surat Pendaftaran') {
                formContent = `
                    <div class="card mb-4">
                        <div class="card-header">Form Surat Pemberitahuan Pendaftaran</div>
                        <div class="card-body">
                            <form action="{{ route('letter.printDaftar') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="letter_no">Nomor Surat</label>
                                    <input type="text" class="form-control" id="letter_no" name="letter_no" required>
                                </div>
                                <div class="form-group">
                                    <label for="letter_date">Tanggal Surat</label>
                                    <input type="date" class="form-control" id="letter_date" name="letter_date" required>
                                </div>
                                <div class="form-group">
                                    <label for="location">Lokasi</label>
                                    <input type="text" class="form-control" id="location" name="location" required>
                                </div>
                                <div class="form-group">
                                    <label for="regarding">Perihal</label>
                                    <input type="text" class="form-control" id="regarding" name="regarding" required>
                                </div>
                                <div class="form-group">
                                    <label for="attachment">Lampiran</label>
                                    <input type="text" class="form-control" id="attachment" name="attachment">
                                </div>
                                <div class="form-group">
                                    <label for="recipient_name">Nama Penerima</label>
                                    <input type="text" class="form-control" id="recipient_name" name="recipient_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient_address">Alamat Penerima</label>
                                    <input type="text" class="form-control" id="recipient_address" name="recipient_address" required>
                                </div>
                                <div class="form-group">
                                    <label for="sender_name">Nama Pengirim</label>
                                    <input type="text" class="form-control" id="sender_name" name="sender_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="sender_position">Jabatan Pengirim</label>
                                    <input type="text" class="form-control" id="sender_position" name="sender_position" required>
                                </div>
                                <div class="form-group">
                                    <label for="sender_address">Alamat Pengirim</label>
                                    <input type="text" class="form-control" id="sender_address" name="sender_address" required>
                                </div>
                                <div class="form-group">
                                    <label for="collateral_description">Deskripsi Agunan</label>
                                    <textarea class="form-control" id="collateral_description" name="collateral_description" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="auction_date">Tanggal Lelang</label>
                                    <input type="date" class="form-control" id="auction_date" name="auction_date" required>
                                </div>
                                <div class="form-group">
                                    <label for="cc">Tembusan</label>
                                    <input type="text" class="form-control" id="cc" name="cc">
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-sm-9 offset-sm-0">
                                        <button type="submit" class="btn btn-primary">Cetak</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                `;
            } else if (letterType === 'Surat Pemblokiran') {
                formContent = `
                     <div class="card mb-4">
                        <div class="card-header">Form Surat Permohonan Pemblokiran Kendaraan</div>
                        <div class="card-body">
                            <form action="{{ route('letter.printPemblokiran') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="letter_no">Nomor Surat</label>
                                    <input type="text" class="form-control" id="letter_no" name="letter_no" required>
                                </div>
                                <div class="form-group">
                                    <label for="letter_date">Tanggal Surat</label>
                                    <input type="date" class="form-control" id="letter_date" name="letter_date" required>
                                </div>
                                <div class="form-group">
                                    <label for="lamp">Lampiran</label>
                                    <input type="text" class="form-control" id="lamp" name="lamp" required>
                                </div>
                                <div class="form-group">
                                    <label for="regarding">Perihal</label>
                                    <input type="text" class="form-control" id="regarding" name="regarding" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient_name">Nama Penerima</label>
                                    <input type="text" class="form-control" id="recipient_name" name="recipient_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="recipient_address">Alamat Penerima</label>
                                    <input type="text" class="form-control" id="recipient_address" name="recipient_address" required>
                                </div>
                                <div class="form-group">
                                    <label for="sender_name">Nama Pengirim</label>
                                    <input type="text" class="form-control" id="sender_name" name="sender_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="sender_position">Jabatan Pengirim</label>
                                    <input type="text" class="form-control" id="sender_position" name="sender_position" required>
                                </div>
                                <div class="form-group">
                                    <label for="sender_address">Alamat Pengirim</label>
                                    <input type="text" class="form-control" id="sender_address" name="sender_address" required>
                                </div>
                                <div class="form-group">
                                    <label for="vehicle_details">Detail Kendaraan('Merk / Type',
                                    'Model',
                                    'Tahun',
                                    'Warna',
                                    'No. Mesin',
                                    'No. Rangka',
                                    'No. BPKB',
                                    'No. Polisi',
                                    'Atas Nama',
                                    'Alamat')</label>
                                    <textarea class="form-control" id="vehicle_details" name="vehicle_details" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="cc">Tembusan</label>
                                    <input type="text" class="form-control" id="cc" name="cc">
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-sm-9 offset-sm-0">
                                        <button type="submit" class="btn btn-primary">Cetak</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                `;
            } else if (letterType === 'Surat Jaminan SHM') {
                formContent = `
                    <div class="card mb-4">
                    <div class="card-header">Form Surat Keterangan Jaminan SHM</div>
                    <div class="card-body">
                        <form action="{{ route('letter.printJaminan') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="letter_no">Nomor Surat</label>
                                <input type="text" class="form-control" id="letter_no" name="letter_no" required>
                            </div>
                            <div class="form-group">
                                <label for="letter_date">Tanggal Surat</label>
                                <input type="date" class="form-control" id="letter_date" name="letter_date" required>
                            </div>
                            <div class="form-group">
                                <label for="sender_name">Nama Pengirim</label>
                                <input type="text" class="form-control" id="sender_name" name="sender_name" required>
                            </div>
                            <div class="form-group">
                                <label for="sender_position">Jabatan Pengirim</label>
                                <input type="text" class="form-control" id="sender_position" name="sender_position" required>
                            </div>
                            <div class="form-group">
                                <label for="sender_address">Alamat Pengirim</label>
                                <input type="text" class="form-control" id="sender_address" name="sender_address" required>
                            </div>
                            <div class="form-group">
                                <label for="shm_number">Nomor Sertifikat Hak Milik</label>
                                <input type="text" class="form-control" id="shm_number" name="shm_number" required>
                            </div>
                            <div class="form-group">
                                <label for="shm_area">Luas Sertifikat Hak Milik (m²)</label>
                                <input type="text" class="form-control" id="shm_area" name="shm_area" required>
                            </div>
                            <div class="form-group">
                                <label for="shm_location">Lokasi Sertifikat Hak Milik</label>
                                <textarea class="form-control" id="shm_location" name="shm_location" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="shm_owner">Pemilik Sertifikat Hak Milik</label>
                                <input type="text" class="form-control" id="shm_owner" name="shm_owner" required>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-9 offset-sm-0">
                                    <button type="submit" class="btn btn-primary">Cetak</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            `;
            } else if (letterType === 'Surat Sewa Kendaraan Bermotor') {
                formContent = `
                  <div class="card mb-4">
                    <div class="card-header">Form Surat Perjanjian Sewa Kendaraan Bermotor</div>
                    <div class="card-body">
                        <form action="{{ route('letter.printSewa') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="letter_no">Nomor Surat</label>
                                <input type="text" class="form-control" id="letter_no" name="letter_no" required>
                            </div>
                            <div class="form-group">
                                <label for="letter_date">Tanggal Surat</label>
                                <input type="date" class="form-control" id="letter_date" name="letter_date" required>
                            </div>
                            <div class="form-group">
                                <label for="first_party_name">Nama Pihak Pertama</label>
                                <input type="text" class="form-control" id="first_party_name" name="first_party_name" required>
                            </div>
                            <div class="form-group">
                                <label for="first_party_address">Alamat Pihak Pertama</label>
                                <input type="text" class="form-control" id="first_party_address" name="first_party_address" required>
                            </div>
                            <div class="form-group">
                                <label for="first_party_nik">NIK Pihak Pertama</label>
                                <input type="text" class="form-control" id="first_party_nik" name="first_party_nik" required>
                            </div>
                            <div class="form-group">
                                <label for="second_party_name">Nama Pihak Kedua</label>
                                <input type="text" class="form-control" id="second_party_name" name="second_party_name" required>
                            </div>
                            <div class="form-group">
                                <label for="second_party_address">Alamat Pihak Kedua</label>
                                <input type="text" class="form-control" id="second_party_address" name="second_party_address" required>
                            </div>
                            <div class="form-group">
                                <label for="second_party_position">Jabatan Pihak Kedua</label>
                                <input type="text" class="form-control" id="second_party_position" name="second_party_position" required>
                            </div>
                            <div class="form-group">
                                <label for="second_party_nik">NIK Pihak Kedua</label>
                                <input type="text" class="form-control" id="second_party_nik" name="second_party_nik" required>
                            </div>
                            <div class="form-group">
                                <label for="vehicle_type">Jenis Kendaraan</label>
                                <input type="text" class="form-control" id="vehicle_type" name="vehicle_type" required>
                            </div>
                            <div class="form-group">
                                <label for="vehicle_brand">Merk Kendaraan</label>
                                <input type="text" class="form-control" id="vehicle_brand" name="vehicle_brand" required>
                            </div>
                            <div class="form-group">
                                <label for="vehicle_model">Tipe Kendaraan</label>
                                <input type="text" class="form-control" id="vehicle_model" name="vehicle_model" required>
                            </div>
                            <div class="form-group">
                                <label for="vehicle_year">Tahun Kendaraan</label>
                                <input type="text" class="form-control" id="vehicle_year" name="vehicle_year" required>
                            </div>
                            <div class="form-group">
                                <label for="vehicle_color">Warna Kendaraan</label>
                                <input type="text" class="form-control" id="vehicle_color" name="vehicle_color" required>
                            </div>
                            <div class="form-group">
                                <label for="vehicle_engine_size">Isi Silinder</label>
                                <input type="text" class="form-control" id="vehicle_engine_size" name="vehicle_engine_size" required>
                            </div>
                            <div class="form-group">
                                <label for="vehicle_frame_no">No. Rangka</label>
                                <input type="text" class="form-control" id="vehicle_frame_no" name="vehicle_frame_no" required>
                            </div>
                            <div class="form-group">
                                <label for="vehicle_engine_no">No. Mesin</label>
                                <input type="text" class="form-control" id="vehicle_engine_no" name="vehicle_engine_no" required>
                            </div>
                            <div class="form-group">
                                <label for="vehicle_bpkb_no">No. BPKB</label>
                                <input type="text" class="form-control" id="vehicle_bpkb_no" name="vehicle_bpkb_no" required>
                            </div>
                            <div class="form-group">
                                <label for="vehicle_plate_no">No. Polisi</label>
                                <input type="text" class="form-control" id="vehicle_plate_no" name="vehicle_plate_no" required>
                            </div>
                            <div class="form-group">
                                <label for="vehicle_owner">Nama Pemilik Kendaraan</label>
                                <input type="text" class="form-control" id="vehicle_owner" name="vehicle_owner" required>
                            </div>
                            <div class="form-group">
                                <label for="vehicle_owner_address">Alamat Pemilik Kendaraan</label>
                                <input type="text" class="form-control" id="vehicle_owner_address" name="vehicle_owner_address" required>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-9 offset-sm-0">
                                    <button type="submit" class="btn btn-primary">Cetak</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            `;
            }
        
            formSurat.innerHTML = formContent;
        }
    </script>
@endpush
