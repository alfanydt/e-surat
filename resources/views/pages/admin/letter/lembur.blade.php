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
                                    <button class="btn btn-primary btn-sm" onclick="showForm('Surat Permohonan')">
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
                                    <button class="btn btn-primary btn-sm" onclick="showForm('Surat Permohonan')">
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
                                    <button class="btn btn-primary btn-sm" onclick="showForm('Surat Permohonan')">
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
            } else if (letterType === 'Surat Permohonan') {
                formContent = `
                    <div class="card mb-4">
                        <div class="card-header">Form Surat Pemberitahuan Sudah Didaftarkan</div>
                        <div class="card-body">
                            <form action="{{ route('letter.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="letter_no" class="col-sm-3 col-form-label">Nomor Surat</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('letter_no') is-invalid @enderror" value="{{ old('letter_no') }}" name="letter_no" placeholder="Nomor Surat.." required>
                                    </div>
                                    @error('letter_no')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="letter_date" class="col-sm-3 col-form-label">Tanggal Surat</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control @error('letter_date') is-invalid @enderror" value="{{ old('letter_date') }}" name="letter_date" placeholder="YYYY-MM-DD" required>
                                    </div>
                                    @error('letter_date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="to" class="col-sm-3 col-form-label">Kepada Yth</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('to') is-invalid @enderror" value="{{ old('to') }}" name="to" placeholder="Kepada Yth" required>
                                    </div>
                                    @error('to')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="sender_name" class="col-sm-3 col-form-label">Nama Pengirim</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('sender_name') is-invalid @enderror" value="{{ old('sender_name') }}" name="sender_name" placeholder="Nama Pengirim" required>
                                    </div>
                                    @error('sender_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="sender_position" class="col-sm-3 col-form-label">Jabatan Pengirim</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('sender_position') is-invalid @enderror" value="{{ old('sender_position') }}" name="sender_position" placeholder="Jabatan Pengirim" required>
                                    </div>
                                    @error('sender_position')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="letter_body" class="col-sm-3 col-form-label">Isi Surat</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control @error('letter_body') is-invalid @enderror" name="letter_body" rows="5" required>{{ old('letter_body') }}</textarea>
                                    </div>
                                    @error('letter_body')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="approval" class="col-sm-3 col-form-label">Disetujui Oleh</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('approval') is-invalid @enderror" value="{{ old('approval') }}" name="approval" placeholder="Disetujui Oleh" required>
                                    </div>
                                    @error('approval')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="approval_position" class="col-sm-3 col-form-label">Jabatan Penyetuju</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('approval_position') is-invalid @enderror" value="{{ old('approval_position') }}" name="approval_position" placeholder="Jabatan Penyetuju" required>
                                    </div>
                                    @error('approval_position')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-sm-9 offset-sm-3">
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
