<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NguoiDung;
use Hash;

class NguoiDungController extends Controller
{
    //
    public function getDanhSach()
    {
        $items = NguoiDung::where('username', '!=', 'admin')->get();
    	return view('nguoi-dung.danh-sach', compact('items'));
    }

    public function getChiTiet(Request $req)
    {
        $item = new NguoiDung();
        if($req->id)
        {
            $item = NguoiDung::find($req->id);
            if(!$item)
                abort(404);
        }
        return view('nguoi-dung.chi-tiet', compact('item'));
    }

    public function postChiTiet(Request $req)
    {
        $this->validate($req,
        [
            'username'=>'required',
        ], 
        [
            'username.required'=>'Tên đăng nhập không được để trống',
        ]);

        $item = new NguoiDung();
        if($req->id)
        {
            $item = NguoiDung::find($req->id);
            if(!$item)
                abort(404);
		}
		else { 		// Thêm mới thì mới tạo mật khẩu
			$item->username = $req->username;
			$item->password = Hash::make($req->password);
		}
        $item->hoten = $req->hoten;
        $item->email = $req->email;
        $item->diachi = $req->diachi;
		$item->sdt = $req->sdt;
		
		if($req->datphong == 'on')
			$item->datphong=true;
		else {
			$item->datphong= false;
		}
		if($req->admin == 'on')
			$item->admin=true;
		else {
			$item->admin= false;
		}

        $item->save();
        return redirect()->back()->with(['success' => 'Thao tác thành công']);
    }

}
