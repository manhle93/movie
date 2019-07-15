<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NgayChieu extends Model
{
	protected $fillable = [
        'id',
    'ngay_chieu',
    'phim_id',
];
public function gioChieu()
    {
        return $this->hasMany('App\GioChieu','ngay_chieu_id','id');
    }
}
