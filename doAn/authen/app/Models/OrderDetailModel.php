<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetailModel extends Model
{
    protected $table='order_details';
    protected $fillable = [
        'idOder', 'idProduct', 'quantity', 'price',
    ];
    public function Order(){
        return $this->belongsTo('App\Models\OrderModel','idOder','id');
    }
    public function Product(){
        return $this->belongsTo('App\Models\ProductModel','idProduct','id');
    }
    protected $guarded=['*'];
}
