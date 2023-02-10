@extends('layouts.User.app')

<!-- ======= Header ======= -->


@section('content')



<!-- End Page Title -->

<section class="section dashboard">

    <div class="pagetitle">
        <h1>Surat Izin Terlambat</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"></li>Pengajuan Surat</li>
                <li class="breadcrumb-item active">Surat Izin Terlambat</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">


            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">Form Permohonan Terlambat > 15 Menit dari Jam Kerja</h5>

                            <!-- Vertical Form -->
                            <form class="row g-3" action="/terlambat/store" method="post">
                                {{ csrf_field() }}
                                <div class="col-12">
                                    <label for="inputNanme4" class="form-label">Nama Karyawan</label>
                                    <input type="text" value="{{ Auth::user()->name }}" name="namakaryawan" class="form-control" id="inputNanme4" readonly>
                                </div>
                                <div class="col-12">
                                    <label for="inputEmail4" class="form-label">Jabatan Karyawan</label>
                                    <input type="text" value="{{ Auth::user()->jabatan }}" name="jabatan" class="form-control" id="inputEmail4" readonly>
                                </div>
                                <div class="col-12">
                                    <label for="inputEmail4" class="form-label">Tanggal</label>
                                    <input type="date" name="tanggal" value="{{$tanggal}}" class="form-control" id="inputEmail4" readonly>
                                </div>
                                <div class="col-12">
                                    <label for="inputEmail4" class="form-label">Alasan Keterlambatan</label>
                                    <input type="text" name="keterangan" class="form-control" id="inputEmail4">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form><!-- Vertical Form -->

                        </div>
                    </div>
                </div>
            </div><!-- End Left side columns -->


            <!-- Right side columns -->
            <div class="col-lg-4">



                <!-- News & Updates Traffic -->
                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class="card-body pb-0">
                        <h5 class="card-title">History Surat Keterlambatan</span></h5>

                        <div class="news">
                            @foreach($data as $terlambat)
                            <div class="post-item clearfix">
                                @if($terlambat->atasan=='null')
                                <img src="assets/img/news-1.jpg" alt="">
                                <h4><a href="#">Permohonan {{$terlambat->tanggal}} <br> Masih Belum Disetujui</a></h4>
                                <p>Mohon Menunggu Konfirmasi Permohonan Apabila Sudah Dapat Didownload Gambar Disamping kiri berikut</p>
                                @else
                                <h4><a href="#">Disetujui By {{$terlambat->atasan}}</a></h4>
                                <p>Sit recusandae non aspernatur laboriosam. Quia enim eligendi sed ut harum...</p>
                                @endif

                            </div>
                            @endforeach
                        </div><!-- End sidebar recent posts-->

                    </div>
                </div><!-- End News & Updates -->

            </div><!-- End Right side columns -->


        </div>
    </section>


    @endsection


    </body>

    </html>