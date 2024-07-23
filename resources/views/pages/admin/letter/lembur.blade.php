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
                                    <button class="btn btn-primary btn-sm" onclick="showForm('Surat ')">
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
                                    <button class="btn btn-primary btn-sm" onclick="showForm('Surat Permohonan')">
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
                                    <label for="blocking_reason">Alasan Pemblokiran</label>
                                    <textarea class="form-control" id="blocking_reason" name="blocking_reason" rows="3" required></textarea>
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
            }

            formSurat.innerHTML = formContent;
        }
    </script>
@endpush
