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
                <h5 class="card-title">Form Edit Payroll</h5>

                <!-- Vertical Form -->
                <form class="row g-3" action="/tablepayroll/{{$id}}" method="post">
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
                        <label for="inputEmail4" class="form-label">Jabatan</label>
                        <select name="jabatan" class="form-control">
                            @foreach($data2 as $jabatan)
                            <option value="{{$jabatan->namajabatan}}">{{$jabatan->namajabatan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Gaji Pokok</label>
                        <input type="text" name="gajipokok" value="{{$gajipokok}}" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Gaji Harian</label>
                        <input type="text" name="gajiharian" value="{{$gajiharian}}" class="form-control" id="inputEmail4">
                    </div>

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