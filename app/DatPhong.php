<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatPhong extends Model
{
    //
    public $table = 'datphong';

    public $timestamps = false;

    public function phong()
    {
        return $this->belongsTo('App\Phong', 'idphong', 'id');
    }

    public function nguoi_dung()
    {
        return $this->belongsTo('App\NguoiDung', 'idnguoidung', 'id');
    }
}
