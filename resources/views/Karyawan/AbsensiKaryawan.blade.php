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
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
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
                                    @if($Absensi->start_time>'07:19:00')
                                    <a href=""><button type="submit" class="btn btn-secondary">Belum Saatnya Absen</button></a>
                                    @elseif($Absensi->start_time<'07:19:00' && '07:19:00' <$Absensi->end_time)
                                        <a href="/tableAbsensi/{{$Absensi->id}}/edit"><button type="submit" class="btn btn-info">Absen</button></a>

                                        @endif
                                        @foreach($data3 as $logkehadiran)

                                        @if($Absensi->start_time<'07:19:00' && $logkehadiran->status == 'sudahabsen')
                                            <a href=""><button type="submit" class="btn btn-success">Anda Sudah Absen Hari Ini</button></a>

                                            @elseif($Absensi->start_time<'07:19:00' && $logkehadiran->status == 'belumabsen' && '23:19:00'>$Absensi->end_time)
                                                <input type="file" name="bulan" class="form-control" id="inputEmail4" readonly>
                                                <a href="/tableAbsensi/{{$Absensi->id}}/edit"><button type="submit" class="btn btn-danger">Anda Terlambat</button></a>
                                                @endif
                                                @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">

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

                        <div class="card-body">
                            <h5 class="card-title">Absen Pulang Kerja<span>| Today</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-briefcase-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>
                                        <td>{{$Absensi->end_time}}</td>
                                    </h6>
                                    <a href="/tableAbsensi/{{$Absensi->id}}/edit"><button type="submit" class="btn btn-warning">Absen</button></a>

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
                    <h5 class="card-title">News &amp; Updates <span>| Today</span></h5>

                    <div class="news">
                        <div class="post-item clearfix">
                            <img src="assets/img/news-1.jpg" alt="">
                            <h4><a href="#">Nihil blanditiis at in nihil autem</a></h4>
                            <p>Sit recusandae non aspernatur laboriosam. Quia enim eligendi sed ut harum...</p>
                        </div>

                        <div class="post-item clearfix">
                            <img src="assets/img/news-2.jpg" alt="">
                            <h4><a href="#">Quidem autem et impedit</a></h4>
                            <p>Illo nemo neque maiores vitae officiis cum eum turos elan dries werona nande...</p>
                        </div>

                        <div class="post-item clearfix">
                            <img src="assets/img/news-3.jpg" alt="">
                            <h4><a href="#">Id quia et et ut maxime similique occaecati ut</a></h4>
                            <p>Fugiat voluptas vero eaque accusantium eos. Consequuntur sed ipsam et totam...</p>
                        </div>

                        <div class="post-item clearfix">
                            <img src="assets/img/news-4.jpg" alt="">
                            <h4><a href="#">Laborum corporis quo dara net para</a></h4>
                            <p>Qui enim quia optio. Eligendi aut asperiores enim repellendusvel rerum cuder...</p>
                        </div>

                        <div class="post-item clearfix">
                            <img src="assets/img/news-5.jpg" alt="">
                            <h4><a href="#">Et dolores corrupti quae illo quod dolor</a></h4>
                            <p>Odit ut eveniet modi reiciendis. Atque cupiditate libero beatae dignissimos eius...</p>
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