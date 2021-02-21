<?php

namespace App\Http\Controllers;

use App\Theloai;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function getshow(Request $request){
        if($request->tentheloai){

            $category = Theloai::where(
                'ten', 'like', "%".$request->tentheloai."%"
            )->paginate(10);
            $category->withPath('?tentheloai=' . $request->tentheloai);
        }else{
            $category = Theloai::orderBy('id','desc')->paginate(10);
        }
        return view('admin.category.show', ['Category' => $category,'keyword' => $request->tentheloai]);
    }

    public function getadd(){
        return view('admin.category.add');
    }

    public function postadd(Request $request){
        $this->validate($request,
            [
                'NameTL'=>'required|min:3|max:100|unique:theloai,ten'
            ],
            [
                'NameTL.required'=>'Bạn chưa nhập tên thể loại',
                'NameTL.min'=>'Tên thể loại phải có từ 3-100 ký tự',
                'NameTL.max'=>'Tên thể loại phải có từ 3-100 ký tự',
                'NameTL.unique'=>'Tên thể loại đã tồn tại',
            ]
        );
        $category = new Theloai;
        $category->ten = $request->NameTL;
        $category->tenkhongdau = changeTitle($request->NameTL);
        $category->save();
        return redirect()->route('show.category')->with('Notification','Thêm thể loại '."[ $category->ten ]".' thành công');
    }

    public function getupdate($id){
        $category = Theloai::find($id);
        return view('admin.category.update',['Category'=>$category]);
    }

    public function postupdate(Request $request, $id){
        $category = Theloai::find($id);
        $this->validate($request,
            [
                'NameTL'=>'required|unique:theloai,ten|min:3|max:100'
            ],
            [
                'NameTL.required'=>'Bạn chưa nhập tên thể loại',
                'NameTL.min'=>'Tên thể loại phải có từ 3-100 ký tự',
                'NameTL.max'=>'Tên thể loại phải có từ 3-100 ký tự',
                'NameTL.unique'=>'Tên thể loại đã tồn tại',
            ]
        );
        $category->ten = $request->NameTL;
        $category->tenkhongdau =  changeTitle($request->NameTL);
        $category->save();
//        return redirect()->route('update.category', ['id' => $id])->with('thongbao','Sửa thể loại thành công');
        return redirect()->route('show.category')->with('Notification','Sửa thể loại '."[ $category->ten ]".' thành công');
    }

    public function getdelete($id){
        $category = Theloai::find($id);
        $category->delete();
        return redirect()->route('show.category')->with('Notification','Xóa thể loại '."[ $category->ten ]".' thành công');
    }
}
