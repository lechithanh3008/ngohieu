<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Classes;

use Session;
use App\CoSo;
use App\Phong;
use App\NguoiDung;
use App\DatPhong;

class HomeController extends Controller
{
    //
    public function getIndex()
    {
        $coso = CoSo::count();
        $phong = Phong::count();
        $nguoidung = NguoiDung::count();
        $datphong = DatPhong::count();
    	return view('home', compact('coso', 'phong', 'nguoidung', 'datphong'));
    }

    public function getList(Request $req) 
    {
        // Phan trang
        $sanphams = SanPham::where('trangthai', true)->orderBy('created_at', 'DESC')->paginate(env('NUM_ITEM'));
        return view('san-pham.san-pham', compact('sanphams'));
    }

    public function getSearch(Request $req) 
    {
        if(!$req->key)
            return redirect('/shop');
        else
        {
            $cnt = SanPham::where('trangthai', true)->where('tensp', 'like', '%'.$req->key.'%')->count();
            $sanphams = SanPham::where('trangthai', true)->where('tensp', 'like', '%'.$req->key.'%')->paginate(env('NUM_ITEM'));
            $key = $req->key;
            return view('san-pham.tim-kiem', compact('sanphams', 'key', 'cnt'));
        }
    }

    public function getDetail(Request $req) 
    {
        // Check exsist
        $sanpham = SanPham::where('slug', $req->slug)->first();
        if($sanpham)
        {            
            $sanpham->increment('luotxem');

            $sanphams = SanPham::where('idloai', $sanpham->idloai)->orWhere('idnhacc', $sanpham->idnhacc);
            
            $recommend = $sanphams->inRandomOrder()->take(10)->get();
          
            return view('san-pham.chi-tiet-san-pham', compact('sanpham', 'recommend'));
        }
        else
        {
            abort(404);
        }
    }

}
