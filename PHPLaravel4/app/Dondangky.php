<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dondangky extends Model
{
    //
    protected $table = 'dondangky';

    public function user()
    {
        return $this->belongsTo('App\User','iduser','id');
    }
}
