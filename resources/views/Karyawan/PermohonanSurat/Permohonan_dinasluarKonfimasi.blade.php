@extends('layouts.User.app')

<!-- ======= Header ======= -->


@section('content')


<script>
    var num = 1;

    function add_more_field() {
        num += 1;
        html = '<div class="col-12" id="row1">\
                                    <label for="inputNanme4" class="form-label">Nama Karyawan</label>\
                                    <input type="text" value="" name="namakaryawan' + num + '" class="form-control" id="inputNanme4" readonly>\
                                </div>\
                                <div class="col-12" id="row2">\
                                    <label for="inputEmail4" class="form-label">Jabatan Karyawan</label>\
                                    <input type="text" value="" name="jabatan ' + num + '" class="form-control" id="inputEmail4" readonly>\
                                </div>'

    }
    var form = document.getElementById('keluar');
    form.insertAdjacentHTML('keluar', html)
</script>
<!-- End Page Title -->

<section class="section dashboard">

    <div class="pagetitle">
        <h1>Surat Izin Dinas Keluar Dari Kantor</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"></li>Pengajuan Surat</li>
                <li class="breadcrumb-item active">Surat Izin Dinas Keluar</li>
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

                            <h5 class="card-title">Form Permohonan Dinas Keluar Dari Kantor</h5>

                            <!-- Vertical Form -->
                            <form id="keluar" class="row g-3" action="/permohonandinasluar/store" method="post">
                                {{ csrf_field() }}
                                <div class="col-12" id="row1">
                                    <label for="inputNanme4" class="form-label">Nama Karyawan</label>
                                    <input type="text" value="{{ Auth::user()->name }}" name="namakaryawan" class="form-control" id="inputNanme4" readonly>
                                </div>
                                <div class="col-12" id="row2">
                                    <label for="inputEmail4" class="form-label">Jabatan Karyawan</label>
                                    <input type="text" value="{{ Auth::user()->jabatan }}" name="jabatan" class="form-control" id="inputEmail4" readonly>
                                </div>
                                <button class="btn btn-dark float-right mt-2" onclick="add_more_field()">Add More Karyawan</button>
                                <div class="col-12">
                                    <label for="inputEmail4" class="form-label">Tanggal</label>
                                    <input type="date" name="tanggal" value="{{$tanggal}}" class="form-control" id="inputEmail4" readonly>
                                </div>
                                <div class="col-12">
                                    <label for="inputEmail4" class="form-label">Alasan Keluar Kantor</label>
                                    <input type="text" name="keterangan" class="form-control" id="inputEmail4">
                                </div>
                                <input type="file" name="foto" value="null.png" hidden>
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
                        <h5 class="card-title">History Surat Izin Keluar Kantor</span></h5>

                        <div class="news">
                            @foreach($data2 as $terlambat)
                            <div class="post-item clearfix">
                                @if($terlambat->atasan=='null')
                                <img src="assets/img/news-1.jpg" alt="">
                                <h4><a href="#">Permohonan {{$terlambat->tanggal}} <br> Masih Belum Disetujui</a></h4>
                                <p>Mohon Menunggu Konfirmasi Permohonan Apabila Sudah Dapat Didownload PDF Disamping kiri berikut</p>
                                @else
                                <a href="dokumen/{{$terlambat->foto}}">Download <br>PDF</a></i>
                                <h4><a href="#">Disetujui By {{$terlambat->atasan}}</a></h4>
                                <p>Permohonan Surat Keterlambatan Telah Dikonfirmasi Anda Sudah Dapat Download PDF Disamping kiri berikut</p>
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