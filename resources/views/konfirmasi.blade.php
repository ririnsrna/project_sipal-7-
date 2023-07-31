@extends('layouts.home')

@section('title')
    Konfirmasi Password
@endsection
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- Approach -->
            <div class="col-xl-6 col-md-6 mb-4 align-middle">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold">Konfirmasi Password</h6>
                    </div>
                    <div class="card-body">
                        <p>Masukkan password anda, <b class="text-uppercase ">{{ Auth::user()->name }} </b></p>
                        <form action="{{ route('postKonfirmasi') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="password" class="form-control" name="password"
                                    placeholder="Konfirmasi password...">
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
