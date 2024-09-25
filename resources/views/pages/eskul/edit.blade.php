@extends('layouts.app')

@section('title', 'Edit Extrakulikuler')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Extrakulikuler</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('eskul.index') }}">Eskul</a></div>
                    <div class="breadcrumb-item active">Edit Eskul</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <form action="{{ route('eskul.update', $eskul) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group mb-0">
                                <label>Nama Extrakulikuler</label>
                                <input type="text" class="form-control" name="nama_eskul" required value="{{ $eskul->nama_eskul }}">
                            </div>
                            <div class="form-group mb-0">
                                <label>Jenis Extrakulikuler</label>
                                <input type="text" class="form-control" name="jenis_eskul" required value="{{ $eskul->jenis_eskul }}">
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{ route('eskul.index') }}" class="btn btn-secondary mr-2">Cancel</a>
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
