<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loaitin extends Model
{
    //
    protected $table = 'loaitin';

    public function theloai()
    {
        return $this->belongsTo('App\Theloai','idtheloai','id');
    }

    public function tintuc()
    {
        return $this->hasMany('App\Tintuc','idloaitin','id');
    }
}
