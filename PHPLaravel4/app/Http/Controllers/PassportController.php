<?php

namespace App\Http\Controllers;

use App\Charts\UserChart;
use App\Loaitin;
use App\Mail\SendMailable;
use App\Mail\SendMailNew;
use App\Theloai;
use App\Tintuc;
use App\User;
use \Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use function Illuminate\Support\Facades\App;

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
        $khoahoc = Tintuc::where('idloaitin',1)->count();
        $kythuat = Tintuc::where('idloaitin',2)->count();
        $chinhtri = Tintuc::where('idloaitin',3)->count();
        $phapluat = Tintuc::where('idloaitin',4)->count();
        $congnghe = Tintuc::where('idloaitin',5)->count();
        $xahoi = Tintuc::where('idloaitin',6)->count();
        $congdong = Tintuc::where('idloaitin',7)->count();
        $usersChart = new UserChart;
        $usersChart->minimalist(true);
        $usersChart->labels(['Vui chơi', 'Học tập', 'Nghỉ ngơi', 'Môi trường', 'Hoạt động', 'Thông báo', 'Học phí', ]);
        $usersChart->dataset('Số lượng tin', 'bar', [$khoahoc,$kythuat, $chinhtri, $phapluat,$congnghe,$xahoi, $congdong])
            ->color($borderColors)
            ->backgroundcolor($fillColors);
        return view('admin.chart', [ 'usersChart' => $usersChart ] );
    }

    // Truyền đến màn forgot.blade.php
    public function getforgot()
    {
        return view('passport.forgot');
    }

    // Truyền đến màn forgot.blade.php
    public function postforgot(Request $request)
    {
        $this->validate($request,
            [
                'email-forgot'=>'required|email',
            ],
            [
                'email-forgot.required'=>'Bạn chưa nhập tài khoản Email',
                'email-forgot.email'=>'Bạn nhập Email không đúng định dạng',
            ]
        );
        $checkemail = User::where('email',$request->get('email-forgot'))->count();
        Session::put('Email-Forgot', $request->get('email-forgot'));
        if (!$checkemail > 0) {
            return redirect()->back()->with("error","Tài khoản Email không tồn tại");
        }
        Mail::to($request->get('email-forgot'))->send(new SendMailable());
        return redirect()->route('check.forgot');
    }

    // Truyền đến màn forgot.blade.php
    public function getcheckforgot()
    {
        return view('passport.check-forgot');
    }

    // Truyền đến màn forgot.blade.php
    public function postcheckforgot(Request $request)
    {
        $this->validate($request,
            [
                'check-forgot'=>'required',
            ],
            [
                'check-forgot.required'=>'Bạn chưa nhập mã xác nhận',
            ]
        );
        $randumsend = Session::get('Randum');
        if ($request->get('check-forgot') != $randumsend) {
            return redirect()->back()->with("error","Mã xác nhận không chính xác");
        }
        return redirect()->route('update.forgot');
    }

    // Truyền đến màn forgot.blade.php
    public function getupdateforgot()
    {
        return view('passport.update-forgot');
    }

    // Truyền đến màn forgot.blade.php
    public function postupdateforgot(Request $request)
    {
        $this->validate($request,
            [
                'newforgot'=>'required',
                'newagainforgot'=>'required|same:newforgot',
            ],
            [
                'newforgot.required'=>'Bạn chưa nhập mật khẩu mới',
                'newagainforgot.required'=>'Bạn chưa nhập nhập lại mật khẩu mới',
                'newagainforgot.same'=>'Bạn nhập lại mật khẩu không chính xác',
            ]
        );
        $emailforgot = Session::get('Email-Forgot');
        $idforgot = User::select('id')->where('email', $emailforgot)->get();
        $userforgot = User::find($idforgot[0]['id']);
        $userforgot->password = bcrypt($request->newforgot);
        $userforgot->save();
        return view('passport.login');
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
                'UserName'=>'required',
                'Name'=>'required',
                'Email'=>'required|email|min:1|max:100|unique:users,email',
                'Password'=>'required',
                'Password-again'=>'required|same:Password',
            ],
            [
                'UserName.required'=>'Bạn chưa nhập họ và tên',
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
        $user->username = "$request->UserName";
        $user->name = "$request->Name";
        $user->email = $request->Email;
        $user->level = "0";
        $user->password = bcrypt($request->Password);
        $user->save();
        return redirect()->route('login');
    }

    public function postemailnew(Request $request){
        $this->validate($request,
            [
                'emailmew'=>'required|email|unique:users,email',
            ],
            [
                'emailmew.required'=>'Bạn chưa nhập Email',
                'emailmew.email'=>'Bạn chưa nhập đúng định dạng Email',
                'emailmew.unique'=>'Email đã tồn tại',
            ]
        );
        $randumsend = Session::get('Randumnewmail');
        $usernewemail = new User;
        $usernewemail->email = $request->emailmew;
        $usernewemail->level = '0';
        $usernewemail->password = bcrypt($randumsend);
        $usernewemail->save();
        return redirect()->route('home');
        Mail::to($request->get('email-forgot'))->send(new SendMailNew());
        return redirect()->route('home');
    }
}
