<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class UserCon extends Controller
{
    public function index()
    {
        $user = DB::table('user')->get();
        return view('user', ['user' => $user]);
    }

    public function input()
    {
        return view('tambahuser');
    }

    public function storeinput(Request $request)
    {
        // insert data ke table tbuser
        DB::table('user')->insert([
            'userID' => $request->userID,
            'nama' => $request->nama,
            'telepon' => $request->telepon,
            'alamat1' => $request->alamat1,
            'alamat2' => $request->alamat2,
            'kodepos' => $request->kodepos,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        // alihkan halaman ke route user
        Session::flash('message', 'Input Berhasil.');
        return redirect('/user');
    }

    public function update($id)
    {
        // mengambil data user berdasarkan id yang dipilih
        $user = DB::table('user')->where('userID', $id)->get();
        // passing data user yang didapat ke view edit.blade.php
        return redirect('/user');
    }

    public function storeupdate(Request $request)
    {
        // update data user

        DB::table('user')->where('userID', $request->userID)->update([
            'nama' => $request->nama,
            'telepon' => $request->telepon,
            'alamat1' => $request->alamat1,
            'alamat2' => $request->alamat2,
            'kodepos' => $request->kodepos,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // alihkan halaman ke halaman user
        return redirect('/user');
    }

    public function delete($id)
    {
        // mengambil data user berdasarkan id yang dipilih
        DB::table('user')->where('userID', $id)->delete();
        // passing data user yang didapat ke view edit.blade.php
        return redirect('/user');
    }
}