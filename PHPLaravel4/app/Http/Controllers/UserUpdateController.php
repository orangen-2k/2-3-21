<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserUpdateController extends Controller
{
    //
    public function getinformation()
    {
        $auth = Auth::user();
        return view('admin.user-update.information');
    }

    public function postinformation(Request $request)
    {
        $this->validate($request,
            [
                'Hotendem'=>'required',
                'Ten'=>'required',
            ],
            [
                'Hotendem.required'=>'Bạn chưa nhập họ tên đệm',
                'Ten.required'=>'Bạn chưa nhập tên',
            ]
        );
        $user = Auth::user();
        $user->username = $request->Hotendem;
        $user->name = $request->Ten;
        $user->save();
        return redirect()->route('user.update.information')->with('Notification','Thay đổi thông tin thành công');
    }


    public function getpassword()
    {
        $auth = Auth::user();
        return view('admin.user-update.password');
    }

    public function postpassword(Request $request)
    {
        if (!(Hash::check($request->get('Password'), Auth::user()->password))) {
            return redirect()->back()
                ->with("error","Mật khẩu cũ không chính xác! Vui lòng kiểm tra lại.");
        }
        $this->validate($request,
            [
                'Passwordnew'=>'required',
                'Passwordnew-again'=>'required|same:Passwordnew',
            ],
            [
                'Password.required'=>'Bạn chưa nhập mật khẩu cũ',
                'Passwordnew.required'=>'Bạn chưa nhập mật khẩu mới',
                'Passwordnew-again.same'=>'Mật khẩu mới nhập lại không chính xác',
            ]
        );
        $user = Auth::user();
        $user->password = bcrypt($request->Passwordnew);
        $user->save();
        return redirect()->route('user.update.password')->with('Notification','Thay đổi mật khẩu thành công');
    }


    public function getimage()
    {
        $auth = Auth::user();
        return view('admin.user-update.information');
    }

    public function postimage(Request $request)
    {
        $user = Auth::user();
        if ($request->hasFile('Hinhanh')){
            $file = $request->file('Hinhanh');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                return redirect()->route('add.slide')->with('Error','Thêm  hình ảnh thất bại');
            }
            $name = $file->getClientOriginalName();
            $hinhanh = quickRandom(5)."_".$name;
            while (file_exists("image".$hinhanh)){
                $hinhanh = quickRandom(5)."_".$name;
            }
            $file->move("image",$hinhanh);
            $user->avatar = $hinhanh;
        }else{
            $user->avatar = "nen.jpg";
        }
        $user->save();
        return redirect()->route('user.update.information')->with('image','Thay đổi ảnh thành công');
    }
}
