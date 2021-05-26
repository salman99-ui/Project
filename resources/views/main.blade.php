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

       <div class="bg-light p-3 stock mb-5 d-flex justify-content-center">
        <a class="" href="/main">
            <img src="/images/stock.png" width="50" height="50">
            <span class="text-dark">Tabel Stock</span>
        </a>
       </div>

        <div class="transaction d-flex justify-content-center">
            <a href="/transaction">
                <img src="/images/report.png" width="50" height="50">
                <span>Tabel Transaksi</span>
            </a>
        </div>
        <a href="/logout" style="position: absolute ; margin : 0px 20px; display: block; bottom: 0;" onclick="out()"><img src="/images/out.png" > Keluar</a>
    </div>
    <div class="col-sm-9 p-4">
        <div class="container">
            <h2 class="mb-3">Tabel Stock</h2>

        <div class="mb-4">
            <a href="/getproducts" class="btn btn-outline-secondary mr-2"><i class="fa fa-files-o"></i> Print </a>
            <a data-target="#Modaladd" id="add" data-toggle="modal" class="btn btn-outline-success"><i class="fa fa-plus"></i> Add Stock</a>
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
               @foreach($data as $row)
                   <tr>
                       <td>{{$row->nama_barang}}</td>
                       <td>{{$row->satuan}}</td>
                       <td>Rp. {{$row->harga}}</td>
                       <td>{{$row->stock}}</td>
                       <td>
                           <a  id="delete"
                              class="btn btn-outline-danger mr-2"
                              data-toggle="modal"
                              data-target="#Modaldelete"
                              data-url="/deletestock/{{$row->nama_barang}}"
                           >
                               <i class="fa fa-trash"></i>
                           </a>

                           <a data-target="#myModal2" id="update" data-toggle="modal"
                              data-barang="{{$row->nama_barang}}"
                              data-satuan="{{$row->satuan}}"
                              data-harga="{{$row->harga}}"
                              data-stock="{{$row->stock}}"
                              class="btn btn-outline-success mr-2">
                               <i class="fa fa-pencil"></i>
                           </a>

                           <a data-toggle="modal" id="tambah"
                              data-barang="{{$row->nama_barang}}"
                              data-satuan="{{$row->satuan}}"
                              data-harga="{{$row->harga}}"
                              data-stock="{{$row->stock}}"
                              data-target="#myModal" class="btn btn-outline-primary ">
                               <i class="fa fa-plus"></i>
                           </a>
                       </td>
                   </tr>
               @endforeach

                </tbody>
            </table>



            <!-- The Modal -->
            <div class="modal fade" id="myModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="/transaction/process" method="post">
                            {{csrf_field()}}
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h3 class="text-primary">Tambah Transaksi</h3>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">

                               <div class="form-group">
                                   <label>Nama Barang</label>
                                   <input id="nama_barang" readonly type="" value="" class="form-control" name="barang"  />
                               </div>

                               <div class="form-group">
                                   <label>Stock keluar</label>
                                   <input id="stock_keluar" type="number" placeholder="0" class="form-control {{$errors->has('stockeluar') ? 'is-invalid' : ''}}" name="stock"  />
                               </div>

                               <div class="form-group">
                                   <label>Tujuan Transaksi</label>
                                   <input id="tujuan" type="" placeholder="Rs.Mitra" value="" class="form-control {{$errors->has('tujuan') ? 'is-invalid' : ''}}" name="tujuan"  />
                               </div>

                               <div class="form-group">
                                   <label>Validasi</label>
                                   <select class="form-control" name="validasi">
                                        <option value="Belum Selesai">Belum Selesai</option>
                                        <option value="Selesai">Selesai</option>
                                   </select>


                               </div>



                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" onclick="" class="btn btn-primary">Tambah</button>
                        </div>
                        </form>
                    </div>
                </div>
        </div>

            <div class="modal fade" id="myModal2">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="/updatestock/process" method="post">
                        {{csrf_field()}}
                        <!-- Modal Header -->
                            <div class="modal-header">
                                <h3 class="text-success">Ubah Data</h3>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">

                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input id="nama" readonly type="" value="" class="form-control" name="barang"  />
                                </div>

                                <div class="form-group">
                                    <label>Satuan Barang</label>
                                    <select class="form-control" name="satuan1">
                                        <option value="PCS">PCS</option>
                                        <option value="BTL">BTL</option>
                                        <option value="LTR">LTR</option>
                                        <option value="BOX">BOX</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Harga</label>
                                    <input id="harga" type="" value="" class="form-control {{$errors->has('harga2') ? 'is-invalid' : ''}}" name="harga1"  />
                                </div>

                                <div class="form-group">
                                    <label>Jumlah Stock</label>
                                    <input id="stock" type="" value="" class="form-control" name="stock1" {{$errors->has('stock2') ? 'is-invalid' : ''}} />


                                </div>



                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                <button type="submit" onclick="success()" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="Modaladd">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="/stock/process" method="post">
                        {{csrf_field()}}
                        <!-- Modal Header -->
                            <div class="modal-header">
                                <h3 class="text-success">Tambah Data</h3>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">

                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="" value="{{old('barang')}}" class="form-control {{$errors->has('barang') ? 'border-danger' : ''}}" name="barang" placeholder="Nama Barang" />
                                </div>

                                <div class="form-group">
                                    <label>Satuan Barang</label>
                                    <select class="form-control {{$errors->has('satuan') ? 'border-danger' : ''}}" name="satuan" >
                                        <option value="PCS">PCS</option>
                                        <option value="BTL">BTL</option>
                                        <option value="LTR">LTR</option>
                                        <option value="BOX">BOX</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="" value="{{old('harga')}}" class="form-control {{$errors->has('harga') ? 'border-danger' : ''}}" name="harga" placeholder="60.000" />
                                </div>

                                <div class="form-group">
                                    <label>Jumlah Stock</label>
                                    <input  type="" value="{{old('stock')}}" class="form-control {{$errors->has('stock') ? 'border-danger' : ''}}" name="stock" placeholder="Stock Barang"  />


                                </div>



                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="Modaldelete">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form id="form" action="" method="get">

                        <!-- Modal Header -->
                            <div class="modal-header">
                                <h3 class="text-success">Konfirmasi</h3>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <h5 class="">Apakah Ingin Menghapus Barang ?</h5>

                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success">Delete</button>
                            </div>
                        </form>
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

    $(document).on('click' , '#tambah' , function(){
        let nama = $(this).data('barang')
        let harga = $(this).data('harga')



        $('.modal-body #nama_barang').val(nama)
        $('.modal-body #harga_barang').val(harga)
        $('.modal-body #stock_keluar').val(0)

    })

    $(document).on('click' , '#update' , function(){
        let nama = $(this).data('barang')
        let harga = $(this).data('harga')
        let satuan = $(this).data('satuan')
        let stock = $(this).data('stock')

        $('.modal-body #nama').val(nama)
        $('.modal-body #harga').val(harga)
        $('.modal-body #satuan').val(satuan)
        $('.modal-body #stock').val(stock)

    })


    $(document).on('click' , '#delete' , function(){
        let url = $(this).data('url')
        $('.modal-content #form').attr('action', url);

    })

    function success(){
        swal({
            title : "Success" ,
            text : "Data Berhasil Di Update" ,
            icon : "success" ,


        })

    }

    function transsuccess(){
        swal({
            title : "Success" ,
            text : "Data Transaksi Berhasil Di Simpan" ,
            icon : "success" ,


        })

    }

    function successadd(){
        swal({
            title : "Success" ,
            text : "Data Berhasil Di Tambahkan" ,
            icon : "success" ,


        })

    }





</script>
</body>

</html>
