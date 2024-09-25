@extends('layouts.app')

@section('title', 'Edit Siswa')

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
                <h1>Edit Siswa</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('siswa.index') }}">Siswa</a></div>
                    <div class="breadcrumb-item active">Edit Siswa</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <form action="{{ route('siswa.update', $siswa) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name Depan</label>
                                <input type="text" required
                                    class="form-control @error('first_name')
                                is-invalid
                            @enderror"
                                    name="first_name" value="{{ $siswa->first_name }}">
                                @error('first_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Name Belakang</label>
                                <input type="text" required
                                    class="form-control @error('last_name')
                                is-invalid
                            @enderror"
                                    name="last_name" value="{{ $siswa->last_name }}">
                                @error('last_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-0">
                                <label>Nomor HP</label>
                                <input type="text" class="form-control" name="phone" required value="{{ $siswa->phone }}">
                            </div>
                            <div class="form-group">
                                <label>Nomor Induk Siswa</label>
                                <input type="number" class="form-control" name="nis" required value="{{ $siswa->nis }}">
                            </div>
                            <div class="form-group mb-0">
                                <label>Address</label>
                                <textarea type="text" class="form-control" data-height="150" name="address">{{ $siswa->address }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Jenis Kelamin</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="gender" value="male" class="selectgroup-input"
                                            @if ($siswa->gender == 'male') checked @endif>
                                        <span class="selectgroup-button">Male</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="gender" value="female" class="selectgroup-input"
                                            @if ($siswa->gender == 'female') checked @endif>
                                        <span class="selectgroup-button">Female</span>
                                    </label>

                                </div>
                            </div>
                            <div class="form-group">
                                <label>Previous Photo Siswa</label>
                                <div>
                                    @if ($siswa->picture)
                                        <img src="{{ asset('storage/siswa/' . $siswa->picture) }}" alt="{{ $siswa->name }}" class="img-thumbnail mb-2" style="max-width: 200px;">
                                    @endif
                                    <input type="file" class="form-control" name="picture">
                                </div>
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
