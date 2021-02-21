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
            $theloaihome = Theloai::paginate(5);
        return view('user.tintuc.home', ['Theloaihome' => $theloaihome,'keyword' => $request->keyword]);
    }
    //
    public function getdetail($id){
        $tintuc = Tintuc::find($id);
        $tt = Tintuc::where('id',$id)->get();
        $tintuc->soluotxem = $tt[0]['soluotxem'] + 1;
        $tintuc->save();
        $tinnoibat = Tintuc::where('noibat', 1)->take(2)->get();
        $tinlienqua = Tintuc::where('idloaitin',$tintuc->idloaitin)->take(2)->get();
        return view('user.tintuc.detail',['Tintuc'=>$tintuc,'Tinnoibat'=>$tinnoibat,'Tinlienquan'=>$tinlienqua]);
    }
    //
    public function getloaitin($id){
        $loaitin = Loaitin::find($id);
        $tintuc = Tintuc::where('idloaitin',$id)->paginate(5);
        return view('user.tintuc.loaitin',['Loaitin'=>$loaitin,'Tintuc'=>$tintuc]);
    }
    //
    public function gettinmoi(){
        $tintuc = Tintuc::select('*')->orderBy('id','desc')->take(10)->get();
        return view('user.tintuc.tinmoi',['Tintuc'=>$tintuc]);
    }
    //
    public function gettinnong(){
        $tintuc = Tintuc::select('*')->orderBy('soluotxem','desc')->take(10)->get();
        return view('user.tintuc.tinnong',['Tintuc'=>$tintuc]);
    }
    //
    public function gettimkiem(Request $request){
        $tukhoa = $request->Tukhoa;
        $tintuc = Tintuc::where('tieude','like',"%$tukhoa%")->orwhere('tomtat','like',"%$tukhoa%")
            ->take(30)->paginate(5);
        return view('user.tintuc.timkiem',['Tintuc'=>$tintuc,'Tukhoa'=>$tukhoa]);
    }
    //
    public function getdondangky(Request $request){
        return view('user.tintuc.dondangky');
    }
    //
    public function postdondangky(Request $request){
        $tukhoa = $request->Tukhoa;
        $tintuc = Tintuc::where('tieude','like',"%$tukhoa%")->orwhere('tomtat','like',"%$tukhoa%")
            ->take(30)->paginate(5);
        return view('user.tintuc.timkiem',['Tintuc'=>$tintuc,'Tukhoa'=>$tukhoa]);
    }
    //
    public function getxacnhandon(Request $request){
        return view('user.tintuc.xacnhandangky');
    }
    //
    public function postxacnhandon(Request $request){
    }
}
