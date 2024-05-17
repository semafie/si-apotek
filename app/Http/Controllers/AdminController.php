<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show_dashboard(){
        return view('admin.layout.admin_dashboard',[
            'title' => 'Dashboard'
        ]);
    }

    public function show_obat(){
        return view('admin.layout.obat',[
            'title' => 'Data Obat'
        ]);
    }
}
