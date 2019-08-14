<?php

namespace App\Http\Controllers;
use Hash;
use Auth;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    //
    public function getDangNhap()
    {
    	return view('account.login');
    }

    public function postDangNhap(Request $req)
    {
    	$this->validate
    	($req,[
    		'username'=>'required',
    		'password'=>'required'
    	],[]);
    	$credentials = array('username' => $req->username, 'password' => $req->password);
    	// Kiểm tra đăng nhập
    	if(Auth::attempt($credentials, $req->remember))
    	{
    		return redirect()->intended('/');
    	}
    	else
    	{
    		return redirect()->back()->withErrors(['error'=>'Sai tài khoản hoặc mật khẩu']);
    	}
    }

    public function getDangKy()
    {
    	return view('account.register');
    }

    public function postDangKy(Request $req)
    {
    	// Kiểm tra các thông tin 
    	// Nếu không đc sẽ trả về biến $errors đc xử lý bên view
    	$this->validate($req,
    		[
    			'username'=>'required|unique:nguoidung,username',
    			'repassword'=>'required|same:password'
    		], 
    		[
    			'username.unique'=>'Tên đăng nhập bị trùng',
    			'repassword.same'=>'Mật khẩu không trùng khớp'
			]);
			
			$ch = new CuaHang();
			$ch->ten = $req->tench;
			$ch->mota = $req->tench;
			$ch->sdt = $req->sdt;
			$ch->diachi = $req->diachi;
			$ch->save();
    	// Nếu validate thì thêm mới user
		$user = new User();
		$user->username = $req->username;
		//
		// Lưu ý
		// Bắt buộc phải băm mật khẩu ra mới lưu vào cơ sở dữ liệu
		// Hàm Auth khi đăng nhập sẽ kiểm tra điều kiện này
		//
		$user->password = Hash::make($req->password);
		//
		//
		$user->hoten = $req->hoten;
		$user->diachi = $req->diachi;
		$user->sdt = $req->sdt;
		$user->email = $req->email;
		$user->chucuahang = true;
		$user->idcuahang=$ch->id;
		$user->save();
		return redirect()->back()->with(['success'=>'Đăng ký thành công']);
	}
	
	public function getProfile()
	{
		return view('account.thong-tin');
	}

	public function postProfile(Request $req)
	{
		$user = $req->user();
		$user->hoten = $req->hoten;
		$user->diachi = $req->diachi;
		$user->sdt = $req->sdt;
		$user->email = $req->email;
		$user->save();
			return redirect()->back()->with(['success' => 'Cập nhật thành công']);
	}

    public function getDoiMatKhau()
    {
        return view('account.doi-mat-khau');
    }

    public function getDangXuat()
    {
    	Auth::logout();
    	return redirect()->back();
    }

    public function postDoiMatKhau(Request $req)
    {
        // Kiểm tra các thông tin 
        // Nếu không đc sẽ trả về biến $errors đc xử lý bên view
        $this->validate($req,
        [
            'repassword'=>'required|same:newpassword',
        ], 
        [
            'repassword.same'=>'Mật khẩu không trùng khớp',
        ]);
        $user = $req->user();
        if(Hash::check($req->oldpassword, $user->password))
        {
            $user->password = Hash::make($req->newpassword);
            $user->save();
            return redirect()->back()->with(['success'=>'Đổi mật khẩu thành công']);
        }
        else
            return redirect()->back()->withErrors(['error'=>'Mật khẩu cũ không chính xác']);
    }
}
