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
    <h2>Tambah Transaksi</h2>
    <div class="wrapper">

        <div class="inputform">
            <form action="/transaction/process" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="barang">Nama Barang </label>
                    <input type="text" placeholder="cth. Suntikan " name="barang" class="form-control" id="barang">
                </div>

                <div class="form-group">
                    <label for="stock">Stock Keluar </label>
                    <input type="text" placeholder="cth. 18000 " class="form-control" name="stock" id="stock">
                </div>

                <div class="form-group">
                    <label for="tujuan">Tujuan</label>
                    <input type="text" placeholder="cth. Rs.Medika" class="form-control" name="tujuan" id="tujuan">
                </div>

                <div class="form-group">
                    <label for="validation">Validasi</label>
                    <input type="text" class="form-control" id="validation" name="validasi" placeholder="cth. Pcs">
                </div>

                <div class="confirm">
                    <button class="btn cancel" onclick="cancel()">Batal</button>
                    <button class="btn btn-md btn-success" onclick="adddata()">OK</button>
                </div>
            </form>
        </div>
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
            title : "Confirm" ,
            text : "Ingin Membatalkan dan Kembali ?" ,
            icon : "warning" ,
            buttons : true,

        })

    }
</script>

</html>
