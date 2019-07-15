<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhMucGhe extends Model
{
   protected $fillable = [
      'ten_ghe',
      'phong_id',
   ]; 
   public function ghe(){
   	return $this->hasMany('App\Ghe', 'ghe_id', 'id')->withDefault();
   }
   public function gheNgoi()
  {
  	return $this->belongsTo('App\DanhMucPhong', 'phong_chieu_id', 'id')->withDefault();
  }
}
