<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    //
    protected $table='category';
    protected $fillable = [
        'id','name','slug','status',
    ];



    public function productType(){
        return $this->hasMany('App\Models\ProductTypeModel','idCategory','id');
    }
}
