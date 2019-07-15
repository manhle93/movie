<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhongChieu extends Model
{
    protected $fillable = [
    	'phong_chieu_id',
    	'gio_chieu_id',
    ];
    public function ghe() {
    	return $this->hasMany('App\Ghe', 'phong_chieu_id', 'id');

    }
     public function danhmucphongChieu()
  {
  	return $this->belongsTo('App\DanhMucPhong', 'phong_chieu_id', 'id')->withDefault();
  }
  public function gioChieu()
  {
  	return $this->belongsTo('App\GioChieu', 'gio_chieu_id', 'id')->withDefault();
  }
  
}
