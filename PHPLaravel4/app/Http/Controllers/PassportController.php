<?php

namespace App\Http\Controllers;

use App\Tintuc;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PassportController extends Controller
{

    // Truyền đến màn admin.blade.php
    public function admin()
    {
        return view('admin.admin');
    }

    // Truyền đến màn forgot.blade.php
    public function forgot()
    {
        return view('passport.forgot');
    }

    // Truyền đến màn login.blade.php
    public function getlogin(){
        return view('passport.login');
    }

    // Kiểm tra đăng nhập truyền đến màn admin.blade.php hoặc màn user.blade.php
    public function postlogin(Request $request){
        $this->validate($request,
            [
                'email'=>'required',
                'password'=>'required',
            ],
            [
                'email.required'=>'Bạn chưa nhập tài khoản',
                'password.required'=>'Bạn chưa nhập mật khẩu',
            ]
        );
        $email =  $request['email'];
        $password =  $request['password'];
        if (Auth::attempt(['email'=>$email,'password'=>$password])){
            $news = Tintuc::orderBy('id','desc')->get();
            return redirect()->route('admin',['News'=>$news]);
        }elseif (Auth::attempt(['email'=>$email,'password'=>$password])){
            $news = Tintuc::orderBy('id','desc')->get();
            return redirect()->route('home',['News'=>$news]);
        }  else{
            return redirect()->route('login')->with('Error','Tài khoản hoặc mật khẩu không chính xác');
        }
    }

    // Đăng xuất đến màn login.blade.php
    public function logout(){
        Auth::logout();
        return redirect('login');
    }

    // Truyền đến màn forgot.blade.php
    public function getregister()
    {
        return view('passport.register');
    }

    public function postregister(Request $request){
        $this->validate($request,
            [
                'Name'=>'required',
                'Email'=>'required|email|min:1|max:100|unique:users,email',
                'Password'=>'required',
                'Password-again'=>'required|same:Password',
            ],
            [
                'Email.required'=>'Bạn chưa nhập Email',
                'Email.min'=>'Email phải có từ 1-100 ký tự',
                'Email.max'=>'Email phải có từ 1-100 ký tự',
                'Email.email'=>'Email không đúng định dạng',
                'Email.unique'=>'Email đã tồn tại',
                'Name.required'=>'Bạn chưa nhập Tên',
                'Password.required'=>'Bạn chưa nhập mật khẩu',
                'Password-again.required'=>'Chuaw nhập lại mật khẩu',
                'Password-again.same'=>'Mật khẩu nhập lại không chính xác',
            ]
        );
        $user = new User;
        $user->name = "$request->Name";
        $user->email = $request->Email;
        $user->number = "";
        $user->level = "2";
        $user->password = bcrypt($request->Password);
        $user->save();
        return redirect()->route('login')->with('Notification','Thêm người dùng '."[ $user->name ]".' thành công');
    }
}
