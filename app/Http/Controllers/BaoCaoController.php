<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phim;
use App\KhachHang;

class BaoCaoController extends Controller
{
    public function BaoCaoPhim()
    {
        $phim = Phim::query()->with('datVe')->get();
        return view('BaoCao.phim', [
            'phims' => $phim,

        ]);
    }
    public function  BaoCaoKhachHang()
    {
        $khachhangs = KhachHang::query()->with('datVe', 'datVe.phim', 'datVe.ghe.phongChieu.danhmucphongChieu', 'datVe.ghe.phongChieu.gioChieu.ngayChieu', 'datVe.ghe.phongChieu.gioChieu', 'datVe.ghe.danhMucGhe')->get();
        foreach ($khachhangs as $khachhang) {
            foreach ($khachhang->datVe as $item) {
                $khachhang->phong = $item->ghe->phongChieu->danhmucphongChieu->ten_phong;
                $khachhang->gio = $item->ghe->phongChieu->gioChieu->gio_chieu;
                $khachhang->ngay = $item->ghe->phongChieu->gioChieu->ngayChieu->ngay_chieu;
                $khachhang->phim=$item->phim;
            }
        }
        return view('BaoCao.khachhang', [
            'khachhangs' => $khachhangs,

        ]);
    }
}
