@extends('layouts.admin.app')

<!-- ======= Header ======= -->


@section('content')

<div class="pagetitle">
    <h1>Data Kehadiran</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">HRD</a></li>
            <li class="breadcrumb-item active">Kehadiran Karyawan / Data Kehadiran</li>
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
                Export Data Kehadiran CSV / PDF
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mt-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                            <form action="/tableKehadiran" method="get">
                                <div class="input-group mt-3 mb-3">
                                    <input type="search" name="search1" class="form-control rounded " placeholder="Search Data By Nama Kehadiran" aria-label="Search" aria-describedby="search-addon" />
                                </div>
                            </form>
                        </th>
                        <th>
                            <form action="/tableKehadiran" method="get">
                                <div class="input-group mt-3 mb-3">
                                    <input type="search" name="search2" class="form-control rounded " placeholder="Search Data By Minimal Gaji" aria-label="Search" aria-describedby="search-addon" />
                                </div>
                            </form>
                        </th>
                        <th>
                            <form action="/tableKehadiran" method="get">
                                <div class="input-group mt-3 mb-3">
                                    <input type="search" name="search3" class="form-control rounded " placeholder="Search Data By Maksimal Gaji" aria-label="Search" aria-describedby="search-addon" />
                                </div>
                            </form>
                        </th>
                        <th>
                            <form action="/tableKehadiran" method="get">
                                <div class="input-group mt-3 mb-3">
                                    <input type="search" name="search4" class="form-control rounded " placeholder="Search Data By Maksimal Jabatan" aria-label="Search" aria-describedby="search-addon" />
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
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th scope="col" style="text-align: center; vertical-align: middle">Nama Pegawai</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">Bulan</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">NIK</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">Jabatan</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">S</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">I</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">A</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">C</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">DL</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">T</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">H</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">WH</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">SC</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">Keterangan</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $Kehadiran)
                    <tr>
                        <td scope="row">{{$Kehadiran->namapegawai}}</td>
                        <td>{{$Kehadiran->bulan}}</td>
                        <td>{{$Kehadiran->nik}}</td>
                        <td>{{$Kehadiran->jabatan}}</td>
                        <td>{{$Kehadiran->sakit}}</td>
                        <td>{{$Kehadiran->izin}}</td>
                        <td>{{$Kehadiran->alpha}}</td>
                        <td>{{$Kehadiran->cuti}}</td>
                        <td>{{$Kehadiran->dinasluar}}</td>
                        <td>{{$Kehadiran->terlambat}}</td>
                        <td>{{$Kehadiran->hadir}}</td>
                        <td>{{$Kehadiran->wajibhadir}}</td>
                        <td>{{$Kehadiran->sisacuti}}</td>
                        <td>{{$Kehadiran->keterangan}}</td>
                        <td> <a href="/tableKehadiran/{{$Kehadiran->id}}/edit"><button type="submit" class="btn btn-warning">Update</button></a>
                            <form action="/tableKehadiran/{{$Kehadiran->id}}" method="POST">
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