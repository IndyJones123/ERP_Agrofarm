<!DOCTYPE html>

<head>
    <title>Surat Permohonan Terlambat</title>
    <meta charset="utf-8">
    <style>
        #judul {
            text-align: center;
        }

        #halaman {
            width: auto;
            height: auto;
            position: absolute;
            border: 1px solid;
            padding-top: 30px;
            padding-left: 30px;
            padding-right: 30px;
            padding-bottom: 80px;
        }
    </style>

</head>

<body>
    <div id=halaman>
        <h3 id=judul>Surat Permohonan Terlambat</h3>
        <h5>Nomer Surat : {{$randomid}}</h5>
        <p>Saya yang Tertulis di bawah ini :</p>

        <table>
            <tr>
                <td style="width: 30%;">Nama</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{$namakaryawan}}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Jabatan Saat Ini</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{$jabatan}}</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align: top;">Keterangan</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%;">{{$keterangan}}</td>
            </tr>
            <tr>
                <td style="width: 30%;">Atasan Yang Mengijinkan</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">{{$atasan}}</td>
            </tr>
        </table>

        <p>Menyatakan dengan sebenar-benarnya akan bersungguh-sungguh dalam menaati aturan bekerja.</p>

        <div style="width: 50%; text-align: left; float: right;">Ponorogo , {{$tanggal}}</div><br>
        <div style="width: 50%; text-align: left; float: right;">Yang bertanda tangan,</div><br><br><br><br><br>
        <div style="width: 50%; text-align: left; float: right;">{{$namakaryawan}}</div>

    </div>
</body>

</html>