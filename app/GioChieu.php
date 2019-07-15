<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GioChieu extends Model
{
    protected $fillable = [

        'gio_chieu',
        'ngay_chieu_id',
    ];
    public function phongChieu()
    {
        return $this->hasMany('App\PhongChieu', 'gio_chieu_id', 'id');
    }
    public function ngayChieu()
    {
        return $this->belongsTo('App\NgayChieu', 'ngay_chieu_id', 'id');
    }
}
