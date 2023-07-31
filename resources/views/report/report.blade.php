    @extends('layouts.home')

@section('title')
    Laporan Peminjaman
@endsection
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Laporan Peminjaman</h1>

        <div class="row justify-content-center">
            <div class="col-lg">
                <div class="card">
                    <!-- Light table -->
                    <div class="card-body">
                        <div class="row icon-examples">
                            <div class="col-lg">
                                @if (session('status'))
                                    <div class="alert alert-success mt-3">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <div class="card-group">
                                    <div class="col-lg-6">
                                        <div class="card" style="height: 26rem;">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Pilihan Laporan</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="container h-100">
                                                    <div class="row align-items-center h-100">
                                                        <div class="col mx-auto">
                                                            <form action="{{ route('postReport') }}" method="post"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="form-group row">
                                                                    <div class="col-sm-6">
                                                                        <label for="staticName"
                                                                            class="col-form-label p-0">Tanggal Awal</label>
                                                                        <input type="date" class="form-control"
                                                                            id="start_date" name="start_date"
                                                                            value="{{ date('Y-m-d') }}">
                                                                        @error('start_date')
                                                                            <div class="mt-1">
                                                                                <small class="ml-1"
                                                                                    style="color: red;">{{ $message }}</small>
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div class=" col-sm-6">
                                                                        <label for="staticName"
                                                                            class="col-form-label p-0">Tanggal Akhir</label>
                                                                        <input type="date" class="form-control"
                                                                            id="end_date" name="end_date"
                                                                            value="{{ date('Y-m-d') }}">
                                                                        @error('end_date')
                                                                            <div class="mt-1">
                                                                                <small class="ml-1"
                                                                                    style="color: red;">{{ $message }}</small>
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row text-center mt-4">
                                                                    <div class="col-sm">
                                                                        <button type="submit"
                                                                            class="btn btn-primary col-lg" name="button"
                                                                            value="submit">Kirim</button>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="card" style="height: 26rem;">
                                            <div class=" card-header">
                                                <h5 class="card-title mb-0">Resume Laporan</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="container h-100">
                                                    <div class="row align-items-center h-100">
                                                        <div class="col mx-auto">
                                                            <div class="row">
                                                                @if (!$peminjam)
                                                                    <div class="col-lg text-center">
                                                                        <h3>Silahkan Submit Untuk Mencetak Laporan</h3>
                                                                    </div>
                                                                @else
                                                                    <div class="col-lg-12 text-left">
                                                                        <ul class="list-group list-group-flush">
                                                                            <li class="list-group-item font-weight-bold">
                                                                                Total Peminjam : {{ $countPeminjam }}
                                                                            </li>
                                                                            <li class="list-group-item"></li>
                                                                        </ul>
                                                                        <div class="form-group row text-center">
                                                                            <div class=" col-lg-12 text-center">
                                                                                <button type="submit"
                                                                                    class="btn btn-primary col-lg"
                                                                                    name="button" value="pdf"><i
                                                                                        class="fas fa-file-pdf    "></i></button>
                                                                            </div>
                                                                        </div>

                                                                        </form>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
