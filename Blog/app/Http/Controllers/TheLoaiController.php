<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTheLoaiRequest;
use App\TheLoai;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TheLoaiController extends Controller
{
   public function index(){
    $theloai = TheLoai::paginate(5);

    return view('admin.pages.theloai.list',compact('theloai'));

}
    public function create(){
        return view('admin.pages.theloai.add');

    }
    public function store(StoreTheLoaiRequest $request){


        TheLoai::create([

            'name' => $request->name,
        ]);

        return redirect()->route('theloai.index');

    }
    public function show($id)
    {

    }
    public function edit($id){
        $theloai = TheLoai::find($id);
        return response()->json($theloai, 200);
    }
    public function update(StoreTheLoaiRequest $request, $id){


        $theloai = TheLoai::find($id);
        $theloai->update(
            [
                'name'=>$request->name,
            ]
        );
        return response()->json(['success' => 'Sửa thành công']);
    }


    public function destroy($id)
    {

        $theloai = TheLoai::find($id);
        $theloai->delete();
        return response()->json(['success' => 'Xóa thành công']);
    }

}
