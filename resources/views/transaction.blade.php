<html>
<head>
    <link rel="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
            <a href="/main">
                <img src="/images/stock.png" width="50" height="50">
                <span>Tabel Stock</span>
            </a>
        </div>

        <div class="transaction d-flex justify-content-center">
            <a href="/stock">
                <img src="/images/report.png" width="50" height="50">
                <span>Transaksi</span>
            </a>
        </div>
        <a href="/login" style="position: absolute ; margin : 0px 20px; display: block; bottom: 0;" onclick="out()"><img src="/images/out.png" >out</a>
    </div>
    <div class="col-sm-9 p-4">
        <div class="container">
            <h2 class="mb-3">Table Stock</h2>
            <div class="mb-4">
                <a href="/gettransaksi" class="btn btn-outline-secondary mr-2"><i class="fa fa-files-o"></i> Print</a>
                <a href="/addtransaction" class="btn btn-outline-success"><i class="fa fa-plus"></i> Add Transaksi</a>
            </div>

            <div class="data">
                <table id="myTable" class="table table-striped table-hovered">
                    <thead>
                    <tr>
                        <td>Tanggal</td>
                        <td>Nama Item</td>
                        <td>Stock Keluar </td>
                        <td>Tujuan</td>
                        <td>Status</td>
                        <td>Aksi</td>
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
                            <td>
                                <a href="/deletetransactions/{{$row->id}}" class="btn btn-outline-danger mr-2">

                                    <i class="fa fa-trash"></i>
                                </a>

                                <a
                                   class="btn btn-outline-success "
                                   data-target="#myModal2" id="update" data-toggle="modal"
                                   data-id="{{$row->id}}"
                                   data-barang="{{$row->nama_barang}}"
                                   data-tujuan="{{$row->tujuan}}"
                                   data-validasi="{{$row->validation}}"
                                   data-stock="{{$row->stock_keluar}}"
                                ><i class="fa fa-pencil"></i></a>

                            </td>
                        </tr>
                    @endforeach



                    </tbody>
                </table>

                <div class="modal fade" id="myModal2">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form action="/updatetransactions/process" method="post">
                                {{csrf_field()}}


                                <div class="modal-header">
                                    <h3 class="text-success">Ubah Data</h3>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <div class="modal-body">
                                    <input type="hidden" id="id" name="id" value="" class="form-control" >
                                <div class="form-group">
                                    <label for="barang">Nama Barang </label>
                                    <input readonly type="text" class="form-control" id="barang">
                                </div>

                                <div class="form-group">
                                    <label for="stock">Stock Keluar </label>
                                    <input readonly type="text" class="form-control" id="stock">
                                </div>

                                <div class="form-group">
                                    <label for="tujuan">Tujuan</label>
                                    <input type="text" name="tujuan" class="form-control" id="tujuan">
                                </div>

                                <div class="form-group">
                                    <label for="validation">Validasi</label>
                                    <select class="form-control" name="validation" id="validasi">
                                        <option value="Belum Selesai">Belum Selesai</option>
                                        <option value="Selesai">Selesai</option>
                                    </select>
                                </div>


                                </div>
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-success">Update</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );

    $(document).on('click' , '#update' , function(){
        let barang = $(this).data('barang')
        let stock = $(this).data('stock')
        let tujuan = $(this).data('tujuan')
        let validasi = $(this).data('validasi')
        let id = $(this).data('id')

        $('.modal-body #id').val(id)
        $('.modal-body #barang').val(barang)
        $('.modal-body #tujuan').val(tujuan)
        $('.modal-body #validasi').val(validasi)
        $('.modal-body #stock').val(stock)

    })

    function cancel(){
        swal({
            title : "Attention" ,
            text : "Apakah Ingin Menghapus Data ?" ,
            icon : "warning" ,
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
