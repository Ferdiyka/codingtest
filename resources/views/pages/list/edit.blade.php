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
                    <form action="{{ route('list.update', [$siswa->id, $eskul->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="siswa_id">Nama Siswa</label>
                                <select name="siswa_id" id="siswa_id" class="form-control select2" required>
                                    @foreach ($siswas as $siswaOption)
                                        <option value="{{ $siswaOption->id }}"
                                            {{ $siswaOption->id == $siswa->id ? 'selected' : '' }}>
                                            {{ $siswaOption->first_name }} {{ $siswaOption->last_name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group mb-3">
                                <label for="eskul_id">Nama Extrakulikuler</label>
                                <select name="eskul_id" id="eskul_id" class="form-control select2" required>
                                    @foreach ($eskuls as $eskulOption)
                                        <option value="{{ $eskulOption->id }}" {{ $eskulOption->id == $eskul->id ? 'selected' : '' }}>
                                            {{ $eskulOption->nama_eskul }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group mb-3">
                                <label for="tahun_mulai">Tahun Mulai</label>
                                <input type="number" name="tahun_mulai" id="tahun_mulai" class="form-control"
                                    value="{{ $eskul->pivot->tahun_mulai ?? '' }}" required>
                            </div>

                        </div>
                        <div class="card-footer text-right">
                            <a href="{{ route('list.index') }}" class="btn btn-secondary mr-2">Cancel</a>
                            <button class="btn btn-primary">Submit</button>
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
