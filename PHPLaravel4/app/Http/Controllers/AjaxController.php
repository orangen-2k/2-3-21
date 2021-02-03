<?php

namespace App\Http\Controllers;

use App\Loaitin;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //
    public function getloaitin($idtheloai){
        $loaitin = Loaitin::where('idtheloai',$idtheloai)->get();
        foreach ($loaitin as $item)
        {
            echo "<option value='".$item->id."'>".$item->ten."</option>";
        }
    }
}
