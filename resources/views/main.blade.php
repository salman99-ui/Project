<html>
<head>
    <link rel="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <style>
        .row{
            height: 100%;
        }
        .col1{
            background-color: #D4E7F6;
        }
        h3{
            color: green;
        }
        .stock a{
            color: black;
        }
        .transaction a{
            color:black;
           
        }

        .stock a:hover{
            text-decoration: none;
        }
        .transaction a:hover{
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="row">
    <div class="col-sm-3 col1 d-flex flex-column p-4 ">

       <div class="stock mb-5 d-flex justify-content-center">
        <a href="">
            <img src="/images/stock.png" width="50" height="50">
            <span>Tabel Stock</span>
        </a>
       </div>

        <div class="transaction d-flex justify-content-center">
            <a href="">
                <img src="/images/report.png" width="50" height="50">
                <span>Transaksi</span>
            </a>
        </div>
    </div>
    <div class="col-sm-9 p-4">
        <div class="container">
        <div class="mb-4">
            <a href="" class="btn btn-outline-danger mr-2">Print Laporan</a>
            <a href="/stock" class="btn btn-outline-success">Add Stock</a>
        </div>

        <div class="data">
            <table id="myTable" class="table table-striped table-hovered">
                <thead>
                    <tr>
                        <td>Nama Item</td>
                        <td>Satuan Barang</td>
                        <td>Harga</td>
                        <td>Jumlah Stock</td>
                        <td>Aksi</td>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Jarum</td>
                        <td>Pcs</td>
                        <td><i class="fa fa-trash-o" style="font-size:24px;color:red"></i></td>
                        <td>90</td>
                        <td>
                            <a href="" class="btn btn-outline-success">Delete

                            </a>
                            <a href="" class="btn btn-outline-danger mr-2">Update</a>

                        </td>
                    </tr>

                    <tr>
                        <td>Perban</td>
                        <td>Pcs</td>
                        <td>1200</td>
                        <td>60</td>
                        <td>
                            <a href="" class="btn btn-outline-success">Delete</a>
                            <a href="" class="btn btn-outline-danger mr-2">Update</a>
                        </td>
                    </tr>

                    <tr>
                        <td>Infus</td>
                        <td>Btl</td>
                        <td>15000</td>
                        <td>40</td>
                        <td>
                            <a  class="btn btn-outline-success" onclick="cancel()">Delete</a>
                            <a href="" class="btn btn-outline-danger mr-2">Update</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );

    function cancel(){
        swal({
            title : "Attention" ,
            text : "Apakah Ingin Menghapus Data ?" ,
            icon : "error" ,
            buttons : true,

        }).then((value) => {
            if(value){
                swal({
                    title : "Success" ,
                    text : "Data Berhasil di Hapus" ,
                    icon : "success" ,
                    button : "Ok",

                })
            }
        })

    }
</script>
</body>

</html>
