<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class KeranjangCon extends Controller
{
    public function index()
    {
        $keranjang = DB::table('keranjang')->get();
        return view('keranjang', ['keranjang' => $keranjang]);
    }

    public function input()
    {
        return view('tambahkeranjang');
    }

    public function storeinput(Request $request)
    {
        // insert data ke table tbproduk
        DB::table('keranjang')->insert([
            'cartID' => $request->cartID,
            'produkID' => $request->produkID,
            'userID' => $request->userID,
            'totalharga' => $request->totalharga,
            'jumlahproduk' => $request->jumlahproduk,
        ]);
        // alihkan halaman ke route keranjang
        Session::flash('message', 'Input Berhasil.');
        return redirect('/keranjang');
    }

    public function update($id)
    {
        // mengambil data keranjang berdasarkan id yang dipilih
        $keranjang = DB::table('keranjang')->where('cartID', $id)->get();
        // passing data keranjang yang didapat ke view edit.blade.php
        return redirect('/keranjang');
    }

    public function storeupdate(Request $request)
    {
        // update data produk

        DB::table('keranjang')->where('cartID', $request->cartID)->update([
            'produkID' => $request->produkID,
            'userID' => $request->userID,
            'totalharga' => $request->totalharga,
            'jumlahproduk' => $request->jumlahproduk,
        ]);

        // alihkan halaman ke halaman keranjang
        return redirect('/keranjang');
    }

    public function delete($id)
    {
        // mengambil data keranjang berdasarkan id yang dipilih
        DB::table('keranjang')->where('cartID', $id)->delete();
        // passing data keranjang yang didapat ke view edit.blade.php
        return redirect('/keranjang');
    }
}