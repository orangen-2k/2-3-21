<?php

namespace App\Http\Controllers;

use App\Charts\UserChart;
use App\Loaitin;
use App\Theloai;
use App\Tintuc;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PassportController extends Controller
{

    // Truyền đến màn admin.blade.php
    public function admin()
    {
        $borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            "rgba(51,105,232, 1.0)",
            "rgba(244,67,54, 1.0)",
            "rgba(34,198,246, 1.0)",
            "rgba(153, 102, 255, 1.0)",
            "rgba(255, 159, 64, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)"
        ];
        $fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
            "rgba(51,105,232, 0.2)",
            "rgba(244,67,54, 0.2)",
            "rgba(34,198,246, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)"

        ];
        $theloai = new Theloai();
        $khoahoc = Loaitin::where('idtheloai',1)->count();
        $kythuat = Loaitin::where('idtheloai',2)->count();
        $chinhtri = Loaitin::where('idtheloai',3)->count();
        $phapluat = Loaitin::where('idtheloai',4)->count();
        $congnghe = Loaitin::where('idtheloai',5)->count();
        $xahoi = Loaitin::where('idtheloai',6)->count();
        $congdong = Loaitin::where('idtheloai',7)->count();
        $hoctap = Loaitin::where('idtheloai',8)->count();;
        $usersChart = new UserChart;
        $usersChart->minimalist(true);
        $usersChart->labels(['Khoa học','Kỹ thuật', 'Chính trị', 'Pháp luật','Công nghệ','Xã hội', 'Cộng đồng', 'Học tập']);
        $usersChart->dataset('Users by trimester', 'bar', [$khoahoc,$kythuat, $chinhtri, $phapluat,$congnghe,$xahoi, $congdong, $hoctap])
            ->color($borderColors)
            ->backgroundcolor($fillColors);
        return view('admin.chart', [ 'usersChart' => $usersChart ] );
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
