@extends('layouts.User.app')

<!-- ======= Header ======= -->


@section('content')

<div class="pagetitle">
    <h1>Absensi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/tablejabatan">Home</a></li>
            <li class="breadcrumb-item active">Absensi</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
            <div class="row">
                @foreach($data as $Absensi)

                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">

                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Tidak Masuk</h6>
                                </li>
                                @if('22:00:00'>$waktu && $data3!='[{"status":"Terlambat"}]' && $data3!='[{"status":"Terlambats"}]' && $data3!='[{"status":"Hadir-1"}]' && $data3!='[{"status":"Hadir-2"}]')
                                <li><a class="dropdown-item" href="/izin">Izin</a></li>
                                <li><a class="dropdown-item" href="/sakit">Sakit</a></li>
                                <li><a class="dropdown-item" href="/dinasluar">Dinas Luar</a></li>
                                <li><a class="dropdown-item" href="/cuti">Cuti</a></li>
                                @endif
                            </ul>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Absen Masuk Kerja <span>| Today</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-briefcase-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>
                                        <td>{{$Absensi->start_time}}</td>
                                    </h6>
                                    @if($Absensi->start_time>$waktu)

                                    <a href=""><button type="submit" class="btn btn-secondary">Belum Saatnya Absen</button></a>
                                    @elseif($data3=='[{"status":"Terlambats"}]')<a href=""><button type="submit" class="btn btn-warning">Anda Sudah Absen Terlambat Hari Ini</button></a>
                                    @elseif($Absensi->start_time<$waktu && $data3=='[{"status":"Terlambat"}]' ) <a href=""><button type="submit" class="btn btn-warning">Anda Sudah Absen Terlambat Hari Ini</button></a>
                                        @elseif($Absensi->start_time<$waktu && $data3=='[{"status":"Terlambat"}]' ) <a href=""><button type="submit" class="btn btn-warning">Anda Sudah Absen Terlambat Hari Ini</button></a>
                                            @elseif($Absensi->start_time<$waktu && $data3=='[{"status":"Hadir-2"}]' ) <a href=""><button type="submit" class="btn btn-success">Anda Sudah Absen Masuk Hari Ini</button></a>
                                                @elseif($Absensi->start_time<$waktu && $data3=='[{"status":"Hadir-1"}]' ) <a href=""><button type="submit" class="btn btn-success">Anda Sudah Absen Masuk Hari Ini</button></a>
                                                    @elseif($Absensi->start_time<$waktu && $waktu < $Absensi->batas_start_time)

                                                        <form class="row g-3" action="/tableLogKehadiran/create/store" method="post">
                                                            {{ csrf_field() }}
                                                            <div class="col-12">

                                                                <input type="text" name="namakaryawan" class="form-control" value='{{ Auth::user()->name }}' hidden>

                                                            </div>
                                                            <div class="col-12">

                                                                <input type="text" name="jabatan" class="form-control" value="{{ Auth::user()->jabatan }}" hidden>
                                                            </div>
                                                            <div class="col-12">
                                                                <input type="date" name="tanggal" class="form-control" value="{{$tanggal}}" hidden>
                                                            </div>
                                                            <div class="col-12">
                                                                <input type="time" name="absenmasuk" class="form-control" value="{{$waktu}}" hidden>
                                                            </div>
                                                            <div class="col-12">
                                                                <input type="time" name="absenkeluar" class="form-control" value="00:00:00" hidden>
                                                            </div>
                                                            <div class="col-12">
                                                                <input type="text" name="status" class="form-control" value="Hadir-1" hidden>
                                                            </div>
                                                            <div class="text-center">
                                                                <button type="submit" class="btn btn-info">Absen Sekarang {{$waktu}}</button>
                                                            </div>
                                                        </form><!-- Vertical Form -->


                                                        @elseif($Absensi->start_time<$waktu && 'waktu'>$Absensi->batas_start_time)

                                                            <form class="row g-3" action="/tableLogKehadiran/create/store" method="post">
                                                                {{ csrf_field() }}
                                                                <div class="col-12">

                                                                    <input type="text" name="namakaryawan" class="form-control" value='{{ Auth::user()->name }}' hidden>

                                                                </div>
                                                                <div class="col-12">

                                                                    <input type="text" name="jabatan" class="form-control" value="{{ Auth::user()->jabatan }}" hidden>
                                                                </div>
                                                                <div class="col-12">
                                                                    <input type="date" name="tanggal" class="form-control" value="{{$tanggal}}" hidden>
                                                                </div>
                                                                <div class="col-12">
                                                                    <input type="time" name="absenmasuk" class="form-control" value="{{$waktu}}" hidden>
                                                                </div>
                                                                <div class="col-12">
                                                                    <input type="time" name="absenkeluar" class="form-control" value="00:00:00" hidden>
                                                                </div>
                                                                <div class="col-12">
                                                                    <input type="text" name="status" class="form-control" value="Terlambat" hidden>
                                                                </div>
                                                                <div class="col-12">
                                                                    <input type="file" name="keterangan" class="form-control" required>
                                                                </div>
                                                                <div class="text-center">
                                                                    <button type="submit" class="btn btn-danger">Anda Terlambat {{$waktu}}</button>
                                                                </div>
                                                            </form><!-- Vertical Form -->


                                                            @endif

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->

                <!-- Sales Card 2 -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">



                        <div class="card-body">
                            <h5 class="card-title">Absen Selesai Kerja <span>| Today</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-briefcase-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>
                                        <td>{{$Absensi->end_time}}</td>
                                    </h6>
                                    @if($Absensi->end_time>$waktu)
                                    <a href=""><button type="submit" class="btn btn-secondary">Belum Saatnya Absen</button></a>
                                    @elseif($data3=='[{"status":"Terlambats"}]')<a href=""><button type="submit" class="btn btn-warning">Anda Sudah Absen Terlambat Hari Ini</button></a>
                                    @elseif($Absensi->end_time<$waktu && $data3=='[{"status":"Hadir-2"}]' ) <a href=""><button type="submit" class="btn btn-success">Anda Sudah Absen Hari Ini</button></a>
                                        @elseif($Absensi->batas_end_time<$waktu && $data3=='[{"status":"Terlambats"}]' ) <a href=""><button type="submit" class="btn btn-warning">Anda Sudah Absen Terlambat Hari Ini</button></a>
                                            @elseif($Absensi->end_time<$waktu && $waktu< $Absensi->batas_end_time && $data3=='[{"status":"Terlambat"}]')
                                                <form class="row g-3" action="/tableLogKehadiran2/{tanggal}" method="post">
                                                    @method('put')
                                                    {{ csrf_field() }}
                                                    <div class="col-12">

                                                        <input type="text" name="namakaryawan" class="form-control" value='{{ Auth::user()->name }}' hidden>

                                                    </div>
                                                    <div class="col-12">

                                                        <input type="text" name="jabatan" class="form-control" value="{{ Auth::user()->jabatan }}" hidden>
                                                    </div>
                                                    <div class="col-12">
                                                        <input type="date" name="tanggal" class="form-control" value="{{$tanggal}}" hidden>
                                                    </div>
                                                    <div class="col-12">
                                                        <input type="time" name="absenkeluar" class="form-control" value="{{$waktu}}" hidden>
                                                    </div>
                                                    <div class="col-12">
                                                        <input type="text" name="status" class="form-control" value="Terlambats" hidden>
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-danger">Absen Pulang Sekarang {{$waktu}}</button>
                                                    </div>
                                                </form><!-- Vertical Form -->
                                                @elseif($Absensi->end_time<$waktu && $waktu> $Absensi->batas_end_time && $data3=='[{"status":"Terlambat"}]')
                                                    <form class="row g-3" action="/tableLogKehadiran2/{tanggal}" method="post">
                                                        @method('put')
                                                        {{ csrf_field() }}
                                                        <div class="col-12">

                                                            <input type="text" name="namakaryawan" class="form-control" value='{{ Auth::user()->name }}' hidden>

                                                        </div>
                                                        <div class="col-12">

                                                            <input type="text" name="jabatan" class="form-control" value="{{ Auth::user()->jabatan }}" hidden>
                                                        </div>
                                                        <div class="col-12">
                                                            <input type="date" name="tanggal" class="form-control" value="{{$tanggal}}" hidden>
                                                        </div>
                                                        <div class="col-12">
                                                            <input type="time" name="absenkeluar" class="form-control" value="{{$waktu}}" hidden>
                                                        </div>
                                                        <div class="col-12">
                                                            <input type="text" name="status" class="form-control" value="Terlambat" hidden>
                                                        </div>
                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-danger">Absen Pulang Sekarang {{$waktu}}</button>
                                                        </div>
                                                    </form><!-- Vertical Form -->
                                                    @elseif($Absensi->end_time<$waktu && $waktu < $Absensi->batas_end_time)
                                                        <form class="row g-3" action="/tableLogKehadiran2/{tanggal}" method="post">
                                                            @method('put')
                                                            {{ csrf_field() }}
                                                            <div class="col-12">

                                                                <input type="text" name="namakaryawan" class="form-control" value='{{ Auth::user()->name }}' hidden>

                                                            </div>
                                                            <div class="col-12">

                                                                <input type="text" name="jabatan" class="form-control" value="{{ Auth::user()->jabatan }}" hidden>
                                                            </div>
                                                            <div class="col-12">
                                                                <input type="date" name="tanggal" class="form-control" value="{{$tanggal}}" hidden>
                                                            </div>
                                                            <div class="col-12">
                                                                <input type="time" name="absenkeluar" class="form-control" value="{{$waktu}}" hidden>
                                                            </div>
                                                            <div class="col-12">
                                                                <input type="text" name="status" class="form-control" value="Hadir-2" hidden>
                                                            </div>
                                                            <div class="text-center">
                                                                <button type="submit" class="btn btn-info">Absen Sekarang {{$waktu}}</button>
                                                            </div>
                                                        </form><!-- Vertical Form -->

                                                        @endif

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->
                @endforeach



                <!-- Top Selling -->
                <div class="col-12">
                    <div class="card top-selling overflow-auto">

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
                            <h5 class="card-title">History Absensi</span></h5>

                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">Tanggal Absensi</th>
                                        <th scope="col">Absen Masuk</th>
                                        <th scope="col">Absen Keluar</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data2 as $log)
                                    <tr>

                                        <td><a href="#" class="text-primary fw-bold">{{$log->tanggal}}</a></td>
                                        <td>{{$log->absenmasuk}}</td>
                                        <td class="fw-bold">{{$log->absenkeluar}}</td>
                                        <td class="fw-bold">{{$log->status}}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>

                    </div>
                </div><!-- End Top Selling -->

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
                    <h5 class="card-title">Keterangan Status <span>| Absensi</span></h5>

                    <div class="news">
                        <div class="post-item clearfix">
                            <img src="{{asset('assets/img/favicon.png')}}" width="50" height="50">
                            <h4><a href="#">Hadir-1</a></h4>
                            <p>Karyawan Telah Melakukan Absensi Masuk</p>
                        </div>

                        <div class="post-item clearfix">
                            <img src="{{asset('assets/img/favicon.png')}}" width="50" height="50">
                            <h4><a href="#">Hadir-2</a></h4>
                            <p>Karyawan Telah Melakukan Absensi Masuk dan Absensi Keluar</p>
                        </div>

                        <div class="post-item clearfix">
                            <img src="{{asset('assets/img/favicon.png')}}" width="50" height="50">
                            <h4><a href="#">Terlambat</a></h4>
                            <p>Karyawan Terlambat Untuk Melakukan Absensi Dan Diwajibkan Untuk Mengirimkan Surat Keterlambatan Yang Dapat Didapatkan Di Pengajuan Surat</p>
                        </div>

                        <div class="post-item clearfix">
                            <img src="{{asset('assets/img/favicon.png')}}" width="50" height="50">
                            <h4><a href="#">Cuti</a></h4>
                            <p>Karyawan Tidak Bekerja Dan Memutuskan Untuk Mengambil Jatah Cuti</p>
                        </div>

                        <div class="post-item clearfix">
                            <img src="{{asset('assets/img/favicon.png')}}" width="50" height="50">
                            <h4><a href="#">Absen</a></h4>
                            <p>Karyawan Tidak Bekerja Dan Sisa Cuti Habis</p>
                        </div>
                        <div class="post-item clearfix">
                            <img src="{{asset('assets/img/favicon.png')}}" width="50" height="50">
                            <h4><a href="#">Dinas Luar</a></h4>
                            <p>Karyawan Absen Diluar Wilayah Perusahaan Dan Diwajibkan Menyertakan Surat Keterangan Yang Dapat Didapatkan Di Pengajuan Surat</p>
                        </div>
                        <div class="post-item clearfix">
                            <img src="{{asset('assets/img/favicon.png')}}" width="50" height="50">
                            <h4><a href="#">Izin</a></h4>
                            <p>Karyawan Tidak Bekerja Karena Terdapat Kegiatan Mendesak Dan Diwajibkan Melampirkan Surat Izin Yang Dapat Didapatkan Di Pengajuan Surat</p>
                        </div>

                    </div><!-- End sidebar recent posts-->

                </div>
            </div><!-- End News & Updates -->

        </div><!-- End Right side columns -->

    </div>
</section>

@endsection


</body>

</html>