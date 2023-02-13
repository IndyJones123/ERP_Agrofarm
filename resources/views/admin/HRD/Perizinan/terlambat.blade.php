@extends('layouts.admin.app')

<!-- ======= Header ======= -->


@section('content')

<div class="pagetitle">
    <h1>Data Terlambat</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">HRD</a></li>
            <li class="breadcrumb-item active">Terlambat</li>
        </ol>
    </nav>
</div>


<!-- End Page Title -->


<section class="section dashboard">


    <!-- Left side columns -->
    <div class="btn-toolbar mt-8 col-md-12">
        <div>
            <a href="/tableTerlambat/create" class="btn btn-sm btn-primary m-2">
                <span data-feather="plus-circle" class="align-text-bottom me-1"></span>
                Add Terlambat By Input
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mt-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            <form action="/tableTerlambat" method="get">
                                <div class="input-group mt-3 mb-3">
                                    <input type="search" name="search1" class="form-control rounded " placeholder="Search Data By Nama Terlambat" aria-label="Search" aria-describedby="search-addon" />
                                </div>
                            </form>
                        </th>
                        <th>
                            <form action="/tableTerlambat" method="get">
                                <div class="input-group mt-3 mb-3">
                                    <input type="search" name="search2" class="form-control rounded " placeholder="Search Data By Minimal Gaji" aria-label="Search" aria-describedby="search-addon" />
                                </div>
                            </form>
                        </th>
                        <th>
                            <form action="/tableTerlambat" method="get">
                                <div class="input-group mt-3 mb-3">
                                    <input type="search" name="search3" class="form-control rounded " placeholder="Search Data By Maksimal Gaji" aria-label="Search" aria-describedby="search-addon" />
                                </div>
                            </form>
                        </th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th scope="col" style="text-align: center; vertical-align: middle">Nama Karyawan</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">Jabatan</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">Atasan</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">Tanggal</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">Keterangan</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">PDF Konfirmasi</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">Waktu Diminta</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $Terlambat)
                    <tr>
                        <td scope="row">{{$Terlambat->namakaryawan}}</td>
                        <td>{{$Terlambat->jabatan}}</td>
                        <td>{{$Terlambat->atasan}}</td>
                        <td>{{$Terlambat->tanggal}}</td>
                        <td>{{$Terlambat->keterangan}}</td>
                        <td>{{$Terlambat->foto}}</td>
                        <td>{{$Terlambat->created_at}}</td>
                        <td> <a href="/tableTerlambat/{{$Terlambat->id}}/edit"><button type="submit" class="btn btn-warning">Update</button></a>

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