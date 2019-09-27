<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    protected $table='customers';

    protected $fillable = [
        'idUser', 'email', 'address','phone', 'active',
    ];

    public function User(){
        return $this->belongsTo('App\Models\User','idUser','id');
    }
}
