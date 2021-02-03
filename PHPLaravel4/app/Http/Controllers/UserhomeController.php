<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserhomeController extends Controller
{
    //
    public function getuserhome(){
        $user = Auth::user();
        return view('user.user-home.user',['Nguoidung'=>$user]);
    }

    //
    public function getcheckpassport($id){
        $user = User::find($id);
        return view('user.user-home.check-password',['User'=>$user]);
    }

    //
    public function postcheckpassport(Request $request, $id){
        $user = User::find($id);
//        $check = "111";
//        $this->validate($request,
//            [
////                'Password'=>$check,
//                'Password-now'=>'required|same:Password',
//            ],
//            [
//                'Password-now.required'=>'Bạn chưa nhập mật khẩu',
////                'Password-now.same'=>'Mật khẩu nhập không chính xác',
//            ]
//        );
        return view('user.user-home.update-password',['User'=>$user]);
    }

    //
    public function getchangepassport($id){
        $user = User::find($id);
        return view('user.user-home.update-password',['User'=>$user]);
    }

    //
    public function postchangepassport(Request $request, $id){
        $user = User::find($id);
        $this->validate($request,
            [
                'Password-now'=>'required|same:Password',
            ],
            [
                'Password-now.required'=>'Bạn chưa nhập mật khẩu',
                'Password-now.same'=>'Mật khẩu nhập không chính xác',
            ]
        );
        $user->password = bcrypt($request->Password);
        $user->save();
        return redirect()->route('user.home');
    }

    //
    public function getchangeinfomation(){
        return view('user.user-home.update-information');
    }

    //
    public function postchangeinfomation(Request $request, $id){
//        $this->validate($request,
//            [
//                'NameND'=>'required',
//                'Sđt'=>'required',
//                'Level'=>'required',
//            ],
//            [
//                'NameND.required'=>'Bạn chưa nhập Tên',
//                'Sđt.required'=>'Bạn chưa nhập số điện thoại',
//                'Level.required'=>'Bạn chưa chọn cấp bậc',
//            ]
//        );
//        $user = User::find($id);
//        $user->name = "$request->NameND";
//        $user->number = $request->Sđt;
//        $user->level = $request->Level;
//        $user->save();
//        return redirect()->route('show.user')->with('Notification','Sửa tài khoản '."[ $user->email ]".' thành công');
        return view('user.user-home.update-information');
    }
}
