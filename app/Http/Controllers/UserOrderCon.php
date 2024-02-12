<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class UserOrderCon extends Controller
{
    public function index()
    {
        $userorder = DB::table('userorder')->get();
        return view('userorder', ['userorder' => $userorder]);
    }

    public function input()
    {
        return view('tambahuserorder');
    }

    public function storeinput(Request $request)
    {
        // insert data ke table tbproduk
        DB::table('userorder')->insert([
            'orderID' => $request->orderID,
            'produkID' => $request->produkID,
            'userID' => $request->userID,
        ]);
        // alihkan halaman ke route userorder
        Session::flash('message', 'Input Berhasil.');
        return redirect('/userorder');
    }

    public function update($id)
    {
        // mengambil data userorder berdasarkan id yang dipilih
        $userorder = DB::table('userorder')->where('orderID
        ', $id)->get();
        // passing data userorder yang didapat ke view edit.blade.php
        return redirect('/userorder');
    }

    public function storeupdate(Request $request)
    {
        // update data produk

        DB::table('userorder')->where('orderID', $request->orderID)->update([
            'produkID' => $request->produkID,
            'userID' => $request->userID,
        ]);

        // alihkan halaman ke halaman userorder
        return redirect('/userorder');
    }

    public function delete($id)
    {
        // mengambil data userorder berdasarkan id yang dipilih
        DB::table('userorder')->where('orderID', $id)->delete();
        // passing data userorder yang didapat ke view edit.blade.php
        return redirect('/userorder');
    }
}