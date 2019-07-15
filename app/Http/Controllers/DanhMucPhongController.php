<?php

namespace App\Http\Controllers;
use App\DanhMucPhong;
use App\DanhMucGhe;

use Illuminate\Http\Request;

class DanhMucPhongController extends Controller
{
    public function Index(){
    	$phongs=DanhMucPhong::query()->get();
	foreach ($phongs as $item) {
		$item->soghe=count(DanhMucGhe::query()->where('phong_id',$item->id)->get());
	}
    	return view('Danhmuc.Index',[
    		'data'=>$phongs]);
    }

    public function ShowFormAddPhong(){
		return view('Danhmuc.Add');
    }
    public function AddPhong(Request $request){
    	$ten_phong=$request->get('ten_phong');
    	$so_ghe=$request->get('so_ghe');
    		$so_ghes = (int)$so_ghe;
    	$phong=DanhMucPhong::create(['ten_phong'=>$ten_phong]);
    	for ($i=1; $i<= $so_ghes; $i++) {
    		DanhMucGhe::create(['ten_ghe'=>$i,
    			'phong_id'=>$phong->id]);
    	}
    	   return redirect()
             ->route('index.danhmucphong');
    }
    public function Delete($id){
    	DanhMucGhe::where('phong_id',$id)->delete();
    	DanhMucPhong::find($id)->delete();
    	return redirect()
             ->route('index.danhmucphong');
    }
}
