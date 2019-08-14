<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ThietBi;

class ThietBiController extends Controller
{
    public function getDanhSach()
    {
        $items = ThietBi::all();
        return view('thiet-bi.danh-sach', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getChiTiet(Request $req)
    {
        $item = new ThietBi();
        if($req->id)
        {
            $item = ThietBi::find($req->id);
            if(!$item)
                abort(404);
        }
        return view('thiet-bi.chi-tiet', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postChiTiet(Request $req)
    {
        $this->validate($req,
        [
            'tentb'=>'required',
        ], 
        [
            'tentb.required'=>'Tên thiết bị không được để trống',
        ]);

        $item = new ThietBi();
        if($req->id)
        {
            $item = ThietBi::find($req->id);
            if(!$item)
                abort(404);
        }
        $item->tentb = $req->tentb;
        $item->motatb = $req->motatb;


        $item->save();
        return redirect()->back()->with(['success' => 'Thao tác thành công']);
    }
    public function postXoa(Request $req)
    {
        $item = null;
        if ($req->id) {
            $item = ThietBi::find($req->id);
        }
        if (!$item)
            abort(404);
        
        $item->delete();
        return redirect()->back()->with(['success' => 'Đã xóa!']);

    }

}
