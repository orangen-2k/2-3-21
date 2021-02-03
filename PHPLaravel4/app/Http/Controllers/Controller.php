<?php

namespace App\Http\Controllers;

use App\Slide;
use App\Theloai;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    //
    function __construct(){
        $category = Theloai::all();
        $slide = Slide::all();
        view()->share('Category', $category);
        view()->share('Slide', $slide);
        if (Auth::check()){
            view()->share('Nguoidung',Auth::user());
        }
    }
}
