<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Socialite;
class UserController extends Controller
{


    public function redirectProvider($social){
        return Socialite:: driver($social)->redirect();
    }
    public function handleProviderCallback($social){
        $user = Socialite ::  driver($social)->user();
        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser);
        return redirect('')->to('/');
    }
    private function findOrCreateUser($user){
        $authUser=User::where('social_id',$user->social_id)->first();
        if($authUser){
            return $authUser;

        }else{
            return User::create([
                'name'=>$user->name,
                'email'=>$user->email,
                'password'=>'',
                'social_id'=>$user->id,
                'ruler'=>0,
                'status'=>0,
                'avatar'=>$user->avatar,

            ]);
        }
    }

    public function logout(){
        if(Auth::check()){
            Auth::logout();
            return back()->with('thongbao','Đăng xuất thành công');
        }
    }
    public function updatePassClient(Request $request){
        $this -> validate($request,
            [
                'password'=>'required|min:6|max:255',
                're_password'=>'required|min:6|max:255|same:password',


            ],
            [
                'password.required'=>'password không được bỏ trống',
                'password.min'=>'password  tối thiếu có 2-255 kí tự',
                'password.max'=>'password tối đa có 2-255 kí tự',
                're_password.required'=>'password không được bỏ trống',
                're_password.same'=>'nhập  không đúng với mật khẩu  ',
            ]
        );
        $user = User::find(Auth::user()->id);
        $user -> password = Hash:: make($request->password) ;
        $user -> save();
        return back()->with('thongbao','Đã cập nhập thành công mật khẩu');

    }








    public  function registerClient(Request $request){
        $this -> validate($request,
            [
                'name' => 'required|min:2|max:255',
                'email'=> 'required|email|unique:users,email',
                'password'=>'required|min:6|max:255',
                're_password'=>'required|same:password',
            ],
            [
                'name.required' => "Họ và tên  không được để trống",
                'name.min'=>'Họ và tên  tối thiếu có 2-255 kí tự',
                'name.max'=>'Họ và tên tối đa có 2-255 kí tự',
                'email.required'=>'Địa chỉ email không được bỏ trống',
                'email.email'=>'Địa chỉ email không đúng định dạng',
                'email.unique'=>'Địa chỉ email đã tồn tại trong hệ thống',
                'password.required'=>'password không được bỏ trống',
                'password.min'=>'password  tối thiếu có 2-255 kí tự',
                'password.max'=>'password tối đa có 2-255 kí tự',
                're_password.required'=>'password không được bỏ trống',
                're_password.same'=>'nhập  không đúng với mật khẩu  ',
            ]
        );

        $data = $request-> all();
        $data['password'] = Hash::make($request ->password);
        $user =User::create($data);
        Auth:: login($user);
        return back()->with('thongbao','Đăng kí thành công');

    }
    public function loginClient(Request $request){
        $data = $request->only('email','password');
        if(Auth::attempt($data,$request->has('remember'))){
            return back()->with('thongbao','Đăng nhập thành công');
        }else{
            return back()->with('error','Đăng nhập thất bại.Xin vui lòng kiểm tra lại tài khoản');
        }

    }
    public function loginAdmin(Request $request){
        $data = $request->only('email','password');
        if(Auth::attempt($data,$request->has('remember'))){
           if(Auth::user()->role ==1)
               return redirect('admin/')->with('thongbao','Đăng nhập thành công');
        else if (Auth::user()->role ==2)
            return redirect()->route('category.index')->with('thongbao','Đăng nhập thành công');
        else if (Auth::user()->role ==3)
            return redirect()->route('product.index')->with('thongbao','Đăng nhập thành công');
        else if (Auth::user()->role ==4)
            return redirect()->route('order.index')->with('thongbao','Đăng nhập thành công');
        }else{
            return redirect()->route('login.admin')->with('error','Đăng nhập thất bại. Xin vui lòng kiểm tra lại tài khoản');
        }
    }
}
