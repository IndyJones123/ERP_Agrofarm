@extends('layouts.admin.app')

<!-- ======= Header ======= -->


@section('content')

<div class="pagetitle">
    <h1>Data Payroll Karyawan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">HRD</a></li>
            <li class="breadcrumb-item active">Payroll Karyawan</li>
        </ol>
    </nav>
</div>


<!-- End Page Title -->


<section class="section dashboard">

    <div>
        <form method="POST" action="/payrollImport" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" value="">
            <button class="btn btn-sm btn-warning m-2">Add payroll By Input</button>
        </form>
    </div>
    <!-- Left side columns -->
    <div class="btn-toolbar mt-8 col-md-12">
        <div>
            <a href="/tablepayroll/create" class="btn btn-sm btn-primary m-2">
                <span data-feather="plus-circle" class="align-text-bottom me-1"></span>
                Add payroll By Input
            </a>
        </div>

        <div>
            <a href="/payrollExport" class="btn btn-sm btn-warning m-2">
                <span data-feather="plus-circle" class="align-text-bottom me-1"></span>
                Export payroll By CSV
            </a>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-8 mt-3">
            <table class="table table-striped">
                <thead>
                    <!-- <tr>
                        <th scope="col"></th>
                        <th>
                            <form action="/tablepayroll" method="get">
                                <div class="input-group mt-3 mb-3">
                                    <input type="search" name="search1" class="form-control rounded " placeholder="Search Data By Nama payroll" aria-label="Search" aria-describedby="search-addon" />
                                </div>
                            </form>
                        </th>
                        <th>
                            <form action="/tablepayroll" method="get">
                                <div class="input-group mt-3 mb-3">
                                    <input type="search" name="search2" class="form-control rounded " placeholder="Search Data By Minimal Gaji" aria-label="Search" aria-describedby="search-addon" />
                                </div>
                            </form>
                        </th>
                        <th>
                            <form action="/tablepayroll" method="get">
                                <div class="input-group mt-3 mb-3">
                                    <input type="search" name="search3" class="form-control rounded " placeholder="Search Data By Maksimal Gaji" aria-label="Search" aria-describedby="search-addon" />
                                </div>
                            </form>
                        </th>
                    </tr> -->
                    <tr>
                        <th scope="col">Nama Karyawan</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Gaji Pokok</th>
                        <th scope="col">Gaji Harian</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $payroll)
                    <tr>
                        <td>{{$payroll->nama}}</td>
                        <th>{{$payroll->nik}}</th>
                        <td>{{$payroll->jabatan}}</td>
                        <td>{{$payroll->gajipokok}}</td>
                        <td>{{$payroll->gajiharian}}</td>
                        <td> <a href="/tablepayroll/{{$payroll->nik}}/edit"><button type="submit" class="btn btn-warning">Update</button></a>
                            <form action="/tablepayroll/{{$payroll->nik}}" method="POST">
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