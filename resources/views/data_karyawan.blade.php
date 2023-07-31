@extends('layouts.home')

@section('title')
    Data Toolman
@endsection
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Toolman</h1>
        <p class="mb-4">Berikut merupakan data Toolman Laboratorium PPLG SMKN 1 Ciomas</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                {{-- <h6 class="m-0 font-weight-bold text-success">Data Toolman 2.0</h6>
            </div> --}}
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
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Bergabung Pada</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($var_user as $index => $user)
                                    <tr>
                                        <td>{{ $index + $var_user->firstItem() }}</td>
                                        <td class="text-capitalize">{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center p-5">
                                            Toolman tidak ada
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $var_user->links() }}
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection
