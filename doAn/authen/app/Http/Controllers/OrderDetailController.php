<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\OrderDetailModel;
use App\Models\ProductModel;
use App\Models\ProductTypeModel;
use App\Models\CommnentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderDetailController extends Controller
{
    public function __construct()
    {
        $category = CategoryModel::where('status', 1)->get();
        $producttype = ProductTypeModel::where('status', 1)->get();
        view()->share(['category' => $category, 'producttype' => $producttype]);
    }
    public function getChitiet(Request $req, $id){
        $chitiet = ProductModel::where('id', $req->id)->first();
        $data['comment']= CommnentModel::where('com_product',$id)->get();
        return view('chitietsp',compact('chitiet'));

    }





}
