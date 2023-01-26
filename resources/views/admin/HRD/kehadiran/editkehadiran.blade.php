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
                <h5 class="card-title">Form Edit Kehadiran</h5>

                <!-- Vertical Form -->
                <form class="row g-3" action="/tableKehadiran/{{$id}}" method="post">
                    @method('put')
                    {{ csrf_field() }}
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Nama Pegawai</label>
                        <input type="text" name="namapegawai" value="{{$namapegawai}}" class="form-control" id="inputNanme4" readonly>
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Bulan Kehadiran</label>
                        <input type="date" name="bulan" value="{{$bulan}}" class="form-control" id="inputEmail4" readonly>
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">NIK Pegawai</label>
                        <input type="number" name="nik" value="{{$nik}}" class="form-control" id="inputEmail4" readonly>
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Jabatan</label>
                        <input type="text" name="jabatan" value="{{$jabatan}}" class="form-control" id="inputEmail4" readonly>
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Sakit</label>
                        <input type="number" name="sakit" value="{{$sakit}}" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Izin</label>
                        <input type="number" name="izin" value="{{$izin}}" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Alpha</label>
                        <input type="number" name="alpha" value="{{$alpha}}" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Cuti</label>
                        <input type="number" name="cuti" value="{{$cuti}}" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Dinas Keluar</label>
                        <input type="number" name="dinasluar" value="{{$dinasluar}}" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Terlambat</label>
                        <input type="number" name="terlambat" value="{{$terlambat}}" class="form-control" id="inputEmail4">
                    </div>

                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Hadir</label>
                        <input type="number" name="hadir" value="{{$hadir}}" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Wajib Hadir</label>
                        <input type="number" name="wajibhadir" value="{{$wajibhadir}}" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Sisa Cuti</label>
                        <input type="number" name="sisacuti" value="{{$sisacuti}}" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Keterangan</label>
                        <input type="text" name="keterangan" value="{{$keterangan}}" class="form-control" id="inputEmail4">
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