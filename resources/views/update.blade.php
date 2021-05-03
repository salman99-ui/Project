<html>
<head>
    <link rel="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        h2{
            text-align: center;
            margin-top: 40px;
        }

        .wrapper{
            display: flex;
            justify-content: center;
            margin: 10% 0%;


        }

        .wrapper .inputform{
            width: 500px;
            height: auto;
        }
        .inputform .form-group input{
            background-color: #E8E3E3;
        }
        .inputform .confirm{

            margin: 30px 0;
            display: flex;
            justify-content: space-between;
            padding: 10px;
        }
        .inputform .confirm button{
            width: 130px;
            border-radius: 15px;
        }
        .inputform .confirm button:nth-child(1){
            background-color: #F1E7E7;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Ubah Barang</h2>
    <div class="wrapper">
        <form action="/updatestock/process" method="post">
            {{csrf_field()}}
            <div class="inputform">

                    <div class="form-group">
                        <label for="barang">Nama Barang </label>
                        <input type="text" name="barang" value="{{$data->nama_barang}}" class="form-control" id="barang">
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga </label>
                        <input type="text" name="harga" value="{{$data->harga}}" class="form-control" id="harga">
                    </div>

                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="text" name="stock" value="{{$data->stock}}" class="form-control" id="stock">
                    </div>

                    <div class="form-group">
                        <label for="satuan">Satuan </label>
                        <input readonly type="text" class="form-control" id="satuan" value="{{$data->satuan}}">
                    </div>

                    <div class="confirm">
                        <button class="btn cancel" onclick="cancel()">Batal</button>
                        <button type="submit" class="btn btn-md btn-success" onclick="adddata()">OK</button>
                    </div>

            </div>
        </form>
    </div>
</div>
</body>
<script>
    function adddata(){
        swal({
            title: "Success !",
            text: "Data Berhasil di Tambah",
            icon: "success",
            button: "Ok",
        });

    }

    function cancel(){
        swal({
            title : "" ,
            text : "Ingin Membatalkan dan Kembali" ,
            icon : "info" ,
            buttons : true,

        })

    }
</script>

</html>
