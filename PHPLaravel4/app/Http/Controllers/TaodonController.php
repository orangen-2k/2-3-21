<?php

namespace App\Http\Controllers;

use App\Dondangky;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TaodonController extends Controller
{
    public function getdondangky(){
        return view('user.tintuc.dondangky');
    }

    public function postdondangky(Request $request){
        $this->validate($request,
            [
                'hotendem'=>'required',
                'ten'=>'required',
                'gioitinh'=>'required',
                'ngay_sinh'=>'required',
                'diachi'=>'required',
                'thanhpho'=>'required',
                'gioithieu'=>'required',
                'anhbe'=>'required',
                'dien_thoai_dang_ki'=>'required|unique:users,phonenumber|unique:dondangky,sodienthoai',
                'email_dang_ky'=>'required|unique:users,email|unique:dondangky,email',
            ],
            [
                'hotendem.required'=>'Bạn chưa nhập tên đệm',
                'ten.required'=>'Bạn chưa nhập têm',
                'gioitinh.required'=>'Bạn chưa chọn giới tính',
                'ngay_sinh.required'=>'Bạn chưa nhập ngày sinh ',
                'diachi.required'=>'Bạn chưa nhập địa chỉ',
                'thanhpho.required'=>'Bạn chưa nhập thành phố',
                'gioithieu.required'=>'Bạn chưa nhập giới thiệu',
                'anhbe.required'=>'Bạn chưa chọn ảnh ',
                'dien_thoai_dang_ki.required'=>'Bạn chưa nhập số điện thoại đăng ký',
                'dien_thoai_dang_ki.unique'=>'Số điện thoại đăng ký đã tồn tại',
                'email_dang_ky.required'=>'Bạn chưa nhập email đăng ký',
                'email_dang_ky.unique'=>'Email đăng ký đã tồn tại',
            ]
        );
        $dondangky = new  Dondangky();
        $dondangky->hodem = $request->hotendem;
        $dondangky->ten = $request->ten;
        $dondangky->gioitinh = $request->gioitinh;
        $dondangky->ngaysinh = $request->ngay_sinh;
        $dondangky->diachi = $request->diachi;
        $dondangky->thanhpho = $request->thanhpho;
        $dondangky->gioithieu = $request->gioithieu;
        if ($request->hasFile('anhbe')){
            $file = $request->file('anhbe');
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
            $dondangky->anh = $hinhanh;
        }
        $dondangky->sodienthoai = $request->dien_thoai_dang_ki;
        $dondangky->email = $request->email_dang_ky;
        $dondangky->trangthai = '0';
        $dondangky->iduser = Auth::user()->id;
        $dondangky->save();
        Session::put('Donndangky', $request->email_dang_ky);
        return redirect()->route('xacnhandon.home')->with('Notification','Chúng tôi sẽ phải hồi sớm nhất cho bạn');
    }

    public function getxacnhandon(){
        $ssdondangky = Session::get('Donndangky');
        $iddindangky = Dondangky::select('id')->where('email', $ssdondangky)->get();
        $dondangky = Dondangky::find($iddindangky[0]['id']);
        return view('user.tintuc.xacnhandangky',['Dondangky'=>$dondangky]);
    }

    public function postxacnhandon(){
        $ssdondangky = Session::get('Donndangky');
        $iddindangky = Dondangky::select('id')->where('email', $ssdondangky)->get();
        $dondangky = Dondangky::find($iddindangky[0]['id']);
        $dondangky->delete();
        return redirect()->route('dondangky.home');
    }
}
