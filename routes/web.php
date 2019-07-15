<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('danhsachphong', 'DanhMucPhongController@Index')->name('index.danhmucphong');
Route::get('themphong', 'DanhMucPhongController@ShowFormAddPhong')->name('add.showformadddanhmucphong');
Route::post('themphong', 'DanhMucPhongController@AddPhong')->name('add.themphong');
Route::get('deletephong/{id}','DanhMucPhongController@Delete')->name('delete.phong');
Route::get('getvue','DanhMucPhongController@GetVue')->name('get.vue');

Route::get('addphim', 'DanhMucPhimController@ShowFormAddPhim')->name('add.showformaddphim');
Route::post('addphim', 'DanhMucPhimController@AddPhim')->name('add.addphim');
Route::get('addgio/{id}', 'DanhMucPhimController@ShowFormAddGio')->name('add.showformaddgio');
Route::get('getngay/{id}','DanhMucPhimController@getNgay')->name('get.ngay');
Route::post('addgio', 'DanhMucPhimController@Addgio')->name('add.addgio');

Route::get('addphong/{id}', 'DanhMucPhimController@ShowFormAddPhong')->name('add.showformaddphong');
Route::get('getgio/{id}','DanhMucPhimController@getGio')->name('get.gio');
Route::post('addphong', 'DanhMucPhimController@AddPhong')->name('add.addphong');
Route::post('addanh/{id}', 'DanhMucPhimController@addAnh')->name('add.addanh');

Route::get('phim','DanhMucPhimController@showPhim')->name('index.phim');
Route::get('datve/{id}','DatVeController@ShowFormDatVe')->name('index.showformdatve');
Route::get('datghe/{id}','DatVeController@ShowFormDatGhe')->name('index.showformdatghe');
Route::post('adddatve/{id}', 'DatVeController@addVe')->name('add.addve');

Route::get('baocaophim','BaoCaoController@BaoCaoPhim')->name('index.baocaophim');
Route::get('baocaokhachhang','BaoCaoController@BaoCaoKhachHang')->name('index.baocaokhachhang');

Route::get('home','HomeController@home')->name('index.home');

Route::get('capnhatthanhcong','HomeController@CapNhatThanhCong')->name('index.capnhatthanhcong');
Route::get('datvethanhcong','HomeController@DatVeThanhCong')->name('index.datvethanhcong');






