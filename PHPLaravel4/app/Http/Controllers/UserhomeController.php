<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserhomeController extends Controller
{
    //
    public function getuserhome(){
        $user = Auth::user();
        return view('user.user-home.user',['Nguoidung'=>$user]);
    }

    //
    public function getchangepassport($id){
        $user = User::find($id);
        return view('user.user-home.update-password',['User'=>$user]);
    }

    //
    public function postchangepassport(Request $request){
        $user = Auth::user();
        $this->validate($request,
            [
                'Password-now'=>'required',
                'Passwordnew'=>'required',
                'Passwordnew-again'=>'required|same:Passwordnew',
            ],
            [
                'Password-now.required'=>'Bạn chưa nhập mật khẩu cũ',
                'Passwordnew.required'=>'Bạn chưa nhập mật khẩu mới',
                'Passwordnew-again.required'=>'Bạn chưa nhập lại mật khẩu mới',
                'Passwordnew-again.same'=>'Mật khẩu mới nhập lại không chính xác',
            ]
        );
        if (!(Hash::check($request->get('Password-now'), Auth::user()->password))) {
            return redirect()->back()
                ->with("error","Mật khẩu cũ không chính xác! Vui lòng kiểm tra lại.");
        }
        $user->password = bcrypt($request->Passwordnew);
        $user->save();
        return redirect()->route('user.home')->with('Notification','Thay đổi mật khẩu thành công');
    }

    //
    public function getchangeinfomation($id){
        $user = User::find($id);
        return view('user.user-home.update-information',['User'=>$user]);
    }

    //
    public function postchangeinfomation(Request $request){
        $this->validate($request,
            [
                'Hotendem'=>'required',
                'Ten'=>'required',
            ],
            [
                'Hotendem.required'=>'Bạn chưa nhập họ tên đệm',
                'Ten.required'=>'Bạn chưa nhập nhập tên',
            ]
        );
        $user = Auth::user();
        $user->username = "$request->Hotendem";
        $user->name = "$request->Ten";
        $user->save();
        return redirect()->route('user.home');
    }
}
