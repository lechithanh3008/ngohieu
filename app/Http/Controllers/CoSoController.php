<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoSo;

class CoSoController extends Controller
{
    //
    public function getDanhSach()
    {
        $items = CoSo::all();
    	return view('co-so.danh-sach', compact('items'));
    }

    public function getChiTiet(Request $req)
    {
        $item = new CoSo();
        if($req->id)
        {
            $item = CoSo::find($req->id);
            if(!$item)
                abort(404);
        }
        return view('co-so.chi-tiet', compact('item'));
    }

    public function postChiTiet(Request $req)
    {
        $this->validate($req,
        [
            'tencs'=>'required',
        ], 
        [
            'tencs.required'=>'Tên cơ sở không được để trống',
        ]);

        $item = new CoSo();
        if($req->id)
        {
            $item = CoSo::find($req->id);
            if(!$item)
                abort(404);
        }
        $item->tencs = $req->tencs;
        $item->mota = $req->mota;
        $item->diachi = $req->diachi;

        $item->save();
        return redirect()->back()->with(['success' => 'Thao tác thành công']);
    }

    public function postXoa(Request $req)
    {
        $item = null;
        if ($req->id) {
            $item = CoSo::find($req->id);
        }
        if (!$item)
            abort(404);
        $item->delete();
        return redirect()->back()->with(['success' => 'Đã xóa!']);

    }
}
