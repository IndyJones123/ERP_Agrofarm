@extends('layouts.User.app')

<!-- ======= Header ======= -->


@section('content')

<div class="pagetitle">
    <h1>Profile</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/profile">Home</a></li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section dashboard">

    <!-- Left side columns -->
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Profile Anda</h5>

                <!-- Vertical Form -->
                <form class="row g-3" action="/tablejabatan/{{ Auth::user()->id }}" method="post">
                    @method('put')
                    {{ csrf_field() }}
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Nama</label>
                        <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" id="inputEmail4" readonly>
                    </div>
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Nama Jabatan</label>
                        <input type="text" name="jabatan" value="{{ Auth::user()->jabatan }}" class="form-control" id="inputNanme4" readonly>
                    </div>
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">NIK</label>
                        <input type="number" name="nik" value="{{ Auth::user()->nik }}" class="form-control" id="inputNanme4">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Alamat</label>
                        <input type="text" name="alamat" value="{{ Auth::user()->alamat }}" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">No Telepon</label>
                        <input type="number" name="alamat" value="{{ Auth::user()->notelepon }}" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="text" name="alamat" value="{{ Auth::user()->email }}" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Password</label>
                        <input type="password" name="password" value="{{ Auth::user()->password }}" class="form-control" id="myInput" readonly>
                        <input type="checkbox" onclick="myFunction()">Show Password
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

<script>
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

</html>