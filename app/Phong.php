<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phong extends Model
{
    //
    public $table = 'phong';

    public $timestamps = false;

    public function co_so()
    {
        return $this->belongsTo('App\CoSo', 'idcoso', 'id');
    }
}
