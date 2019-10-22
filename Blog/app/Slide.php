<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table="Slide";
    protected $fillable = [
        'id','name','image','noidung','link'
    ];
}
