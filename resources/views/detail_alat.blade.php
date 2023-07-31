@extends('layouts.home')

@section('title')
    Daftar Barang Kategori {{ $var_kategori->nama_kategori }}
@endsection
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Barang Kategori {{ $var_kategori->nama_kategori }}</h1>
        <p class="mb-4">Berikut merupakan data alat yang tersedia di LAB PPLG SMKN 1 CIOMAS</p>

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
            <div class="col-3">
                <a href="{{ route('insert_new_detail', $var_kategori->id_kategori) }}" class="btn my-3 btn-primary btn-sm">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    Tambah Data Alat
                </a>
            </div>
            <div class="card-body">
                <form class="form-inline my-2 my-lg-2 justify-content-end">
                    <input class="form-control mr-sm-2" type="search" placeholder="Cari" name="search" aria-label="Cari">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i
                            class="fa-solid fa-magnifying-glass"></i></button>
                </form>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Merk</th>
                                <th>Jumlah Barang</th>
                                <th>Diinput Tanggal</th>
                                <th>Diinput Oleh</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($var_alat as $index => $alat)
                                <tr>
                                    <td>{{ $index + $var_alat->firstItem() }}</td>
                                    <td>{{ $alat->nama_barang }}</td>
                                    <td>{{ $alat->merk }}</td>
                                    <td>{{ $alat->jumlah_alat }}</td>
                                    <td>{{ $alat->updated_at }}</td>
                                    <td>{{ $alat->created_by }}</td>
                                    <td class="d-flex">
                                        <a href="ubah_alat/{{ $alat->id }}" class="btn btn-primary d-inline">
                                            <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                        </a>

                                        <a href="hapus_alat/{{ $alat->id }}" class="btn btn-danger d-inline">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="12" class="text-center p-5">
                                        Alat tidak ada
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $var_alat->links() }}
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- /.container-fluid -->
    <!-- Modal -->
    <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="insertModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="insertModal">Input Data Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="user" method="POST" action="{{ route('insert_new_alat') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $var_id }}">
                        <div class="form-group">
                            <input id="name" type="text" class="form-control form-control-user " name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus
                                placeholder="Nama Barang...">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="merk" type="text" class="form-control form-control-user" name="merk"
                                value="{{ old('merk') }}" required autocomplete="merk" placeholder="Merek...">
                            @error('merk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="jumlah" type="text" class="form-control form-control-user" name="jumlah"
                                value="{{ old('jumlah') }}" required autocomplete="jumlah" placeholder="Jumlah Barang...">
                            @error('jumlah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
