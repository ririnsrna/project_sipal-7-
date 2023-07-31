@extends('layouts.home')

@section('title')
    Data Kategori
@endsection
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Data Kategori Lab</h1>

        @if (Session::has('berhasil'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
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

                    <form class="user" method="POST" action="{{ route('insert_new_kategori') }}">
                        @csrf
                        <div class="form-group">
                            <input id="name" type="text"
                                class="form-control form-control-user @error('name') is-invalid @enderror
                     "name="name"
                                placeholder="Nama Lemari...">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="deskripsi" type="text"
                                class="form-control form-control-user @error('deskripsi') is-invalid @enderror
                     "name="deskripsi"
                                value="{{ old('deskripsi') }}" placeholder="Deskripsi Lemari...">
                            @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>



                </div>
                <a href="{{ route('kategori_alat') }}"><button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Kembali</button></a>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
