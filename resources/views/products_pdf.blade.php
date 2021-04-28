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
        <h2 style="text-align: center; margin: 40px 0">Data Stock Bulan {{date("F Y")}}</h2>
        <div class="data">
            <table id="myTable" class="table table-bordered">
                <thead>
                <tr>
                    <td>No</td>
                    <td>Nama Item</td>
                    <td>Satuan Barang</td>
                    <td>Harga</td>
                    <td>Jumlah Stock</td>

                </tr>
                </thead>

                <tbody>
                {{$no = 1}}
                @foreach($data as $row)

                    <tr>
                        <td>{{$no}}</td>
                        <td>{{$row->nama_barang}}</td>
                        <td>{{$row->satuan}}</td>
                        <td>Rp.{{$row->harga}}</td>
                        <td>{{$row->stock}}</td>

                    </tr>
                    {{$no++}}
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
