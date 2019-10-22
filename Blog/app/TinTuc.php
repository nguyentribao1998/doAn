<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    protected $table="TinTuc";
    protected $fillable = [
        'id','TieuDe','TomTat','NoiDung','image','NoiBat','SoLuotXem','idLoaiTin'
    ];
    public function loaitin(){
        return $this->belongsTo('App\LoaiTin','idLoaiTin','id');

    }
    public function comment(){
        return $this->hasMany('App\Comment','idTinTuc','id');
    }
}
