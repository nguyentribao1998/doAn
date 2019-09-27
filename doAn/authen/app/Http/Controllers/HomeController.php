<?php

namespace App\Http\Controllers;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\ProductTypeModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Http\Request;
use Dotenv\Validator;
class HomeController extends Controller
{

    public function __construct(){
        $category = CategoryModel::where('status',1)->get();
        $producttype = ProductTypeModel::where('status',1)->get();
        view()->share(['category'=>$category,'producttype'=>$producttype]);
    }
    public function index(){
       $product1 = ProductModel::where('status',1)->where('idCategory',3)->get();
       $product2 = ProductModel::where('status',1)->where('idCategory',1)->get();
       $product3 = ProductModel::where('status',1)->where('idCategory',2)->get();


        return view('client.pages.index',['prosamsung'=>$product1,'promt'=>$product2,'propk'=>$product3]);
    }
    public function redirectProvider($social){
        return Socialite::driver($social)->redirect();
    }
    public function handleProviderCallback($social){
        $user = Socialite ::  driver($social)->user();
        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser);
        return back()->with('thongbao','Đăng nhập thành công');
    }

    private function findOrCreateUser($user){
        $authUser=User::where('social_id',$user->id)->first();
        if($authUser){
            return $authUser;

        }else{
            return User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => '',
                'social_id' => $user->id,
                'ruler' => 0,
                'status' => 0,
                'avatar' => $user->avatar,
            ]);
        }
    }



}
