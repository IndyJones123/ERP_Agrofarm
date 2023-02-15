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

                            <h5 class="card-title">Form Permohonan Terlambat > 15 Menit dari Jam Kerja Hari Ini</h5>
                            @foreach($data as $terlambat2)
                            @if($terlambat2->atasan!='null')
                            <h1> Permohonan Anda Telah Dikonfimasi Oleh Atasan Anda Mohon Download File Di Samping Ini Untuk Dicantumkan Pada Saat Absensi</h1>
                            <!-- Vertical Form -->

                            @else
                            <h1> Sedang Dalam Proses Konfirmasi dan dapat diunduh di Kanan Halaman Ini</h1>
                            @endif
                            @endforeach
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
                            @foreach($data2 as $terlambat)
                            <div class="post-item clearfix">
                                @if($terlambat->atasan=='null')

                                <h4><a href="#">Permohonan {{$terlambat->tanggal}} <br> Masih Belum Disetujui</a></h4>
                                <p>Mohon Menunggu Konfirmasi Permohonan Apabila Sudah Dapat Didownload PDF Disamping kiri berikut</p>
                                @else
                                <a href="dokumen/{{$terlambat->foto}}">Download</a></i>
                                <h4><a href="#">Permohonan {{$terlambat->tanggal}} <br> Disetujui By {{$terlambat->atasan}}</a></h4>
                                <p>Mohon Lakukan Absensi Segera Dengan Melampirkan PDF Disamping</p>
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