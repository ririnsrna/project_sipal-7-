@extends('layouts.home')

@section('title')
    Data Siswa
@endsection
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Siswa</h1>
        <p class="mb-4">Berikut merupakan data Siswa SMKN 1 CIOMAS </p>

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
                    <a href="tambah_user" class="btn mb-3 btn-primary btn-icon-split btn-sm">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Data Siswa</span>
                    </a>

                    <form class="form-inline my-2 my-lg-2 justify-content-end">
                        <input class="form-control mr-sm-2" type="search" placeholder="Cari" name="search"
                            aria-label="Cari">
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Alamat</th>
                                    <th>Kelas</th>
                                    <th>No Telepon</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Bergabung Pada</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($var_member as $index => $member)
                                    <tr>
                                        <td>{{ $index + $var_member->firstItem() }}</td>
                                        <td class="text-capitalize">{{ $member->nama_member }}</td>
                                        <td class="text-capitalize">{{ $member->alamat }}</td>
                                        <td class="text-capitalize">{{ $member->kelas }}</td>
                                        <td>{{ $member->no_telp }}</td>
                                        <td>{{ $member->tgl_lahir }}</td>
                                        <td>{{ $member->created_at }}</td>
                                        <td class="d-flex">
                                            <a href="ubah_member/{{ $member->id_member }}" class="btn btn-primary d-inline">
                                                <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                            </a>

                                            <a href="hapus_member/{{ $member->id_member }}" class="btn btn-danger d-inline">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="12" class="text-center p-5">
                                            Siswa tidak ada
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $var_member->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        <!-- Modal -->
        <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="insertModal"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="insertModal">Input Data Siswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
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
                                    class="form-control form-control-user @error('alamat') is-ivalid @enderror
                  "name="alamat"
                                    value="{{ old('alamat') }}" placeholder="Alamat Tinggal...">
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="kelas" type="text" class="form-control form-control-user" name="kelas"
                                    value="{{ old('kelas') }}" placeholder="kelas...">
                                @error('kelas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input id="no_telp" type="text" class="form-control form-control-user "
                                        name="no_telp" placeholder="No Telepon...">
                                    @error('no_telp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input id="tgl_lahir" type="text" class="form-control form-control-user"
                                        onfocus="(this.type='date')" onblur="(this.type='text')" name="tgl_lahir"
                                        autocomplete="tgl_lahir" placeholder="Tanggal Lahir...">
                                    @error('tgl_lahir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

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
