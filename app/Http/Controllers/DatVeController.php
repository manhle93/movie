<?php

namespace App\Http\Controllers;

use App\Phim;
use App\NgayChieu;
use App\GioChieu;
use App\PhongChieu;
use App\DanhMucPhong;
use App\Ghe;
use Illuminate\Http\Request;
use App\DanhMucGhe;
use App\KhachHang;
use App\DatVe;

class DatVeController extends Controller
{
    public function ShowFormDatVe($id)
    {
        $phim = Phim::query()->where('id', $id)->first();
        $ngaychieu = NgayChieu::query()->where('phim_id', $id)->with('gioChieu', 'gioChieu.phongChieu', 'gioChieu.phongChieu.danhmucphongChieu')->get();
        return view('DatVe.datve', [
            'phim' => $phim,
            'ngaychieu' => $ngaychieu,
        ]);
    }
    public function ShowFormDatGhe($id)
    {
        $phong = PhongChieu::query()->where('id', $id)->with('gioChieu.ngayChieu')->first();
        $ghes = DanhMucGhe::query()->where('phong_id', $phong->phong_chieu_id)->get();
        $ghedadats = Ghe::query()->where('phong_chieu_id', $id)->get();
        if (count($ghedadats) != 0) {
            foreach ($ghes as $ghe) {
                foreach ($ghedadats as $ghedadat) {
                    if ($ghe->id == $ghedadat->ghe_id) {
                        $ghe->dadat = 'dadat';
                        break;
                    } else {
                        $ghe->dadat = '';

                    }
                }
            }
        } else {
            foreach ($ghes as $it) {
                $it->dadat = '';
            }
        }
        $phim = Phim::query()->where('id', $phong->gioChieu->ngayChieu->phim_id)->first();
        return view('DatVe.datghe', [
            'ghes' => $ghes,
            'phong' => $phong,
            'phim' => $phim,
        ]);
    }

    public function addVe(Request $request, $id)
    {
        $phim_id=$request->get('phim_id');
        $info = $request->get('ghedat');
        $khachdatve = $request->get('khachdatve');
        foreach ($info as $item) {
            Ghe::query()->create([
                'phong_chieu_id' => $id,
                'ghe_id' => $item['ghe_id'],
            ]);
        }
        $ghe = Ghe::query()->where('phong_chieu_id', $id)->get();
        $khachhang = KhachHang::query()->create($khachdatve);
        foreach ($ghe as $it) {
            $datve = DatVe::query()->create([
                'khach_hang_id' => $khachhang->id,
                'ghe_id' => $it->id,
                'phim_id'=>$phim_id
            ]);
        };
        return response()->json([
            'message' => "success",
            'result' => [],
        ], 200, []);
    }
}
