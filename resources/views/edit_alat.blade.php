@extends('layouts.home')

@section('title')
    Data Detail Alat
@endsection
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Ubah Data Barang {{ $var_alat->judul_alat }}</h1>
        <p class="mb-4">Berikut merupakan detail data Barang {{ $var_alat->judul_alat }}</p>
        <!-- Collapsable Card Example -->
        @if (Session::has('gagal'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <strong>Gagal,</strong>
                {{ Session::get('berhasil') }}
            </div>
        @endif
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
                aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Form Data Barang</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    <form class="user" method="POST" action="{{ route('proses_edit_alat') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $var_alat->id }}">
                        <input type="hidden" name="id_kategori" value="{{ $var_alat->id_kategori }}">
                        <div class="form-group">
                            <select id="kategori" type="text"
                                class="form-control @error('kategori') is-invalid @enderror" name="kategori"
                                value="{{ old('kategori') }}">
                                @foreach ($var_kategori as $kategori)
                                    @if ($var_alat->id_kategori == $kategori->id_kategori)
                                        <option value="{{ $kategori->id_kategori }}" selected>{{ $kategori->nama_kategori }}
                                        </option>
                                    @else
                                        <option value="{{ $kategori->id_kategori }}">{{ $kategori->nama_kategori }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            @error('kategori')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="name" type="text"
                                class="form-control form-control-user @error('name') is-invalid @enderror" name="name"
                                autocomplete="name" autofocus placeholder="Nama Barang"
                                value="{{ $var_alat->nama_barang }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="merk" type="text"
                                class="form-control form-control-user @error('merk') is-invalid @enderror" name="merk"
                                autocomplete="merk" placeholder="Merek" value="{{ $var_alat->merk }}">
                            @error('merk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="jumlah_alat" type="number"
                                class="form-control form-control-user @error('jumlah_alat') is-invalid @enderror"
                                name="jumlah_alat" placeholder="Jumlah" value="{{ $var_alat->jumlah_alat }}">
                            @error('jumlah_alat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('detail_alat', $var_alat->id_kategori) }}"><button type="button"
                                    class="btn btn-secondary" data-dismiss="modal">Close</button></a>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    </div>
    <!-- /.container-fluid -->
@endsection
