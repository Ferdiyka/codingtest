@extends('layouts.app')

@section('title', 'Advanced Forms')

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
                <h1>Add Siswa</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('siswa.index') }}">Siswa</a></div>
                    <div class="breadcrumb-item active">Add siswas</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" required
                                    class="form-control @error('first_name')
                                is-invalid
                            @enderror"
                                    name="first_name">
                                @error('first_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" required
                                    class="form-control @error('last_name')
                                is-invalid
                            @enderror"
                                    name="last_name">
                                @error('last_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-0">
                                <label>Nomor HP</label>
                                <input type="text" class="form-control" name="phone" required>
                            </div>
                            <div class="form-group">
                                <label>Nomor induk Siswa</label>
                                <input type="number" class="form-control" name="nis" required>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea type="text" class="form-control" data-height="150" name="address" required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Jenis Kelamin</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="gender" value="male" class="selectgroup-input">
                                        <span class="selectgroup-button">Male</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="gender" value="female" class="selectgroup-input">
                                        <span class="selectgroup-button">Female</span>
                                    </label>

                                </div>
                            </div>
                            <div class="form-group">
                                <label>Photo siswa</label>
                                <input type="file" class="form-control" name="picture" required
                                    @error('picture') is-invalid @enderror>
                                @error('picture')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{ route('siswa.index') }}" class="btn btn-secondary mr-2">Cancel</a>
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
