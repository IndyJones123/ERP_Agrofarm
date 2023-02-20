@extends('layouts.admin.app')

<!-- ======= Header ======= -->


@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.css" />
<script src="https://unpkg.com/leaflet-geosearch@3.1.0/dist/geosearch.umd.js"></script>
<style>
    #leafletMap-registration {
        height: 400px;
        /* The height is 400 pixels */
    }
</style>



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
                <div id="leafletMap-registration">
                    <script>
                        // you want to get it of the window global
                        const providerOSM = new GeoSearch.OpenStreetMapProvider();

                        //leaflet map
                        var leafletMap = L.map('leafletMap-registration', {
                            fullscreenControl: true,
                            // OR
                            fullscreenControl: {
                                pseudoFullscreen: false // if true, fullscreen to page width and height
                            },
                            minZoom: 2
                        }).setView([-7.86375574669215, 111.47185045051454], 14);

                        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
                        }).addTo(leafletMap);

                        let theMarker = {};

                        leafletMap.on('click', function(e) {
                            let latitude = e.latlng.lat.toString().substring(0, 15);
                            let longtitude = e.latlng.lng.toString().substring(0, 15);
                            document.getElementById("latitude").value = latitude;
                            document.getElementById("longtitude").value = longtitude;
                            let popup = L.popup()
                                .setLatLng([latitude, longtitude])
                                .setContent("Kordinat : " + latitude + " - " + longtitude)
                                .openOn(leafletMap);

                            if (theMarker != undefined) {
                                leafletMap.removeLayer(theMarker);
                            };
                            theMarker = L.marker([latitude, longtitude]).addTo(leafletMap);
                        });

                        const search = new GeoSearch.GeoSearchControl({
                            provider: providerOSM,
                            style: 'bar',
                            searchLabel: 'Tentukan Lokasi Dinas',
                        });

                        leafletMap.addControl(search);
                    </script>
                </div>
                <!-- Vertical Form -->
                <form class="row g-3" action="/tableAbsensi/create/store" method="post">
                    {{ csrf_field() }}

                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Tittle Absensi</label>
                        <input type="text" name="tittle" class="form-control" id="inputNanme4">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Tempat Dinas</label>
                        <input type="text" name="tempat" class="form-control">
                    </div>
                    <div class="col-12">

                        <input type="checkbox" name="hari[]" value="1">
                        <label for="inputEmail4" class="form-label">Senin</label>

                        <input type="checkbox" name="hari[]" value="2">
                        <label for="inputEmail4" class="form-label">Selasa</label>

                        <input type="checkbox" name="hari[]" value="3">
                        <label for="inputEmail4" class="form-label">Rabu</label>

                        <input type="checkbox" name="hari[]" value="4">
                        <label for="inputEmail4" class="form-label">Kamis</label>

                        <input type="checkbox" name="hari[]" value="5">
                        <label for="inputEmail4" class="form-label">Jumat</label>

                        <input type="checkbox" name="hari[]" value="6">
                        <label for="inputEmail4" class="form-label">Sabtu</label>

                        <input type="checkbox" name="hari[]" value="7">
                        <label for="inputEmail4" class="form-label">Minggu</label>

                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Longtitude (Input By Click Location On Map)</label>
                        <input type="text" name="longtitude" id="longtitude" class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Latitude (Input By Click Location On Map)</label>
                        <input type="text" name="latitude" id="latitude" class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Batas Jarak Absensi (Meter)</label>
                        <input type="text" name="jarak" class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Absen Masuk</label>
                        <input type="time" name="start_time" class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Batas Keterlambatan Absen Masuk</label>
                        <input type="time" name="batas_start_time" class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Absen Pulang</label>
                        <input type="time" name="end_time" class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Batas Keterlambatan Absen Pulang</label>
                        <input type="time" name="batas_end_time" class="form-control">
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