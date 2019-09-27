<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\ContactModel;
use App\Models\ProductTypeModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function insert(){

    }
    public function getContact(){
        $user = Auth::user();
        return view('contact', compact('user'));
}
    public function saveContact(Request $request){
       $data = $request->except('_token');
       $data['created_at']=$data['updated_at'] = Carbon::now();


       ContactModel::insert($data);
        return response()->json(['result' => 'submit thành công']);
    }
    public function __construct()
    {
        $category = CategoryModel::where('status', 1)->get();
        $producttype = ProductTypeModel::where('status', 1)->get();
        view()->share(['category' => $category, 'producttype' => $producttype]);
    }

}
