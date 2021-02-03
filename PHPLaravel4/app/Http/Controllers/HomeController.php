<?php

namespace App\Http\Controllers;

use App\Mail\SendMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    //
    public function mail(){
        $name = 'Chien';
        Mail::to('orangen2000k@gmail.com')->send(new SendMailable($name));
        return 'Đã gửi mail';
    }
}
