<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel;

class ExportExcelContrller extends Controller
{
     public function index(){
        $all_order = DB::table('orders')
            ->join('customers','orders.idUser','=','customers.idUser')
            ->select('orders.*','customers.email')
            ->orderby('orders.id','desc')->get();

        return view('admin.pages.Order.list',compact('all_order'));

    }

    public function excel(){
        $all_order = DB::table('orders')->get()->toArray();
        $all_array[]= array('name','address','created_at','email','status');
        foreach ($all_order as $order){
            $all_array[]=array(
                'name'=>$order->name,
                'address'=>$order->address,
                'created_at'=>$order->created_at,
                'email'=>$order->email,
                'status'=>$order->status,
            );
        }
        Excel::create ('orders Data', function ($excel) use($all_array){
            $excel ->setTitle('orders Data');
            $excel ->sheet('orders Data', function ($sheet) use($all_array){
                $sheet->fromArray($all_array, null,'A1', false,false);
            });
        })->download('xlsx');
    }




}
