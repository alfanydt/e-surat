@extends('layouts.admin')

@section('title')
    Arsip Daftar
@endsection

@section('container')
<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-xl px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="archive"></i></div>
                            Arsip Surat Daftar
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <!-- Main page content-->
    <div class="container-xl px-4 mt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-header-actions mb-4">
                    <div class="card-header">
                        List Arsip Surat Daftar
                    </div>
                    <div class="card-body">
                        {{-- Alert --}}
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- List Arsip Data --}}
                        <table class="table table-striped table-hover table-sm" id="crudTable">
                            <thead>
                                <tr>
                                    <th width="10">No.</th>
                                    <th>No. Surat</th>
                                    <th>Tanggal Surat</th>
                                    <th>Perihal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($daftar as $daftar)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $daftar->letter_no }}</td>
                                    <td>{{ \Carbon\Carbon::parse($daftar->letter_date)->format('d M Y') }}</td>
                                    <td>{{ $daftar->regarding }}</td>
                                    <td>
                                        <a href="{{ route('print-arsip-surat', $daftar->id) }}" class="btn btn-sm btn-primary">
                                            Cetak
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>           
    </div>
</main>
@endsection
