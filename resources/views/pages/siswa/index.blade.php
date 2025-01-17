@extends('layouts.app')

@section('title', 'Siswa')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Siswa</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">Siswa</div>
                </div>
            </div>
            <div class="section-body">
                {{-- <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div> --}}


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-left">
                                    <div class="section-header-button">
                                        <a href="{{ route('siswa.create') }}" class="btn btn-primary">Add New</a>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <form method="GET" action="{{ route('siswa.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="keyword">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>

                                            <th>Name Depan</th>
                                            <th>Nama Belakang</th>
                                            <th>Nomor Hp</th>
                                            <th>Nomor Induk Siswa</th>
                                            <th>Alamat</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Foto</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($siswas as $siswa)
                                            <tr>

                                                <td>
                                                    {{ $siswa->first_name }}
                                                </td>
                                                <td>
                                                    {{ $siswa->last_name }}
                                                </td>
                                                <td>
                                                    {{ $siswa->phone }}
                                                </td>
                                                <td>
                                                    {{ $siswa->nis }}
                                                </td>
                                                <td>
                                                    {{ $siswa->address }}
                                                </td>
                                                <td>
                                                    {{ $siswa->gender }}
                                                </td>
                                                <td>
                                                    <img src="{{ asset('storage/siswa/' . $siswa->picture) }}"
                                                        alt="{{ $siswa->first_name }}" style="max-width: 100px;">
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('siswa.edit', $siswa->id) }}'
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <form action="{{ route('siswa.destroy', $siswa->id) }}"
                                                            method="POST" class="ml-2" onsubmit="return confirmDelete()">
                                                            <input type="hidden" name="_method" value="DELETE" />
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}" />
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $siswas->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        // Fungsi untuk menampilkan pesan konfirmasi sebelum menghapus
        function confirmDelete() {
            return confirm('Are you sure you want to delete this item?');
        }
    </script>
@endpush

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
