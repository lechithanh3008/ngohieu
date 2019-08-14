<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThietBi extends Model
{
    public $table = 'thietbi';

    public $timestamps = false;

    public function datphong()
    {
        return $this->hasMany('App\DatPhong', 'idthietbi', 'id');
    }
}
