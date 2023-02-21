@extends('layouts.admin.app')

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

<section class="section dashboard">

    <!-- Left side columns -->
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Form Edit Log Kehadiran</h5>

                <!-- Vertical Form -->
                <form class="row g-3" action="/tableLogKehadiran/{{$id}}" method="post">
                    @method('put')
                    {{ csrf_field() }}
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Nama Karyawan</label>
                        <input type="text" name="namakaryawan" value="{{$namakaryawan}}" class="form-control" id="inputNanme4" readonly>
                    </div>
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Bulan (Isi Dengan Angka) (Contoh : 2 Jika Februari)</label>
                        <input type="text" name="bulan" value="{{$bulan}}" class="form-control" id="inputNanme4" readonly>
                    </div>
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Tahun (Contoh 2023)</label>
                        <input type="text" name="tahun" value="{{$tahun}}" class="form-control" id="inputNanme4" readonly>
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Jabatan</label>
                        <input type="text" name="jabatan" value="{{$jabatan}}" class="form-control" id="inputEmail4" readonly>
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" value="{{$tanggal}}" class="form-control" id="inputEmail4" readonly>
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Absen Masuk</label>
                        <input type="time" name="absenmasuk" value="{{$absenmasuk}}" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Absen Keluar</label>
                        <input type="time" name="absenkeluar" value="{{$absenkeluar}}" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Status</label>
                        <input type="text" name="status" value="{{$status}}" class="form-control" id="inputEmail4">
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
@endsection


</body>

</html>