<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theloai extends Model
{
    //
    protected $table = 'theloai';

    public function loaitin()
    {
        return $this->hasMany('App\Loaitin','idtheloai','id');
    }
    // xem thể loại có bn tin tức
    public function tintuc()
    {
        return $this->hasManyThrough('App\Tintuc','App\Loaitin',
            'idtheloai','idloaitin','id');
    }

}
