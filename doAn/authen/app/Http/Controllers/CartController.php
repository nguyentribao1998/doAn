<?php

namespace App\Http\Controllers;

use App\Mail\ShoppingMail;
use App\Models\CategoryModel;
use App\Models\OrderDetailModel;
use App\Models\OrderModel;
use App\Models\ProductModel;
use App\Models\ProductTypeModel;

use DemeterChain\C;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use function Sodium\add;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function store(Request $request){
        $data = $request-> all();
        $data['idUser'] = Auth::user()->id;
        $data['code_order']= 'orders'.rand();
        $data['status']=0;
        $order =OrderModel :: create($data);
        $idOder = $order->id;
        $orderdetail =[];
        $orderdetails =[];
        foreach (Cart::content() as $key=> $cart){
            $orderdetail['idOder']=$idOder;
            $orderdetail['idProduct']=$cart->id;
            $orderdetail['quantity']=$cart->qty;
            $orderdetail['price']=$cart->price;
            $orderdetails[$key] = OrderDetailModel::create($orderdetail);


        }
        Mail::to($order->email)->send(new ShoppingMail($order,$orderdetails));
        Cart::destroy();
        return response()->json('Đã mua hàng thành công',200);



    }
    public function __construct()
    {
        $category = CategoryModel::where('status', 1)->get();
        $producttype = ProductTypeModel::where('status', 1)->get();
        view()->share(['category' => $category, 'producttype' => $producttype]);
    }

    public function index()
    {

        $cart = Cart::content();
        return view('client.pages.cart', compact('cart'));


    }
    public  function show(){

    }

    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            if ($request->qty == 0) {
                return response()->json(['error' => 'Số lượng tối thiểu 1 sản phẩm'], 200);
            } else {
                Cart::update($id, $request->qty);
                return response()->json(['result' => 'Cập nhập thành công']);
            }


        }

    }


    public function addCart($id,Request $request){
        $product = ProductModel::find($id);
        if($request->qty){
            $qty = $request->qty;
        }else{
            $qty = 1;
        }
        if($product->promotional>0){
            $price = $product->promotional;
        }else{
            $price = $product->price;
        }
        $cart =  ['id' => $id, 'name' => $product->name, 'qty' => $qty, 'price' => $price, 'options' => ['img' => $product->image]];
        Cart::add($cart);

       return back()->with('thongbao','Đã mua hàng '.$product->name.' thành công');
    }

    public function destroy($id){
        Cart::remove($id);
        return response()->json(['result' => 'Xóa thành công']);
    }
    public function checkout(){

        $user = Auth::user();
        $price = str_ireplace(',','',Cart::total());

        return view('client.pages.checkout',compact('user','price'));

    }



}
