<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\StoreProducttypeRequest;
use App\Models\ProductModel;
use Validator;
use Faker\Provider\File;
use Illuminate\Http\Request;

use App\Models\CategoryModel;
use App\Models\ProductTypeModel;

class ProductController extends Controller
{
    public function index()
    {
        $product = ProductModel::where('status',1)->paginate(5);
        return view('admin.pages.product.list', compact('product'));

    }
    public function create(){
        $category = CategoryModel::where('status',1)->get();
        $producttype = ProductTypeModel::where('status',1)->get();
        return view('admin.pages.product.add', compact('category','producttype'));

    }
    public function store(StoreProductRequest $request)
    {
        if ($request->hasFile('image')) {

            $file = $request->image;

            //getClientOriginalName() lấy tên file
            $file_name = $file->getClientOriginalName();

            //getMimeType lấy kiểu file

            $file_type = $file->getMimeType();

            // $file->getSize() lấy size ảnh  theo bytes 1mb =1048576b

            $file_size = $file->getSize();

            if ($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg' || $file_type == 'image/gif') {
                if ($file_size <= 1048576) {
                    $file_name = date("D-M-Y") . '-' . rand() . '-' . $file_name;
                    if ($file->move('img/upload/product', $file_name)) {
                        $data = $request->all();
                        $data['slug'] = $request->name;
                        $data['image'] = $file_name;
                        ProductModel::create($data);
                        return redirect()->route('product.index')->with('thongbao', 'Đã thêm thành công');


                    }

                } else {
                    return back()->with('error', 'Bạn không thể upload ảnh quá lớn 1 MB');
                }
            } else {
                return back()->with('error', 'File bạn chọn phải là file ảnh');
            }


        } else {
            return back()->with('error', 'Bạn chưa chọn ảnh minh họa cho sản phẩm');
        }

    }
    public function show(){

    }
    public function edit($id){
        $category = CategoryModel::where('status',1)->get();
        $producttype = ProductTypeModel::where('status',1)->get();
        $product = ProductModel::find($id);
        return response()->json(['category' => $category,'producttype' => $producttype,'product' => $product],200);

    }
    public function update(StoreProductRequest $request, $id)
    {
        $product = ProductModel::find($id);
        $data = $request->all();
        $data['slug'] = $request->name;
        if ($request->hasFile('image')) {

            $file = $request->image;

            //getClientOriginalName() lấy tên file
            $file_name = $file->getClientOriginalName();

            //getMimeType lấy kiểu file

            $file_type = $file->getMimeType();

            // $file->getSize() lấy size ảnh  theo bytes 1mb =1048576b

            $file_size = $file->getSize();

            if ($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg' || $file_type == 'image/gif') {
                if ($file_size <= 1048576) {
                    $file_name = date("D-M-Y") . '-' . rand() . '-' . $file_name;
                    if ($file->move('img/upload/product', $file_name)) {

                       $data['image'] = $file_name;
                       if(File::exists('img/upload/product'.$product->image)){


                           unlink('img/upload/product'.$product->image);
                       }

                    }

                } else {
                    return response()-> json(['error' =>'ảnh của bạn quá lớn chỉ upload dưới 1 mb' ],200);
                }
            } else {
                return response()-> json(['error' => 'File bạn chọn không là hình ảnh'],200);
            }


        }else{
            $data['image'] = $product->image;

        }
        $product->update($data);
        return response()-> json(['result' => 'Đã sua thành công  sản phẩm có id' . $id],200);


    }


    public function destroy($id){
        $product = ProductModel ::find($id);
        if(file_exists('img/upload/product/'.$product->image)){
            unlink('img/upload/product/'.$product->image);
        }
        $product-> delete();
        return response()-> json(['result' => 'Đã xóa thành công loại sản phẩm có id' . $id],200);

    }

}
