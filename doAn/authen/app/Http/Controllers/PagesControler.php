<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\ProductTypeModel;
use Illuminate\Http\Request;

class PagesControler extends Controller
{
    public function __construct()
    {
        $category = CategoryModel::where('status', 1)->get();
        $producttype = ProductTypeModel::where('status', 1)->get();
        view()->share(['category' => $category, 'producttype' => $producttype]);
    }

   public function getLoaisp($type){
       $sp_theoloai = ProductModel::where('idProductType',$type)->get();
       return view('client.pages.loaisanpham', compact('sp_theoloai'));
   }
}
