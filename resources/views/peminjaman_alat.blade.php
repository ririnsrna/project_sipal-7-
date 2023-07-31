@extends('layouts.home')

@section('title')
    Manajemen Peminjaman
@endsection
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Peminjaman</h1>
        <p class="mb-4">Berikut merupakan data peminjaman alat laboratorium <strong>PPLG SMKN 1 Ciomas</strong></p>

        @if (Session::has('berhasil'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <strong>Success, &nbsp</strong>
                {{ Session::get('berhasil') }}
            </div>
        @endif

        @if (Session::has('gagal'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                {{ Session::get('gagal') }}
            </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="card-body">
                    <a href="#" class="btn mb-3 btn-primary btn-icon-split btn-sm" data-toggle="modal"
                        data-target="#insertModal">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Data Peminjaman</span>
                    </a>

                    <form class="form-inline my-2 my-lg-2 justify-content-end">
                        <input class="form-control mr-sm-2" type="search" placeholder="Cari" name="search"
                            aria-label="Cari">
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="real" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama User</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Dikembalikan Tanggal</th>
                                    <th>Lama Peminjaman</th>
                                    <th>Status</th>
                                    <th>Diterima Oleh</th>
                                    <th>Ubah Status</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @forelse ($var_peminjaman as $index => $peminjaman)
                                        <td>{{ $index + $var_peminjaman->firstItem() }}</td>
                                        <td class="text-capitalize">{{ $peminjaman->member->nama_member }}</td>
                                        <td class="text-capitalize">{{ $peminjaman->alat->nama_barang }}</td>
                                        <th class="text-capitalize">{{ $peminjaman->alat->kategori->nama_kategori }}</th>
                                        <td>{{ $peminjaman->created_at }}</td>
                                        {{-- updated_at --}}
                                        @if ($peminjaman->updated_at == $peminjaman->created_at)
                                            <td class="text-center">-</td>
                                        @else
                                            <td>{{ $peminjaman->updated_at }}</td>
                                        @endif
                                        {{-- lama --}}
                                        @if ($peminjaman->lama == null)
                                            <td class="text-center">-</td>
                                        @else
                                            <td>{{ $peminjaman->lama }} Hari</td>
                                        @endif
                                        <td>{{ $peminjaman->keadaan }} </td>
                                        {{-- pengupload --}}
                                        @if ($peminjaman->updated_by == null)
                                            <td class="text-center">-</td>
                                        @else
                                            <td>{{ $peminjaman->updated_by }} </td>
                                        @endif
                                        <td class="text-center">
                                            @if ($peminjaman->keadaan == 'Belum Dikembalikan')
                                                <a href="ubah_status/{{ $peminjaman->id_peminjaman }}"
                                                    class="btn btn-primary btn-icon-split btn-sm">
                                                    <i class="fas fa-check"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('peminjaman_alat') }}"
                                                    class="btn btn-danger btn-icon-split btn-sm">
                                                    <i class="fas fa-check"></i>
                                                </a>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="hapus_peminjaman/{{ $peminjaman->id_peminjaman }}"
                                                class="btn btn-danger btn-icon-split btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="12" class="text-center p-5">
                                        Peminjam tidak ada
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $var_peminjaman->links() }}
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
                        <h5 class="modal-title" id="insertModal">Input Data Peminjaman</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="user" method="POST" action="{{ route('insert_new_peminjaman') }}">
                            @csrf
                            <div class="form-group">
                                <select id="member" type="text" class="form-control s2" style="width: 100%"
                                    name="member" required>
                                    <option value="">Pilih Member...</option>
                                    @foreach ($var_member as $member)
                                        <option value="{{ $member->id_member }}">{{ $member->nama_member }}</option>
                                    @endforeach
                                </select>
                                @error('member')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <select id="alat" type="text" class="form-control s2" style="width: 100%"
                                    name="alat" required>
                                    <option value="">Pilih Alat...</option>
                                    @foreach ($var_alat as $alat)
                                        @if ($alat->jumlah_alat <= 0)
                                            <option disabled>{{ $alat->nama_barang }} - {{ $alat->merk }} </option>
                                        @else
                                            <option value="{{ $alat->id }}">{{ $alat->nama_barang }} -
                                                {{ $alat->merk }} </option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('alat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <input type="hidden" name="penginput" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="penginput_nama" value="{{ Auth::user()->name }}">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
