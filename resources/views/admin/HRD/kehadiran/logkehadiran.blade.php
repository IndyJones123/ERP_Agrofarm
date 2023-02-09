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
            <a href="/exportlog" class="btn btn-sm btn-primary m-2">
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
                        <th scope="col" style="text-align: center; vertical-align: middle">Keterangan</th>
                        <th scope="col" style="text-align: center; vertical-align: middle">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $LogKehadiran)
                    <tr>
                        <form action="/tableLogKehadiran/{{$LogKehadiran->id}}" method="post">
                            @method('put')
                            {{ csrf_field() }}
                            <td scope="row" style="text-align: center; vertical-align: middle"><input type="text" name="namakaryawan" value="{{$LogKehadiran->namakaryawan}}" readonly></td>
                            <td style="text-align: center; vertical-align: middle"><input type="text" name="jabatan" value="{{$LogKehadiran->jabatan}}" readonly></td>
                            <td style="text-align: center; vertical-align: middle"><input type="date" name="tanggal" value="{{$LogKehadiran->tanggal}}" readonly></td>
                            <td style="text-align: center; vertical-align: middle"><input type="time" name="absenmasuk" value="{{$LogKehadiran->absenmasuk}}" readonly></td>
                            </td>
                            <td style="text-align: center; vertical-align: middle"><input type="time" name="absenkeluar" value="{{$LogKehadiran->absenkeluar}}" readonly></td>
                            <td style="text-align: center; vertical-align: middle"><select id="status" name="status">
                                    <option value="Pending-izin" {{$LogKehadiran->status == "Pending-izin" ? 'selected' : ''}}>Pending Izin</option>
                                    <option value="Pending-sakit" {{$LogKehadiran->status == "Pending-sakit" ? 'selected' : ''}}>Pending Sakit</option>
                                    <option value="Pending-dinasluar" {{$LogKehadiran->status == "Pending-dinasluar" ? 'selected' : ''}}>Pending Dinas Luar</option>
                                    <option value="Pending-cuti" {{$LogKehadiran->status == "Pending-cuti" ? 'selected' : ''}}>Pending Cuti</option>
                                    <option value="Hadir-1" {{$LogKehadiran->status == "Hadir-1" ? 'selected' : ''}}>Hadir-1</option>
                                    <option value="Hadir-2" {{$LogKehadiran->status == "Hadir-2" ? 'selected' : ''}}>Hadir-2</option>
                                    <option value="terlambats" {{$LogKehadiran->status == "terlambats" ? 'selected' : ''}}>Terlambat</option>
                                    <option value="cuti" {{$LogKehadiran->status == "cuti" ? 'selected' : ''}}>Cuti</option>
                                    <option value="dinasluar" {{$LogKehadiran->status == "dinasluar" ? 'selected' : ''}}>Dinas Luar</option>
                                    <option value="absen" {{$LogKehadiran->status == "absen" ? 'selected' : ''}}>Absen</option>
                                    <option value="izin" {{$LogKehadiran->status == "izin" ? 'selected' : ''}}>Izin</option>
                                    <option value="sakit" {{$LogKehadiran->status == "sakit" ? 'selected' : ''}}>Sakit</option>
                                    <option value="Izin-ditolak" {{$LogKehadiran->status == "Izin-ditolak" ? 'selected' : ''}}>Izin Ditolak</option>
                                </select></td>
                            <td style="text-align: center; vertical-align: middle"><img src="{{$LogKehadiran->keterangan}}" alt="" height="100px" width="100px"></td>
                            @if($LogKehadiran->status=='Hadir-1' || $LogKehadiran->status=='Hadir-2' || $LogKehadiran->status=='terlambat' || $LogKehadiran->status=='terlambats' || $LogKehadiran->status=='cuti' || $LogKehadiran->status=='dinasluar' || $LogKehadiran->status=='absen' || $LogKehadiran->status=='izin' || $LogKehadiran->status=='Izin-ditolak')
                            <td style="text-align: center; vertical-align: middle"> <a class="btn btn-success">Verified</a></a>
                                <br><br>
                                <button type="submit" class="btn btn-warning">Update Status</button></a>
                            </td>



                            @elseif($LogKehadiran->status=='Pending-izin')
                            <td style="text-align: center; vertical-align: middle"> <button type="submit" class="btn btn-warning">Update Status</button></a>

                            </td>
                            @elseif($LogKehadiran->status=='Pending-sakit')
                            <td style="text-align: center; vertical-align: middle"> <button type="submit" class="btn btn-warning">Update Status</button></a>

                            </td>
                            @elseif($LogKehadiran->status=='Pending-cuti')
                            <td style="text-align: center; vertical-align: middle"> <button type="submit" class="btn btn-warning">Update Status</button>
                            </td>

                            @elseif($LogKehadiran->status=='Pending-dinasluar')
                            <td style="text-align: center; vertical-align: middle"> <button type="submit" class="btn btn-warning">Update Status</button></a>

                            </td>
                            @endif
                        </form>
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