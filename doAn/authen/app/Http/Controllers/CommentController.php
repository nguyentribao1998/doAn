<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\CommnentModel;
use App\Models\ProductModel;
use App\Models\ProductTypeModel;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function __construct()
    {
        $category = CategoryModel::where('status', 1)->get();
        $producttype = ProductTypeModel::where('status', 1)->get();
        view()->share(['category' => $category, 'producttype' => $producttype]);
    }

    public function postComment(Request $request, $id){
        $comment = new CommnentModel();

        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->content= $request->cm_content;
        $comment->com_product = $request->id;
        $comment->save();
        return back();



    }
    public function getChitiet(Request $req, $id){
        $chitiet = ProductModel::where('id', $req->id)->first();
        $data['comment']= CommnentModel::where('com_product',$id)->get();
        return view('chitietsp',compact('chitiet'));

    }
}
