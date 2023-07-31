@extends('layouts.home')

@section('title')
    Tambah Data Barang Kategori
@endsection
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Data Barang</h1>

        @if (Session::has('berhasil'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span>Tambah data</button>
                <strong>Success, &nbsp</strong>
                {{ Session::get('berhasil') }}
            </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                {{-- <h6 class="m-0 font-weight-bold text-primary">Data Siswa 2.0.1</h6>
            </div> --}}
                <div class="card-body">

                    <form class="user" method="POST" action="{{ route('insert_new_alat') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $id }}">
                        <div class="form-group">
                            <input id="name" type="text"
                                class="form-control form-control-user @error('name') is-invalid @enderror
                     "name="name"
                                placeholder="Nama Barang...">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="merk" type="text"
                                class="form-control form-control-user @error('merk') is-invalid @enderror
                     "name="merk"
                                value="{{ old('merk') }}" placeholder="Merek...">
                            @error('merk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="jumlah" type="number"
                                class="form-control form-control-user @error('jumlah') is-invalid @enderror
                     "
                                name="jumlah" placeholder="Jumlah Barang...">
                            @error('jumlah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                </div>
                <a href="{{ route('detail_alat', $id) }}"><button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Close</button></a>
                <button type="submit" class="btn btn-primary"> Save changes </button>
                </form>
            </div>
        </div>
    </div>
@endsection
