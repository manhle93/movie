<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhMucPhong extends Model
{
    protected $fillable = [
      'ten_phong',
  ];
  public function phongChieu()
  {
  	return $this->hasMany('App\PhongChieu', 'phong_chieu_id', 'id');
  }
  public function gheNgoi()
  {
  	return $this->hasMany('App\DanhMucGhe', 'phong_chieu_id', 'id');
  }
}
