<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class ProdukCon extends Controller
{
    public function index()
    {
        $produk = DB::table('produk')->get();
        return view('produk', ['produk' => $produk]);
    }

    public function input()
    {
        return view('tambahproduk');
    }

    public function storeinput(Request $request)
    {
        // insert data ke table tbproduk
        DB::table('produk')->insert([
            'produkID' => $request->produkID,
            'namaproduk' => $request->namaproduk,
            'deskripsiproduk' => $request->deskripsiproduk,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
        ]);
        // alihkan halaman ke route produk
        Session::flash('message', 'Input Berhasil.');
        return redirect('/produk');
    }

    public function update($id)
    {
        // mengambil data produk berdasarkan id yang dipilih
        $produk = DB::table('produk')->where('produkID', $id)->get();
        // passing data produk yang didapat ke view edit.blade.php
        return redirect('/produk');
    }

    public function storeupdate(Request $request)
    {
        // update data produk

        DB::table('produk')->where('produkID', $request->produkID)->update([
            'produkID' => $request->produkID,
            'namaproduk' => $request->namaproduk,
            'deskripsiproduk' => $request->deskripsiproduk,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
        ]);

        // alihkan halaman ke halaman produk
        return redirect('/produk');
    }

    public function delete($id)
    {
        // mengambil data produk berdasarkan id yang dipilih
        DB::table('produk')->where('produkID', $id)->delete();
        // passing data produk yang didapat ke view edit.blade.php
        return redirect('/produk');
    }
}