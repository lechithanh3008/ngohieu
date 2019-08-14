<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoSo extends Model
{
    ////
    public $table = 'coso';

    public $timestamps = false;

    public function phong()
    {
        return $this->hasMany('App\Phong', 'idcoso', 'id');
    }
}
