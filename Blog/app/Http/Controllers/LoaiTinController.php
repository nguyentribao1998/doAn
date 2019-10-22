<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoaiTinRequest;
use App\LoaiTin;

use App\TheLoai;
use Illuminate\Http\Request;

class LoaiTinController extends Controller
{
    public function index(){

        $loaitin = LoaiTin::paginate(5);

        return view('admin.pages.loaitin.list',compact('loaitin'));
    }
    public function create(){
        $theloai = TheLoai:: all();
        return view('admin.pages.loaitin.add',compact('theloai'));

    }
    public function store(StoreLoaiTinRequest $request){

        $data = $request->all();
        if(LoaiTin::create($data)){
            return redirect()-> route('loaitin.index')->with('thongbao','Đã thêm thành công loại sản phâme');
        }else
            return back()->with('thongbao','có lỗi xảy ra kiểm tra lại');

    }
    public function show($id)
    {

    }
    public function edit($id){

    }
    public function update( ){



    }


    public function destroy($id)
    {

        $loaitin = LoaiTin::find($id);
        $loaitin->delete();
        return response()->json(['success' => 'Xóa thành công']);
    }
}
