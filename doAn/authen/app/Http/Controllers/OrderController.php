<?php

namespace App\Http\Controllers;

use App\Models\OrderModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{


public  function index(){

    $all_order = DB::table('orders')
    ->join('customers','orders.idUser','=','customers.idUser')
        ->select('orders.*','customers.email')
        ->orderby('orders.id','desc')->get();

    return view('admin.pages.Order.list',compact('all_order'));


}
public function destroy($id){
    $all_order = OrderModel::find($id);
    $all_order->delete();
    return response()->json('Xoa thanh cong');
}



}
