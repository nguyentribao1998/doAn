<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table='product';
    protected $fillable = [
        'name','slug','description','quantity','price','promotional','idCategory','idProductType','image','status',
    ];
    public function ProductTypes(){
        return $this->belongsTo('App\Models\ProductTypeModel','idProductType','id');
        
    }
    public function Category(){
        return $this->belongsTo('App\Models\CategoryModel','idCategory','id');

    }
}
