<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DatPhong;
use App\CoSo;
use App\ThietBi;
class DatPhongController extends Controller
{
    //
    public function getLich(Request $req)
    {   
        $tb = ThietBi::all();
        
        $cosos = CoSo::all();
        $idcs = $req->coso;
        if(!$idcs && $cosos->count() > 0)
            $idcs = CoSo::first()->id;
        $batdau = date('Y-m-01');       // Dau thang nay
        $ketthuc = date('Y-m-t');
        if ($req->batdau)
            $batdau = $req->batdau;
        if ($req->ketthuc)
            $ketthuc = $req->ketthuc;
        $kt = date('Y-m-d H:i:s', strtotime($ketthuc."+1 days -1 seconds"));

        $coso = CoSo::find($idcs);
        $bgs = ['bg-purple', 'bg-yellow', 'bg-red', 'bg-green', 'bg-navy', 'bg-lime', 'bg-fuchsia', 'bg-orange', 'bg-teal', 'bg-blue', 'bg-light-blue'];
        $items = [];
        foreach ($coso->phong()->get() as $key => $phong) {
            $k = $key % count($bgs);
            $datphongs = DatPhong::where('trangthai', 1)
                            ->whereBetween('batdau', [$batdau, $kt])
                            ->where('idphong', $phong->id)->get();
            
            foreach ($datphongs as $dp) {
                $item = new \stdClass();
                $item->tenphong = $phong->tenphong;
                $item->title = $dp->noidung;
                $item->batdau = $dp->batdau;
                $item->ketthuc = $dp->ketthuc;
                $item->songuoi = $dp->songuoi;
                $item->ghichu = $dp->ghichu;
                $item->nguoi = $dp->nguoi_dung()->first()->hoten;
                $item->className = $bgs[$k];
                array_push($items, $item);
            }
        }
        
        return view('dat-lich.lich', compact('cosos','tb', 'idcs', 'batdau', 'ketthuc', 'items'));
    }

    public function getDanhSach(Request $req)
    {
        $us = $req->user();
            $items = DatPhong::where('idnguoidung', $us->id)->orderBy('batdau', 'DESC')->get();
        if($us->admin)
            $items = DatPhong::orderBy('batdau', 'DESC')->get();
    	return view('dat-lich.danh-sach', compact('items'));
    }

    public function getChiTiet(Request $req)
    {
        $us = $req->user();
        if(!$us || (!$us->admin && !$us->datphong))
            return redirect()->back()->withErrors('Không có quyền');

        $item = new DatPhong();
        if($req->id)
        {
            $item = DatPhong::find($req->id);
            if(!$item)
                abort(404);
            else if(!$us->admin && $us->id != $item->idnguoidung)
                return redirect()->back()->withErrors("Không có quyền");
        }
        $tb = ThietBi::all();
        $cosos = CoSo::all();
        return view('dat-lich.chi-tiet', compact('item', 'cosos','tb'));
    }

    public function postChiTiet(Request $req)
    {
        $us = $req->user();
        if(!$us || (!$us->admin && !$us->datphong))
            return redirect()->back()->withErrors('Không có quyền');
            
        $item = new DatPhong();
        $item->idnguoidung = $us->id;
        if($us->admin)
            $item->trangthai = 1;
        if($req->id)
        {
            $item = DatPhong::find($req->id);
            if(!$item)
                abort(404);
            else if(!$us->admin && $us->id != $item->idnguoidung)
                return redirect()->back()->withErrors("Không có quyền");
        }
        $item->idphong = $req->idphong;
        $item->noidung = $req->noidung;
        $item->songuoi = $req->songuoi;
        $item->ghichu = $req->ghichu;
        $item->batdau = $req->batdau;
        $item->ketthuc = $req->ketthuc;

        $item->save();
        return redirect()->back()->with(['success' => 'Thao tác thành công']);
    }

    public function postXoa(Request $req)
    {
        $us = $req->user();
        $item = null;
        if ($req->id) {
            $item = DatPhong::find($req->id);
        }
        if (!$item)
            abort(404);
        else if(!$us->admin && $us->id != $item->idnguoidung)
                return redirect()->back()->withErrors("Không có quyền");
        $item->delete();
        return redirect()->back()->with(['success' => 'Đã xóa!']);

    }

    public function postDuyet(Request $req)
    {
        $us = $req->user();
        $item = null;
        if ($req->id) {
            $item = DatPhong::find($req->id);
        }
        if (!$item)
            abort(404);
        else if(!$us->admin)
            return redirect()->back()->withErrors("Không có quyền");
        $item->trangthai = $req->trangthai;
        $item->ykien = $req->ykien;
        $item->save();
        return redirect()->back()->with(['success' => 'Cập nhật thành công!']);
    }
}
