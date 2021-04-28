<html>
<head>
    <link rel="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <style>

    </style>
</head>
<body>
<div class="row">

        <div class="container">
            <h2 style="text-align: center; margin: 40px 0">Data Transaksi Bulan {{date("F Y")}}</h2>
            <div class="data">
                <table id="myTable" class="table table-bordered">
                    <thead>
                    <tr>
                        <td>Tanggal</td>
                        <td>Nama Item</td>
                        <td>Stock Keluar </td>
                        <td>Tujuan</td>
                        <td>Status</td>

                    </tr>
                    </thead>

                    <tbody>

                    @foreach($data as $row)
                        <tr>
                            <td>{{$row->tanggal}}</td>
                            <td>{{$row->nama_barang}}</td>
                            <td>{{$row->stock_keluar}}</td>
                            <td>{{$row->tujuan}}</td>
                            <td>{{$row->validation}}</td>

                        </tr>
                    @endforeach



                    </tbody>
                </table>
            </div>
        </div>

</div>
<script>


</script>
</body>

</html>
