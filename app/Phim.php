<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phim extends Model
{
    protected $fillable = [
        'id',
       'ten_phim',
       'the_loai',
       'hang',
       'quoc_gia',
       'ngon_ngu',
       'thoi_luong',
       'anh_dai_dien'

    ];

    public function ngayChieu()
    {
        return $this->belongsTo('App\NgayChieu','phim_id','id')->withDefault();
    }
    public function datVe()
    {
        return $this->hasMany('App\DatVe','phim_id','id');
    }
}
