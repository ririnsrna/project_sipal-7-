@extends('layouts.home')

@section('title')
    Data Siswa
@endsection
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Data Siswa</h1>

        @if (Session::has('berhasil'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                {{ Session::get('berhasil') }}
            </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="card-body">

                    <form class="user" method="POST" action="{{ route('insert_new_member') }}">
                        @csrf
                        <div class="form-group">
                            <input id="name" type="text"
                                class="form-control form-control-user @error('name') is-invalid @enderror
                     "name="name"
                                placeholder="Nama Member...">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="alamat" type="text"
                                class="form-control form-control-user @error('alamat') is-invalid @enderror
                     "name="alamat"
                                value="{{ old('alamat') }}" placeholder="Nama alamat...">
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="kelas" type="text"
                                class="form-control form-control-user @error('kelas') is-invalid @enderror
                     "name="kelas"
                                value="{{ old('kelas') }}" placeholder="Nama kelas...">
                            @error('kelas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input id="no_telp" type="text"
                                    class="form-control form-control-user @error('no_telp') is-invalid @enderror
                     "name="no_telp"
                                    value="{{ old('no_telp') }}" placeholder="No telp...">
                                @error('no_telp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <input id="tgl_lahir" type="text"
                                    class="form-control form-control-user @error('tgl_lahir') is-invalid @enderror
                     "
                                    onfocus="(this.type='date')" onblur="(this.type='text')" name="tgl_lahir"
                                    value="{{ old('tgl_lahir') }}" placeholder="Tanggal lahir...">
                                @error('tgl_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <a href="{{ route('member') }}"><button type="button" class="btn btn-secondary"
                                data-dismiss="modal">Close</button></a>
                        <button type="submit" class="btn btn-primary"> Save changes </button>
                    </form>
                </div>
            </div>
        </div>
    @endsection
