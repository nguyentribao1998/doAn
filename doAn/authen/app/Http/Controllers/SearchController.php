<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\ProductTypeModel;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getSearch(Request $req){
        $product = ProductModel::where('name','like', '%'.$req->key.'%')

            ->get();
        return view('client.pages.search', compact('product'));
    }
    public function __construct()
    {
        $category = CategoryModel::where('status', 1)->get();
        $producttype = ProductTypeModel::where('status', 1)->get();
        view()->share(['category' => $category, 'producttype' => $producttype]);
    }

}
