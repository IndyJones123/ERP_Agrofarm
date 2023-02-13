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
                <h5 class="card-title">Form Permohonan Terlambat {{$namakaryawan}}</h5>

                <!-- Vertical Form -->
                <form class="row g-3" action="/tableTerlambat/{{$id}}" method="post" enctype="multipart/form-data">
                    @method('put')
                    {{ csrf_field() }}
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Nama Karyawan</label>
                        <input type="text" name="namakaryawan" value="{{$namakaryawan}}" class="form-control" id="inputNanme4" readonly>
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Jabatan</label>
                        <input type="text" name="jabatan" value="{{$jabatan}}" class="form-control" id="inputEmail4" readonly>
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Atasan</label>
                        <input type="text" name="atasan" value="{{ Auth::user()->name }}" class="form-control" id="inputEmail4" readonly>
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Keterangan</label>
                        <input type="text" name="keterangan" value="{{$keterangan}}" class="form-control" id="inputEmail4" readonly>
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Waktu Diminta</label>
                        <input type="text" name="created_at" value="{{$created_at}}" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">PDF - Dikirim Oleh Anda (Atasan) Yang Didapat Dengan Menclick <a href="/pdfterlambat/{{$id}}">Disini</a></label>
                        <input type="file" name="foto" class="form-control" id="inputEmail4">
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