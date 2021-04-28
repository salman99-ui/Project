<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF ;

class mycontroller extends Controller
{
    //

    public function index(){
        $data = DB::table('products')->get();
        return view('main' , ['data' => $data]);
    }

    public function stock(){
        return view('stock');
    }

    public function updatestock($nama){
       $data = DB::table('products')->where('nama_barang' , '=' , $nama)->first();

        return view('update', ['data' => $data]);
    }

    public function updatestockprocess(Request $request){
             DB::table('products')
            ->where('nama_barang' , '=' , $request->barang)
            ->update(['stock' => $request->stock , 'harga' => $request->harga]);

             return redirect('/main');
    }

    public function deletestock($nama){
        DB::table('transactions')
            ->where('nama_barang' , '=' , $nama)
            ->delete();

        DB::table('products')
            ->where('nama_barang' , '=' , $nama)
            ->delete();

        return redirect('/main');
    }

    public function login(){
        return view('login');
    }

    public function update(){
        return view('update');
    }

    public function addtransaction(){
        return view('addtransaction');
    }

    public function updatetransaction($id){

        $data = DB::table('transactions')->where('id' , '=' , $id)->first();

        return view('updatetransaction', ['data' => $data]);
    }

    public function transaction(){
        $data = DB::table('transactions')->get() ;


        return view('transaction' , ['data' => $data]);
    }

    public function authlogin(Request $request){
        $data = DB::table('users')->where([
            ['name' , '=' , $request->input('username')] ,
            ['password' , '=' , $request->input('password')]
        ])->get() ;

        if($data){
            return redirect("/main");
        }else{
            return redirect("/login");
        }
    }

    public function stockprocess(Request $request){
        DB::table('products')->insert([
            'nama_barang' => $request->input('barang') ,
            'harga' => $request->input('harga') ,
            'stock' => $request->input('stock') ,
            'satuan' => $request->input('satuan')

        ]);

        return redirect("/main");
    }

    public function transactionprocess(Request $request){
        DB::table('transactions')->insert([
            'tanggal' => date("d/m/Y"),
            'nama_barang' => $request->input('barang') ,
            'stock_keluar' => $request->input('stock') ,
            'tujuan' => $request->input('tujuan') ,
            'validation' => $request->input('validasi')

        ]);

        $stock = 'stock - ' . $request->input('stock')  ;
        DB::table('products')
            ->where(['nama_barang' => $request->input('barang')])
            ->update(['stock' => DB::raw($stock)]);


        return redirect("/transaction");
    }

    public function updatetransactionprocess(Request $request){
        DB::table('transactions')->where('id' , '=' , $request->id)
            ->update(['tujuan' => $request->tujuan , 'validation' => $request->validation]);
       return redirect('/transaction');
    }

    public function deletetransactions($id){
        DB::table('transactions')->where('id' , '=' , $id)->delete();
        return redirect('transaction');
    }

    public function getpdftrans(){
        $data = DB::table('transactions')->get();
        $pdf = PDF::loadview('transactions_pdf' , ['data' => $data]) ;
        return $pdf->download('laporan_transaksi.pdf') ;
    }


}
