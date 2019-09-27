<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProducttypeRequest;
use App\Models\ProductModel;
use App\Models\ProductTypeModel;
use Dotenv\Validator;
use Illuminate\Http\Request;
use  App\Models\CategoryModel;


class ProductTypeController extends Controller
{
    public function index()
    {
        $producttype = ProductTypeModel::paginate(5);
        return view('admin.pages.producttype.list', compact("producttype"));

    }

    public function create()
    {
        $category = CategoryModel:: where('status',1)->get();
        return view('admin.pages.producttype.add', compact('category'));

    }


    public function store(StoreProducttypeRequest $request)
    {
        $data = $request->all();
        $data['slug']=$request->name;
        if(ProductTypeModel::create($data)){
            return redirect()-> route('producttype.index')->with('thongbao','Đã thêm thành công loại sản phâme');
        }else
            return back()->with('thongbao','có lỗi xảy ra kiểm tra lại');
    }


    public function show($id)
    {



    }


    public function edit($id)
    {
        $producttype = ProductTypeModel::find($id);
        $category = CategoryModel::where('status',1)->get();
        return response()->json(['category' => $category,'producttype' => $producttype],200);


    }


    public function update( Request $request, $id)
    {
        $validator = Validator::make($request -> all(),
            [
                'name'=>'required|min:2|max:255',
            ],
            [
                'name.required' => "Tên loại sản phẩm không được để trống",
                'name.min'=>'Tên loại sản phẩm  tối thiếu có 2-255 kí tự',
                'name.max'=>'Tên loại sản phẩm  tối thiếu có 2-255 kí tự',


            ]
        );
        if($validator->fails()){
            return response()->json(['error' => 'true', 'message' => $validator->errors()],200);
        }
        $producttype = ProductTypeModel::find($id);
        $data = $request-> all();
        $data['slug']=$request->name;
        if($producttype-> update($data)){
            return response()->json(['result' => 'Đã sửa thành công loại sản phẩm có id'.$id],200);
        }else{
            return response()->json(['result' => 'Đã sửa không thành công loại sản phẩm có id '.$id],200);
        }

    }






    public function destroy($id)
    {
        $producttype = ProductTypeModel::find($id);
        if($producttype-> delete()){
            return response()-> json(['result' => 'Đã xóa thành công loại sản phẩm có id' . $id],200);
        }
        else{
            return response()-> json(['result' => 'Đã xóa không thành công loại sản phẩm có id' . $id],200);
        }

    }


}
