<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoaiTinRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\StoreTinTucRequest;
use App\LoaiTin;
use App\TinTuc;
use Illuminate\Http\Request;

class TinTucController extends Controller
{
    public function index(){
        $tintuc = TinTuc::paginate(20);

        return view('admin.pages.tintuc.list',compact('tintuc'));

    }
    public function create(){
        $loaitin = LoaiTin::all();

        return view('admin.pages.tintuc.add', compact('loaitin'));
    }
    public function store(StoreTinTucRequest $request){
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
                    if ($file->move('admin/img/upload/tintuc', $file_name)) {
                        $data = $request->all();
                        $data['image'] = $file_name;
                        TinTuc::create($data);
                        return redirect()->route('tintuc.index')->with('thongbao', 'Đã thêm thành công');


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

}
