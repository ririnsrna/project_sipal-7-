@extends('layouts.app')

@section('title')
    Login Admin
@endsection
@section('body')
    class="bg-register-image"
@endsection
@section('content')
    <div class="container mt-5">
        <!-- Outer Row -->
        <div class="row justify-content-center ">
            <div class="col-xl-5 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-4">
                    <div class="card-body p-6 h-32 rounded-2xl">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12 ">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h3 class="mb-3 font-weight-bold text-center">Sign In</h3>
                                    </div>
                                    <form class="user mt-4 mb-0 " method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="text-secondary">Email</label>
                                                <input class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" autofocus
                                                    placeholder="Enter Email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-2">
                                            <div class="form-group">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label class="text-secondary">Password</label>
                                                </div>
                                                <input class="form-control @error('password') is-invalid @enderror"
                                                    type="password" name="password" placeholder="Enter Password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block ml-8 mt-n5 mb-4 "
                                    style="width:300px; margin-left:60px">
                                    {{ __('Login') }}
                                </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
