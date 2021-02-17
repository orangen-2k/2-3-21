<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Tintuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //

    public function getdelete($id, $idtintuc){
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->route('update.news',['id'=>$idtintuc])->with('Notification','Xóa comment '."[ $comment->noidung ]".' thành công');
    }

    public function postcomment($id, Request $request){
        $idtintuc = $id;
        $tintuc = Tintuc::find($id);
        $comment = new Comment;
        $comment->idtintuc = $idtintuc;
        $comment->tintuc_id = $idtintuc;
        $comment->iduser = Auth::user()->id;
        $comment->noidung = $request->Noidung;
        $comment->save();
        return redirect()->route('detail.home',['id'=>$tintuc->id,'tinkhongdau'=>$tintuc->tieudekhongdau]);
    }
}
