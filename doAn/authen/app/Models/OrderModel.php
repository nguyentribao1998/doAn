<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    protected $table='orders';
    protected $fillable = [
        'code_order', 'idUser','name','address', 'email', 'phone', 'message', 'status',
    ];
    public function User(){
        return $this->belongsTo('App\Models\User','idUser','id');
    }
}
