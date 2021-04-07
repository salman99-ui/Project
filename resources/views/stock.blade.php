<html>
<head>
    <link rel="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <style>
        h2{
            text-align: center;
        }
        .wrapper{
            display: flex;
            justify-content: center;
        }

        .wrapper .inputform{
            width: 500px;
            height: auto;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Input Data Barang</h2>
    <div class="wrapper">

        <div class="inputform">
            <form>
                <div class="form-group">
                    <label for="barang">Nama Barang </label>
                    <input type="text" placeholder="cth. Suntikan " class="form-control" id="barang">
                </div>

                <div class="form-group">
                    <label for="harga">Harga </label>
                    <input type="text" placeholder="cth. 18000 " class="form-control" id="harga">
                </div>

                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="text" placeholder="cth. 82" class="form-control" id="stock">
                </div>

                <div class="form-group">
                    <label for="satuan">Satuan </label>
                    <input type="text" class="form-control" id="satuan">
                </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>
