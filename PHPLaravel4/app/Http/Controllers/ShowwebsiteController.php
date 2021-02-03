<?php

namespace App\Http\Controllers;

use App\Loaitin;
use App\Theloai;
use App\Tintuc;
use Illuminate\Http\Request;

class ShowwebsiteController extends Controller
{
    //
    public function gethome(Request $request){
            $theloaihome = Theloai::paginate(7);
        return view('user.tintuc.home', ['Theloaihome' => $theloaihome,'keyword' => $request->keyword]);
    }
    //
    public function getdetail($id){
        $tintuc = Tintuc::find($id);
        $tinnoibat = Tintuc::where('noibat', 1)->take(2)->get();
        $tinlienqua = Tintuc::where('idloaitin',$tintuc->idloaitin)->take(2)->get();
        return view('user.tintuc.detail',['Tintuc'=>$tintuc,'Tinnoibat'=>$tinnoibat,'Tinlienquan'=>$tinlienqua]);
    }
    //
    public function getloaitin($id){
        $loaitin = Loaitin::find($id);
        $tintuc = Tintuc::where('idloaitin',$id)->paginate(7);
        return view('user.tintuc.loaitin',['Loaitin'=>$loaitin,'Tintuc'=>$tintuc]);
    }
    //
    public function gettimkiem(Request $request){
        $tukhoa = $request->Tukhoa;
        $tintuc = Tintuc::where('tieude','like',"%$tukhoa%")->orwhere('tomtat','like',"%$tukhoa%")
            ->take(30)->paginate(7);
        return view('user.tintuc.timkiem',['Tintuc'=>$tintuc,'Tukhoa'=>$tukhoa]);
    }
}
