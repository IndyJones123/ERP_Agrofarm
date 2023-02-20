@extends('layouts.admin.app')

<!-- ======= Header ======= -->


@section('content')

<div class="pagetitle">
    <h1>Data Absensi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">HRD</a></li>
            <li class="breadcrumb-item active">Absensi</li>
        </ol>
    </nav>
</div>


<!-- End Page Title -->


<section class="section dashboard">


    <!-- Left side columns -->
    <div class="btn-toolbar mt-8 col-md-12">
        <div>
            <a href="/tableAbsensi/create" class="btn btn-sm btn-primary m-2">
                <span data-feather="plus-circle" class="align-text-bottom me-1"></span>
                Add Absensi By Input
            </a>
            <a href="/tableAbsensi/create" class="btn btn-sm btn-primary m-2">
                <span data-feather="plus-circle" class="align-text-bottom me-1"></span>
                Add Absensi By Import Excel (CSV/EXCEL)
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mt-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            <form action="/tableAbsensi" method="get">
                                <div class="input-group mt-3 mb-3">
                                    <input type="search" name="search1" class="form-control rounded " placeholder="Search Data By Nama Absensi" aria-label="Search" aria-describedby="search-addon" />
                                </div>
                            </form>
                        </th>
                        <th>
                            <form action="/tableAbsensi" method="get">
                                <div class="input-group mt-3 mb-3">
                                    <input type="search" name="search2" class="form-control rounded " placeholder="Search Data By Minimal Gaji" aria-label="Search" aria-describedby="search-addon" />
                                </div>
                            </form>
                        </th>
                        <th>
                            <form action="/tableAbsensi" method="get">
                                <div class="input-group mt-3 mb-3">
                                    <input type="search" name="search3" class="form-control rounded " placeholder="Search Data By Maksimal Gaji" aria-label="Search" aria-describedby="search-addon" />
                                </div>
                            </form>
                        </th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>

                    </tr>
                    <tr>
                        <th scope="col" style="text-align: center; vertical-align: middle">Judul Absensi</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">Hari</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">Jabatan</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">Tempat</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">Latitude</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">Longitude</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">Jarak (Meter)</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">Absen Kerja</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">Batas Kerja</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">Absen Pulang</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">Batas Pulang</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $Absensi)
                    <tr>
                        <td scope="row">{{$Absensi->tittle}}</td>
                        <td>{{$Absensi->hari}}</td>
                        <td>{{$Absensi->jabatan}}</td>
                        <td>{{$Absensi->tempat}}</td>
                        <td>{{$Absensi->latitude}}</td>
                        <td>{{$Absensi->longtitude}}</td>
                        <td>{{$Absensi->jarak}}</td>
                        <td>{{$Absensi->start_time}}</td>
                        <td>{{$Absensi->batas_start_time}}</td>
                        <td>{{$Absensi->end_time}}</td>
                        <td>{{$Absensi->batas_end_time}}</td>
                        <td> <a href="/tableAbsensi/{{$Absensi->id}}/edit"><button type="submit" class="btn btn-warning">Update</button></a>
                            <form action="/tableAbsensi/{{$Absensi->id}}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">DELETE</button>
                            </form>
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