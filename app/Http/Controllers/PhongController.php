<?php

namespace App\Http\Controllers;

use App\Phong;
use App\CoSo;
use Illuminate\Http\Request;

class PhongController extends Controller
{
    //
    public function getDanhSach()
    {
        $items = Phong::all();
        return view('phong-hop.danh-sach', compact('items'));
    }

    public function getChiTiet(Request $req)
    {
        $item = new Phong();
        if ($req->id) {
            $item = Phong::find($req->id);
            if (!$item) {
                abort(404);
            }

        }
        $cosos = CoSo::all();
        return view('phong-hop.chi-tiet', compact('item', 'cosos'));
    }

    public function postChiTiet(Request $req)
    {
        $this->validate($req,
            [
                'tenphong' => 'required',
                'idcoso' => 'required',
            ],
            [
                'tenphong.required' => 'Tên phòng không được để trống',
                'idcoso.required' => 'Cơ sở không được để trống',
            ]);

        $item = new Phong();
        if ($req->id) {
            $item = Phong::find($req->id);
            if (!$item) {
                abort(404);
            }

        }
        $item->tenphong = $req->tenphong;
        $item->mota = $req->mota;
        $item->idcoso = $req->idcoso;

        $item->save();
        return redirect()->back()->with(['success' => 'Thao tác thành công']);
    }

    public function postXoa(Request $req)
    {
        $item = null;
        if ($req->id) {
            $item = Phong::find($req->id);
        }
        if (!$item) {
            abort(404);
        }

        $item->delete();
        return redirect()->back()->with(['success' => 'Đã xóa!']);

    }
}
