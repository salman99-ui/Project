<html>
<head>
    <link rel="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <h2>Update Transaksi</h2>
    <div class="wrapper">

        <div class="inputform">
            <form action="/updatetransactions/process" method="post">
                {{csrf_field()}}
                <div class="form-group">

                    <input type="hidden" name="id" value="{{$data->id}}" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="barang">Nama Barang </label>
                    <input readonly type="text" value="{{$data->nama_barang}}" class="form-control" id="barang">
                </div>

                <div class="form-group">
                    <label for="stock">Stock Keluar </label>
                    <input readonly type="text" value="{{$data->stock_keluar}}" class="form-control" id="stock">
                </div>

                <div class="form-group">
                    <label for="tujuan">Tujuan</label>
                    <input type="text" name="tujuan" value="{{$data->tujuan}}" class="form-control" id="tujuan">
                </div>

                <div class="form-group">
                    <label for="validation">Validation</label>
                    <input type="text" name="validation" class="form-control" id="validation" value="{{$data->validation}}">
                </div>

                <div class="confirm">
                    <button class="btn cancel">Batal</button>
                    <button type="submit" class="btn btn-md btn-success">OK</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>
