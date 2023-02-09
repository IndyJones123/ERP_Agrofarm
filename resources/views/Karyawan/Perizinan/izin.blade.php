@extends('layouts.User.app')

<!-- ======= Header ======= -->


@section('content')


<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->
@if($data3=='[{"status":"Pending-izin"}]' )
<h5 class="card-title">Form Izin Anda Menunggu Konfirmasi</h5>
@else
<section class="section dashboard">

    <!-- Left side columns -->
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Form Absensi Izin</h5>

                <!-- Vertical Form -->
                <form class="row g-3" action="/tableLogKehadiranSakit/create/store" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Nama Karyawan</label>
                        <input type="text" value="{{ Auth::user()->name }}" name="namakaryawan" class="form-control" id="inputNanme4" readonly>
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Jabatan Karyawan</label>
                        <input type="text" value="{{ Auth::user()->jabatan }}" name="jabatan" class="form-control" id="inputEmail4" readonly>
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" value="{{$tanggal}}" class="form-control" id="inputEmail4" readonly>
                    </div>
                    <div class="col-12">

                        <input type="time" name="absenmasuk" value="00:00:00" class="form-control" id="inputEmail4" hidden>
                    </div>
                    <div class="col-12">

                        <input type="time" name="absenkeluar" value="00:00:00" class="form-control" id="inputEmail4" hidden>
                    </div>
                    <div class="col-12">

                        <input type="text" name="status" value="Pending-izin" class="form-control" id="inputEmail4" hidden>
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label"> Upload Surat Izin</label>
                        <h1>Surat Izin Dapat Didapatkan Di Menu Pengajuan Surat</h1>
                        <input type="file" name="keterangan" class="form-control" id="inputEmail4" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form><!-- Vertical Form -->

            </div>
        </div>
    </div>
</section>
@endif
@endsection


</body>

</html>