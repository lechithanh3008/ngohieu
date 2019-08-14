<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class NguoiDung extends Authenticatable
{
    use Notifiable;

    //
    public $table = 'nguoidung';

    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $_hidden = [
        'password', 'remember_token',
    ];

    public function dat_phong()
    {
        return $this->hasMany('App\DatPhong', 'idnguoidung', 'id');
    }
}
