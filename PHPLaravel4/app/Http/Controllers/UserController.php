<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function getshow(Request $request){
        if($request->keyword){

            $user = User::where(
                'name', 'like', "%".$request->keyword."%"
            )->paginate(10);
            $user->withPath('?keyword=' . $request->keyword);
        }else{
            $user = User::orderBy('id','desc')->paginate(10);
        }
        return view('admin.user.show', ['User' => $user,'keyword' => $request->keyword]);
    }

    public function getadd(){
        return view('admin.user.add');
    }

    public function postadd(Request $request){
        $this->validate($request,
            [
                'NameND'=>'required',
                'Email'=>'required|email|min:1|max:100|unique:users,email',
                'Password'=>'required',
                'Password-again'=>'required|same:Password',
                'Sđt'=>'required',
                'Level'=>'required',
            ],
            [
                'Email.required'=>'Bạn chưa nhập Email',
                'Email.min'=>'Email phải có từ 1-100 ký tự',
                'Email.max'=>'Email phải có từ 1-100 ký tự',
                'Email.email'=>'Email không đúng định dạng',
                'Email.unique'=>'Email đã tồn tại',
                'NameND.required'=>'Bạn chưa nhập Tên',
                'Sđt.required'=>'Bạn chưa nhập số điện thoại',
                'Level.required'=>'Bạn chưa chọn cấp bậc',
                'Password.required'=>'Bạn chưa nhập mật khẩu',
                'Password-again.required'=>'Bạn chưa lại mật khẩu',
                'Password-again.same'=>'Mật khẩu nhập lại không chính xác',
            ]
        );
        $user = new User;
        $user->name = "$request->NameND";
        $user->email = $request->Email;
        $user->number = $request->Sđt;
        $user->level = $request->Level;
        $user->password = bcrypt($request->Password);
        $user->save();
        return redirect()->route('show.user')->with('Notification','Thêm người dùng '."[ $user->name ]".' thành công');
    }

    public function getupdate($id){
        $user = User::find($id);
        return view('admin.user.update',['User'=>$user]);
    }

    public function postupdate(Request $request, $id){
        $this->validate($request,
            [
                'NameND'=>'required',
                'Sđt'=>'required',
                'Level'=>'required',
            ],
            [
                'NameND.required'=>'Bạn chưa nhập Tên',
                'Sđt.required'=>'Bạn chưa nhập số điện thoại',
                'Level.required'=>'Bạn chưa chọn cấp bậc',
            ]
        );
        $user = User::find($id);
        $user->name = "$request->NameND";
        $user->number = $request->Sđt;
        $user->level = $request->Level;
        $user->save();
        return redirect()->route('show.user')->with('Notification','Sửa tài khoản '."[ $user->email ]".' thành công');
    }

    public function getdelete($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('show.user')->with('Notification','Xóa người dùng '."[ $user->name ]".' thành công');
    }
}
