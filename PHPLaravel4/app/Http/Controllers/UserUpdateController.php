<?php

namespace App\Http\Controllers;

use App\Dondangky;
use App\Mail\SendMailable;
use App\Mail\SendMailNhanDon;
use App\Mail\SendMailXoaDon;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

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
        }
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
        $this->validate($request,
            [
                'Password'=>'required',
                'Passwordnew'=>'required',
                'Passwordnew-again'=>'required|same:Passwordnew',
            ],
            [
                'Password.required'=>'Bạn chưa nhập mật khẩu cũ',
                'Passwordnew.required'=>'Bạn chưa nhập mật khẩu mới',
                'Passwordnew-again.required'=>'Bạn chưa nhập lại mật khẩu mới',
                'Passwordnew-again.same'=>'Mật khẩu mới nhập lại không chính xác',
            ]
        );
        if (!(Hash::check($request->get('Password'), Auth::user()->password))) {
            return redirect()->back()
                ->with("error","Mật khẩu cũ không chính xác! Vui lòng kiểm tra lại.");
        }
        $user = Auth::user();
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
        }
        $user->password = bcrypt($request->Passwordnew);
        $user->save();
        return redirect()->route('user.update.password')->with('Notification','Thay đổi mật khẩu thành công');
    }

    public function showxacnhandangky(Request $request){
        if($request->tenemail){
            $dondangky = Dondangky::where(
                'email', 'like', "%".$request->tenemail."%"
            )->paginate(10);
            $dondangky->withPath('?tenemail=' . $request->tenemail);
        }else{
            $dondangky = Dondangky::orderBy('id','desc')->paginate(10);
        }
        return view('admin.user-update.checkdondangky', ['Dondangky' => $dondangky,'keyword' => $request->tenemail]);
    }

    public function getxacnhandangky($id)
    {
        $dondangky = Dondangky::find($id);
        return view('admin.user-update.updatedondangky', ['Dondangky'=>$dondangky]);
    }

    public function postxacnhandangky(Request $request, $id)
    {
        $dondangky = Dondangky::find($id);
        Session::put('Iddangky', $id);
        $dondangky->trangthai = 1 ;
        $dondangky->save();
        $useridcheck = User::find($dondangky['iduser']);
        Mail::to($useridcheck['email'])->send(new SendMailNhanDon());
        if($request->tenemail){
            $dondangky = Dondangky::where(
                'email', 'like', "%".$request->tenemail."%"
            )->paginate(10);
            $dondangky->withPath('?tenemail=' . $request->tenemail);
        }else{
            $dondangky = Dondangky::orderBy('id','desc')->paginate(10);
        }
        $email = $useridcheck['email'];
        return redirect()->route('show.dangky', ['Dondangky' => $dondangky,'keyword' => $request->tenemail])
            ->with('Notification','Đã gửi thông tin đến Mail '."[ $email ]");
    }

    public function deletexacnhandangky(Request $request, $id)
    {
        $dondangky = Dondangky::find($id);
        $useridcheck = User::find($dondangky['iduser']);
        Mail::to($useridcheck['email'])->send(new SendMailXoaDon());
        $dondangky->delete();
        if($request->tenemail){
            $dondangky = Dondangky::where(
                'email', 'like', "%".$request->tenemail."%"
            )->paginate(10);
            $dondangky->withPath('?tenemail=' . $request->tenemail);
        }else{
            $dondangky = Dondangky::orderBy('id','desc')->paginate(10);
        }
        return redirect()->route('show.dangky', ['Dondangky' => $dondangky,'keyword' => $request->tenemail])
            ->with('Notification','Đã hủy đơn thành công');
    }
}
