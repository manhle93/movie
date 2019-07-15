<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ghe extends Model
{
protected $fillable = [
	'ghe_id',
	'phong_chieu_id'
];
	public function phongChieu()
	{
		return $this->belongsTo('App\PhongChieu','phong_chieu_id','id')->withDefault();
	}
	public function danhMucGhe()
	{
		return $this->belongsTo('App\DanhMucGhe','ghe_id','id')->withDefault();
	}
}
