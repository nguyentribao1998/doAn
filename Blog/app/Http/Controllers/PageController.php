<?php

namespace App\Http\Controllers;

use App\LoaiTin;
use App\Models\ProductTypeModel;
use App\Slide;
use App\TheLoai;
use App\TinTuc;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function trangchu(){
        $theloai= TheLoai::all();

        return view('client.pages.index', compact('theloai'));

    }
    public function __construct(){
        $slide = Slide::all();
        $theloai= TheLoai::all();
        $loaitin= LoaiTin::all();
        $tintuc = TinTuc::where('NoiBat',1)->paginate(1);
        view()->share(['slide'=>$slide,'theloai'=>$theloai,'loaitin'=>$loaitin,'tintuc'=>$tintuc]);
    }


}
