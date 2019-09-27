<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\CustomerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public  function index(){

    }
    public  function create(){

    }
    public  function store(CustomerRequest $request){
       if($request ->ajax()){
           $data = $request->only('email','phone','address');
           $data['idUser']=Auth::user()->id;
           if($request->active =='on'){
               $data['active'] =1;
               $customer = CustomerModel::where('idUser',Auth::user()->id)->where('active',1)->first();
               if(!empty($customer)){
                   $customer->active= 0;
                   $customer->save();

               }
           }else{
               $data['active']=0;
           }
           CustomerModel::create($data);
           return response()->json('Đã thêm  địa chỉ  nhận hàng thành công',200);
       }

    }
    public  function show( Request $request){

    }
    public  function edit(){

    }
}
