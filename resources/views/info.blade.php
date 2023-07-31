@extends('layouts.home')

@section('title')
    Info Website
@endsection
@section('content')
<div class="container-fluid">
   <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pengembang</h6>
            </div>
            <div class="card-body">
                 Website ini dikelola dan dikembangkan oleh Nur Nisrina Sudrayanti bekerjasama dengan rekan project saya Muhammad Raihan Suryana, Website ini dibuat dengan bantuan Template SB Admin yang didownload dari Color Lib . Website ini digunakan untuk keperluan Peminjaman Alat Laboratorium <br>Mohon maaf apabila ada kekurangan

            </div>
        </div>
                    {{-- <!-- Collapsable Card Example -->
              <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary">Versi Website</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse " id="collapseCardExample">
                  <div class="card-body">
                    Sistem Peminjaman Alat Lab PPLG Versi 1.1
                  </div>
                </div>
              </div> --}}
</div>

@endsection
