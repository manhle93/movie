<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
  protected $fillable = [
    'ten_khach_hang',
    'so_dien_thoai',
    'dia_chi',
    'ngay_sinh',
];
public function datVe()
{
	return $this->hasMany('App\DatVe', 'khach_hang_id', 'id');
}
}
