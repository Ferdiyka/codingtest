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
                <h1>Add Extrakulikuler</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('list.index') }}">List</a></div>
                    <div class="breadcrumb-item active">Add List</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <form action="{{ route('list.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            {{-- Error Handling --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group mb-3">
                                <label for="siswa_id">Nama Siswa</label>
                                <select name="siswa_id" id="siswa_id" class="form-control select2" required>
                                    <option value="">Select Siswa</option>
                                    @foreach ($siswas as $siswa)
                                        <option value="{{ $siswa->id }}">{{ $siswa->first_name }}
                                            {{ $siswa->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="eskul_id">Nama Extrakulikuler</label>
                                <select name="eskul_id" id="eskul_id" class="form-control select2" required>
                                    <option value="">Select Ekstrakulikuler</option>
                                    @foreach ($eskuls as $eskul)
                                        <option value="{{ $eskul->id }}">{{ $eskul->nama_eskul }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="tahun_mulai">Tahun Masuk</label>
                                <input type="number" class="form-control" name="tahun_mulai" id="tahun_mulai" placeholder="Enter Year" required>
                            </div>

                            <div class="card-footer text-right">
                                <a href="{{ route('list.index') }}" class="btn btn-secondary mr-2">Cancel</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection


@push('scripts')
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush
