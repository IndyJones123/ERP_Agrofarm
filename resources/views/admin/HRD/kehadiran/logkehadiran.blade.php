@extends('layouts.admin.app')

<!-- ======= Header ======= -->


@section('content')

<div class="pagetitle">
    <h1>Data LogKehadiran</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">HRD</a></li>
            <li class="breadcrumb-item active">LogKehadiran Karyawan / Data LogKehadiran</li>
        </ol>
    </nav>
</div>


<!-- End Page Title -->


<section class="section dashboard">


    <!-- Left side columns -->
    <div class="btn-toolbar mt-8 col-md-12">
        <div>
            <a href="" class="btn btn-sm btn-primary m-2">
                <span data-feather="plus-circle" class="align-text-bottom me-1"></span>
                Export Data LogKehadiran CSV / PDF
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mt-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            <form action="/tableLogKehadiran" method="get">
                                <div class="input-group mt-3 mb-3">
                                    <input type="search" name="search1" class="form-control rounded " placeholder="Search Data By Nama LogKehadiran" aria-label="Search" aria-describedby="search-addon" />
                                </div>
                            </form>
                        </th>
                        <th>
                            <form action="/tableLogKehadiran" method="get">
                                <div class="input-group mt-3 mb-3">
                                    <input type="search" name="search2" class="form-control rounded " placeholder="Search Data By Minimal Gaji" aria-label="Search" aria-describedby="search-addon" />
                                </div>
                            </form>
                        </th>
                        <th>
                            <form action="/tableLogKehadiran" method="get">
                                <div class="input-group mt-3 mb-3">
                                    <input type="search" name="search3" class="form-control rounded " placeholder="Search Data By Maksimal Gaji" aria-label="Search" aria-describedby="search-addon" />
                                </div>
                            </form>
                        </th>
                        <th>
                            <form action="/tableLogKehadiran" method="get">
                                <div class="input-group mt-3 mb-3">
                                    <input type="search" name="search4" class="form-control rounded " placeholder="Search Data By Maksimal Jabatan" aria-label="Search" aria-describedby="search-addon" />
                                </div>
                            </form>
                        </th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th scope="col" style="text-align: center; vertical-align: middle">Nama Karyawan</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">Jabatan</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">Tanggal</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">Absen Masuk</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">Absen Keluar</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">Status</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $LogKehadiran)
                    <tr>
                        <td scope="row" style="text-align: center; vertical-align: middle">{{$LogKehadiran->namakaryawan}}</td>
                        <td style="text-align: center; vertical-align: middle">{{$LogKehadiran->jabatan}}</td>
                        <td style="text-align: center; vertical-align: middle">{{$LogKehadiran->tanggal}}</td>
                        <td style="text-align: center; vertical-align: middle">{{$LogKehadiran->absenmasuk}}</td>
                        <td style="text-align: center; vertical-align: middle">{{$LogKehadiran->absenkeluar}}</td>
                        <td style="text-align: center; vertical-align: middle">{{$LogKehadiran->status}}</td>
                        <td style="text-align: center; vertical-align: middle"> <a href="/tableLogKehadiran/{{$LogKehadiran->id}}/edit"><button type="submit" class="btn btn-warning">Edit</button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection


</body>

</html>