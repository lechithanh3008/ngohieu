<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\DonHang;
use App\User;
use App\Classes;

use Storage;

class AdminController extends Controller
{
    //

    public function getConfig()
    {
        return view('cai-dat');
    }

    public function postConfig(Request $req)
    {
        Classes::updateDotEnv('APP_NAME', $req->name);
        Classes::updateDotEnv('APP_DESCRIPTION', $req->description);
        Classes::updateDotEnv('APP_URL', $req->url);
        Classes::updateDotEnv('SITE_EMAIL', $req->email);
        Classes::updateDotEnv('SITE_PHONE', $req->phone);
        Classes::updateDotEnv('TIME_ZONE', $req->timezone);

        Classes::updateDotEnv('NUM_ITEM', $req->numitem);
        Classes::updateDotEnv('NUM_ITEM_ADMIN', $req->numitemadmin);
        //return env('APP_DESCRIPTION');

        return redirect()->back()->with(['success' => 'Cập nhật thành công']);
    }

}
