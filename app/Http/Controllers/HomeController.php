<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view('home');
    }
    public function CapNhatThanhCong(){
        return view('ThanhCong.capnhatphim');
    }
    public function DatVeThanhCong(){
        return view('ThanhCong.datve');
    }
}
