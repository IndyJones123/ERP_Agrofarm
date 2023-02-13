@extends('layouts.User.app')

<!-- ======= Header ======= -->


@section('content')


<div class="row">
    <div class="col-lg-8 mt-3">
        <table class="table table-striped">
            <thead>
                <tr>

                    <th>
                        <form action="/checksurat" method="get">
                            <div class="input-group mt-3 mb-3">
                                <input type="search" name="search1" class="form-control rounded " placeholder="Search Nomer Surat Pengajuan" aria-label="Search" aria-describedby="search-addon" />
                        </form>
                    </th>
                </tr>
                <tr>
                    <th scope="col" style="text-align: center; vertical-align: middle">Nomer Surat</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $Absensi)
                <tr>
                    <td scope="col" style="text-align: center; vertical-align: middle">{{$Absensi->nomerketerlambatan}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection


</body>

</html>