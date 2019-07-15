<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatVe extends Model
{
    
    protected $fillable = [
        'khach_hang_id',
        'phim_id',
        'ghe_id',
    ];
    
    public function khachHang()
    {
        return $this->belongsTo('App\KhachHang', 'khach_hang_id', 'id')->withDefault();
    }
    public function phim()
    {
        return $this->belongsTo('App\Phim', 'phim_id', 'id')->withDefault();
    }
    public function ghe()
    {
        return $this->belongsTo('App\Ghe', 'ghe_id', 'id')->withDefault();
    }
}
