<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getproducttype(Request $request){

        $producttype = ProductModel::where('idCategory',$request->idCate)->get();
        return response()-> json($producttype,200);

    }

}
