<?php

namespace App\Http\Controllers;

use App\Models\obatModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class login_registerController extends Controller
{

    public function __construct()
    {
        $adminData = [
            [
                'name' => 'admin_kasir',
                'email' => 'admin_kasir@gmail.com',
                'role' => 'admin_kasir',
                'password' => Hash::make('admin_kasir123'),
            ],
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'role' => 'user',
                'password' => Hash::make('user123'),
            ],
            [
                'name' => 'apoteker',
                'email' => 'apoteker@gmail.com',
                'role' => 'apoteker',
                'password' => Hash::make('apoteker123'),
            ],
            [
                'name' => 'pemilik',
                'email' => 'pemilik@gmail.com',
                'role' => 'pemilik',
                'password' => Hash::make('pemilik123'),
            ]
        ];
    
        // Menambahkan akun admin baru jika belum ada
        foreach ($adminData as $admin) {
            $existingAdmin = User::where('email', $admin['email'])->first();
            if (!$existingAdmin) {
                User::create([
                    'name' => $admin['name'],
                    'email' => $admin['email'],
                    'role' => $admin['role'],
                    'password' => $admin['password'],
                ]);
            }
        }
    }
    
    public function show_login(){
        return view('login_register.login');
    }
    public function show_register(){
        return view('login_register.register');
    }
    public function show_home(){
        $obat = obatModel::all();
        return view('login_register.home',[
            'obat' => $obat
        ]);
    }

    public function register(Request $request){
        $halo = [
            'email_baru' => 'required',
            'password_baru' => 'required',
            'konfir_password_baru' => 'required',
        ];

        $validasi = Validator::make($request->all(), $halo);
        if(!$request->password_baru == $request->konfir_password_baru){
            return redirect()->route('tampilan_register')->with(Session::flash('tidak_sama', true));
        }
        // Jika validasi gagal
        if ($validasi->fails()) {
            return redirect()->route('tampilan_register')->with(Session::flash('kosong_tambah', true));
        }

        $obat = User::create([
            'name' => $request->name,
            'email' => $request->email_baru,
            'password' => Hash::make($request->password_baru),
            'role' => 'user',
        ]);


        if ($obat) {
            return redirect()->route('tampilan_login')->with(Session::flash('berhasil_tambah', true));
            
        } else {
            return redirect()->route('tampilan_register')->with(Session::flash('gagal_tambah', true));
        }
    }

    public function login(Request $request){

        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
    
        $credentials = $request->only('email', 'password'); // Hanya ambil email dan password
    
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], true)) {
            
            // Jika ingin mengecek peran pengguna
            if (Auth::user()->role == 'apoteker') {

                return redirect()->intended('/apoteker/dashboard');
                // Lakukan sesuatu
            }elseif(Auth::user()->role == 'admin_kasir'){
                return redirect()->intended('/admin/dashboard')->with(Session::flash('success_message', true));
            }
            elseif(Auth::user()->role == 'pemilik'){
                return redirect()->intended('/admin_kepala/dashboard')->with(Session::flash('berhasil_login', true));
            }
            elseif(Auth::user()->role == 'user'){
                return redirect()->intended('/user/transaksi_baru')->with(Session::flash('berhasil_login', true));
            }

        } else {
            return redirect()->back()->with('error')->with(Session::flash('gagal_login', true));
            // Autentikasi gagal
            // Lakukan sesuatu, misalnya kembali ke halaman login dengan pesan error
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
