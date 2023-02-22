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
                <h5 class="card-title">Form Edit Jabatan</h5>

                <!-- Vertical Form -->
                <form class="row g-3" action="/tablekaryawan/{{$id}}" method="post">
                    @method('put')
                    {{ csrf_field() }}
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Nama Karyawan</label>
                        <input type="text" name="nama" value="{{$nama}}" class="form-control" id="inputNanme4">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">NIK</label>
                        <input type="text" name="nik" value="{{$nik}}" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">No Telepon</label>
                        <input type="text" name="notelepon" value="{{$notelepon}}" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="text" name="email" value="{{$email}}" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Jabatan</label>
                        <input type="text" name="jabatan" value="{{$jabatan}}" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Alamat</label>
                        <input type="text" name="alamat" value="{{$alamat}}" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Foto</label>
                        <input type="text" name="photo" value="{{$photo}}" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Role</label>
                        <input type="text" name="role" value="{{$role}}" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">IsSatpam? 1 Jika Iya 0 Jika Bukan</label>
                        <input type="text" name="issatpam" value="{{$issatpam}}" class="form-control" id="inputEmail4">
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