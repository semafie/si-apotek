<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class akunController extends Controller
{
    public function tambah_pegawai(Request $request){
        $halo = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
        ];

        $validasi = Validator::make($request->all(), $halo);

        // Jika validasi gagal
        if ($validasi->fails()) {
            return redirect()->route('admin_akun_pegawai')->with(Session::flash('kosong_tambah', true));
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'role' => 'admin_kasir',
        ]);


        if ($user) {
            return redirect()->route('admin_akun_pegawai')->with(Session::flash('berhasil_tambah', true));
        } else {
            return redirect()->route('admin_akun_pegawai')->with(Session::flash('gagal_tambah', true));
        }
    }

    public function edit_pegawai(Request $request, $id){
        $user = User::findorFAil($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->jenis_kelamin = $request->jenis_kelamin;

        $user->save();

        // if ($user) {
            return redirect()->route('admin_akun_pegawai')->with(Session::flash('berhasil_edit', true));
        // } else {
        //     return redirect()->route('admin_akun_pegawai')->with(Session::flash('gagal_edit', true));
        // }
    }

    public function hapus_pegawai(Request $request, $id){
        $user = User::findorFAil($id);

        $user->delete();

        // if ($user) {
            return redirect()->route('admin_akun_pegawai')->with(Session::flash('berhasil_hapus', true));
        // } else {
        //     return redirect()->route('kepala_akunadmin')->with(Session::flash('gagal_hapus', true));
        // }
    }

    public function tambah_apoteker(Request $request){
        $halo = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
        ];

        $validasi = Validator::make($request->all(), $halo);

        // Jika validasi gagal
        if ($validasi->fails()) {
            return redirect()->route('admin_akun_apoteker')->with(Session::flash('kosong_tambah', true));
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'role' => 'admin_kasir',
        ]);


        if ($user) {
            return redirect()->route('admin_akun_apoteker')->with(Session::flash('berhasil_tambah', true));
        } else {
            return redirect()->route('admin_akun_apoteker')->with(Session::flash('gagal_tambah', true));
        }
    }

    public function edit_apoteker(Request $request, $id){
        $user = User::findorFAil($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->jenis_kelamin = $request->jenis_kelamin;

        $user->save();

        // if ($user) {
            return redirect()->route('admin_akun_apoteker')->with(Session::flash('berhasil_edit', true));
        // } else {
        //     return redirect()->route('admin_akun_apoteker')->with(Session::flash('gagal_edit', true));
        // }
    }

    public function hapus_apoteker(Request $request, $id){
        $user = User::findorFAil($id);

        $user->delete();

        // if ($user) {
            return redirect()->route('admin_akun_apoteker')->with(Session::flash('berhasil_hapus', true));
        // } else {
        //     return redirect()->route('kepala_akunadmin')->with(Session::flash('gagal_hapus', true));
        // }
    }
}
