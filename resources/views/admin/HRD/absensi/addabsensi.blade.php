@extends('layouts.admin.app')

<!-- ======= Header ======= -->


@section('content')

<div class="pagetitle">
    <h1>Data Absensi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Absensi</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section dashboard">

    <!-- Left side columns -->
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Form Tambah Absensi</h5>

                <!-- Vertical Form -->
                <form class="row g-3" action="/tableAbsensi/create/store" method="post">
                    {{ csrf_field() }}
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Tittle Absensi</label>
                        <input type="text" name="tittle" class="form-control" id="inputNanme4">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Deskripsi Absensi</label>
                        <input type="text" name="deskripsi" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Absen Masuk</label>
                        <input type="time" name="start_time" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Batas Keterlambatan Absen Masuk</label>
                        <input type="time" name="batas_start_time" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Absen Pulang</label>
                        <input type="time" name="end_time" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Batas Keterlambatan Absen Pulang</label>
                        <input type="time" name="batas_end_time" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-12">
                        @foreach($data2 as $jabatan)

                        <input type="checkbox" name="jabatan[]" value="{{$jabatan->namajabatan}}">
                        <label for="inputEmail4" class="form-label">{{$jabatan->namajabatan}}</label>
                        @endforeach

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