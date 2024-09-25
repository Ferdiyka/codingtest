@extends('layouts.app')

@section('title', 'Extrakulikuler')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>List Data Siswa dengan Eskul nya</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active">List</div>
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
                                        <a href="{{ route('list.create') }}" class="btn btn-primary">Add New</a>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <form method="GET" action="{{ route('list.index') }}">
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
                                            <th>Name Siswa</th>
                                            <th>Name Extrakulikuler</th>
                                            <th>Tahun Mulai</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($data as $siswa)
                                            @foreach ($siswa->eskul as $eskul)
                                                <tr>
                                                    <td>{{ $siswa->first_name }} {{ $siswa->last_name }}</td>
                                                    <td>{{ $eskul->nama_eskul }}</td>
                                                    <td>{{ $eskul->pivot->tahun_mulai }}</td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <a href='{{ route('list.edit', [$siswa->id, $eskul->id]) }}'
                                                                class="btn btn-sm btn-info btn-icon">
                                                                <i class="fas fa-edit"></i>
                                                            </a>

                                                            <form action="{{ route('list.destroy', [$siswa->id, $eskul->id]) }}"
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
                                        @endforeach
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $data->withQueryString()->links() }}
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
