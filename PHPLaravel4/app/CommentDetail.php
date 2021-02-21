<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentDetail extends Model
{
    //
    protected $table = 'commentdetail';

    public function conment()
    {
        return $this->belongsTo('App\Comment','idcomment','id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','iduser','id');
    }
}
