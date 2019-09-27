<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ProductTypeModel extends Model
{
    protected $table='product_types';
    protected $fillable = [
        'id', 'name', 'slug','status','idCategory',
    ];
    public  function Category(){
        return $this-> belongsTo('App\Models\CategoryModel','idCategory','id');
    }






}
