<?php

namespace App\Http\Controllers;

use App\Loaitin;
use App\Theloai;
use App\Tintuc;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TintucController extends Controller
{
    //
    public function getshow(Request $request){
        if($request->tieude){
            $news = Tintuc::where(
                'tieude', 'like', "%".$request->tieude."%"
            )->paginate(10);
            $news->withPath('?tieude=' . $request->tieude);
        }else{
            $news = Tintuc::orderBy('id','desc')->paginate(10);
        }
        return view('admin.tintuc.show', ['News' => $news,'keyword' => $request->tieude]);
    }

    public function getadd(){
        $type_of_news = Loaitin::all();
        $category = Theloai::all();
        return view('admin.tintuc.add',['Type_of_news'=>$type_of_news,'Category'=>$category]);
    }

    public function postadd(Request $request){
        $this->validate($request,
            [
                'Theloai'=>'required',
                'Loaitin'=>'required',
                'Tieude'=>'required|min:1|max:100|unique:loaitin,ten',
                'Tomtat'=>'required',
                'Noidung'=>'required',
                'Noibat'=>'required',
            ],
            [
                'Tieude.required'=>'Bạn chưa nhập tiêu đề',
                'Tieude.min'=>'Tên tiêu đề phải có từ 1-100 ký tự',
                'Tieude.max'=>'Tên tiêu đề phải có từ 1-100 ký tự',
                'Tieude.unique'=>'Tên tiêu đề đã tồn tại',
                'Theloai.required'=>'Bạn chưa chọn thể loại',
                'Loaitin.required'=>'Bạn chưa chọn loại tin',
                'Tomtat.required'=>'Bạn chưa nhập tóm tắt',
                'Noidung.required'=>'Bạn chưa nhập mội dung',
                'Noibat.required'=>'Bạn chưa chọn nổi bật',
            ]
        );
        $news = new Tintuc;
        $news->tieude = "$request->Tieude";
        $news->tieudekhongdau = changeTitle($request->Tieude);
        $news->noidung = $request->Noidung;
        $news->tomtat = $request->Tomtat;
        $news->noibat = $request->Noibat;
        $news->soluotxem = 0;

        $news->idloaitin = $request->Loaitin;
        $news->loaitin_id = $request->Loaitin;
        if ($request->hasFile('Hinhanh')){
            $file = $request->file('Hinhanh');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                return redirect()->route('add.news')->with('Error','Thêm  hình ảnh thất bại');
            }
            $name = $file->getClientOriginalName();
            $hinhanh = quickRandom(5)."_".$name;
            while (file_exists("image".$hinhanh)){
                $hinhanh = quickRandom(5)."_".$name;
            }
            $file->move("image",$hinhanh);
            $news->hinh = $hinhanh;
        }else{
            $news->hinh = "nen.jpg";
        }
        $news->save();
        return redirect()->route('show.news')->with('Notification','Thêm tin '."[ $news->tieude ]".' thành công');
    }

    public function getupdate($id){
        $news = Tintuc::find($id);
        $type_of_news = Loaitin::all();
        $category = Theloai::all();
        return view('admin.tintuc.update',['News'=>$news,'Type_of_news'=>$type_of_news,'Category'=>$category]);
    }

    public function postupdate(Request $request, $id){
        $this->validate($request,
            [
                'Theloai'=>'required',
                'Loaitin'=>'required',
                'Tieude'=>'required|min:1|max:100|unique:loaitin,ten',
                'Tomtat'=>'required',
                'Noidung'=>'required',
                'Noibat'=>'required',
            ],
            [
                'Tieude.required'=>'Bạn chưa nhập tiêu đề',
                'Tieude.min'=>'Tên tiêu đề phải có từ 1-100 ký tự',
                'Tieude.max'=>'Tên tiêu đề phải có từ 1-100 ký tự',
                'Tieude.unique'=>'Tên tiêu đề đã tồn tại',
                'Theloai.required'=>'Bạn chưa chọn thể loại',
                'Loaitin.required'=>'Bạn chưa chọn loại tin',
                'Tomtat.required'=>'Bạn chưa nhập tóm tắt',
                'Noidung.required'=>'Bạn chưa nhập mội dung',
                'Noibat.required'=>'Bạn chưa chọn nổi bật',
            ]
        );
        $news = Tintuc::find($id);
        $news->tieude = "$request->Tieude";
        $news->tieudekhongdau = changeTitle($request->Tieude);
        $news->noidung = $request->Noidung;
        $news->tomtat = $request->Tomtat;
        $news->noibat = $request->Noibat;
        $news->soluotxem = 0;

        $news->idloaitin = $request->Loaitin;
        $news->loaitin_id = $request->Loaitin;
        if ($request->hasFile('Hinhanh')){
            $file = $request->file('Hinhanh');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                return redirect()->route('update.news',['id'=>$id])->with('Error','Sửa  hình ảnh thất bại');
            }
            $name = $file->getClientOriginalName();
            $hinhanh = quickRandom(5)."_".$name;
            while (file_exists("image".$hinhanh)){
                $hinhanh = quickRandom(5)."_".$name;
            }
            $file->move("image",$hinhanh);
            $news->hinh = $hinhanh;
        }
        $news->save();
        return redirect()->route('show.news')->with('Notification','Sửa tin tức '."[ $news->tieude ]".' thành công');
    }

    public function getdelete($id){
        $news = Tintuc::find($id);
        $news->delete();
        return redirect()->route('show.news')->with('Notification','Xóa tin '."[ $news->tieude ]".' thành công');
    }
}
