@extends('layouts.admin')

@section('title')
    Pratinjau Surat
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
                                Pratinjau Surat
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header">Form Edit Surat</div>
                <div class="card-body">
                    <form action="{{ route('letter.update', $letter->id) }}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="letter_no" class="col-sm-3 col-form-label">Nomor Surat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('letter_no') is-invalid @enderror" value="{{ old('letter_no', $letter->letter_no) }}" name="letter_no" required>
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
                                <input type="date" class="form-control @error('letter_date') is-invalid @enderror" value="{{ old('letter_date', $letter->letter_date) }}" name="letter_date" required>
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
                                <input type="text" class="form-control @error('to') is-invalid @enderror" value="{{ old('to', $letter->to) }}" name="to" required>
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
                                <input type="text" class="form-control @error('sender_name') is-invalid @enderror" value="{{ old('sender_name', $letter->sender_name) }}" name="sender_name" required>
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
                                <input type="text" class="form-control @error('sender_position') is-invalid @enderror" value="{{ old('sender_position', $letter->sender_position) }}" name="sender_position" required>
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
                                <textarea class="form-control @error('letter_body') is-invalid @enderror" name="letter_body" rows="5" required>{{ old('letter_body', $letter->letter_body) }}</textarea>
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
                                <input type="text" class="form-control @error('approval') is-invalid @enderror" value="{{ old('approval', $letter->approval) }}" name="approval" required>
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
                                <input type="text" class="form-control @error('approval_position') is-invalid @enderror" value="{{ old('approval_position', $letter->approval_position) }}" name="approval_position" required>
                            </div>
                            @error('approval_position')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-primary">Perbarui Surat</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
