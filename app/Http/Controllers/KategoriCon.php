<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class KategoriCon extends Controller
{
    public function index()
    {
        $kategori = DB::table('kategori')->get();
        return view('kategori', ['kategori' => $kategori]);
    }

    public function input()
    {
        return view('tambahkategori');
    }

    public function storeinput(Request $request)
    {
        // insert data ke table tbproduk
        DB::table('kategori')->insert([
            'kategoriID' => $request->kategoriID,
            'namakategori' => $request->namakategori,
            'deskripsikategori' => $request->deskripsikategori,
        ]);
        // alihkan halaman ke route kategori
        Session::flash('message', 'Input Berhasil.');
        return redirect('/kategori');
    }

    public function update($id)
    {
        // mengambil data kategori berdasarkan id yang dipilih
        $kategori = DB::table('kategori')->where('kategoriID', $id)->get();
        // passing data kategori yang didapat ke view edit.blade.php
        return redirect('/kategori');
    }

    public function storeupdate(Request $request)
    {
        // update data produk

        DB::table('kategori')->where('kategoriID', $request->kategoriID)->update([
            'namakategori' => $request->namakategori,
            'deskripsikategori' => $request->deskripsikategori,
        ]);

        // alihkan halaman ke halaman kategori
        return redirect('/kategori');
    }

    public function delete($id)
    {
        // mengambil data kategori berdasarkan id yang dipilih
        DB::table('kategori')->where('kategoriID', $id)->delete();
        // passing data kategori yang didapat ke view edit.blade.php
        return redirect('/kategori');
    }
}