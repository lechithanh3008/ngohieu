<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Đăng nhập, đăng ký
Route::get('login', [
    'as' => 'login',
    'uses' => 'AccountController@getDangNhap']);
Route::post('login', 'AccountController@postDangNhap');

Route::get('register', 'AccountController@getDangKy');
Route::post('register', 'AccountController@postDangKy');

/////
//////////////
// Yêu cầu phải đăng nhập
Route::group(['middleware' => 'auth'], function () {

    ///////////////
    ////////// Xem lịch và đặt phòng
    ////////////
    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@getIndex']);

    Route::get('thong-tin', 'AccountController@getProfile');
    Route::post('thong-tin', 'AccountController@postProfile');

    Route::get('doi-mat-khau', 'AccountController@getDoiMatKhau');
    Route::post('doi-mat-khau', 'AccountController@postDoiMatKhau');
    //Đăng xuất
    Route::get('dang-xuat', [
        'as' => 'logout',
        'uses' => 'AccountController@getDangXuat']);


    Route::get('phong-hop', 'PhongController@getDanhSach');
    Route::get('co-so', 'CoSoController@getDanhSach');
    Route::get('thiet-bi', 'ThietBiController@getDanhSach');

    Route::group(['prefix' => 'dat-lich'], function () {
        Route::get('/', 'DatPhongController@getLich');
        Route::get('danh-sach', 'DatPhongController@getDanhSach');   
        Route::get('chi-tiet/{id?}', 'DatPhongController@getChiTiet');
        Route::post('chi-tiet/{id?}', 'DatPhongController@postChiTiet'); 
        Route::post('xoa', 'DatPhongController@postXoa');
    });
    


    //
    // Laravel File Manager
    //
    Route::get('/lfm', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    Route::post('/lfm/upload', ['as' => 'unisharp.lfm.upload', 'uses' => '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload']);

});

//
//
// admin Dashboard
//
Route::group(['middleware' => ['auth', 'checkadmin']], function () {
    Route::get('cai-dat', 'AdminController@getConfig');
    Route::post('cai-dat', 'AdminController@postConfig');

    Route::group(['prefix' => 'dat-lich'], function () {
        Route::post('duyet', 'DatPhongController@postDuyet');
    });

    Route::group(['prefix' => 'nguoi-dung'], function () {
        Route::get('/', 'NguoiDungController@getDanhSach');
        Route::get('chi-tiet/{id?}', 'NguoiDungController@getChiTiet');
        Route::post('chi-tiet/{id?}', 'NguoiDungController@postChiTiet');
    });

    Route::group(['prefix' => 'co-so'], function () {
        Route::get('chi-tiet/{id?}', 'CoSoController@getChiTiet');
        Route::post('chi-tiet/{id?}', 'CoSoController@postChiTiet');
        Route::post('xoa', 'CoSoController@postXoa');
    });

    Route::group(['prefix' => 'thiet-bi'], function () {
        Route::get('chi-tiet/{id?}', 'ThietBiController@getChiTiet');
        Route::post('chi-tiet/{id?}', 'ThietBiController@postChiTiet');
        Route::post('xoa', 'ThietBiController@postXoa');
    });

    Route::group(['prefix' => 'phong-hop'], function () {
        Route::get('chi-tiet/{id?}', 'PhongController@getChiTiet');
        Route::post('chi-tiet/{id?}', 'PhongController@postChiTiet');
        Route::post('xoa', 'PhongController@postXoa');
    });

});

View::share('pre_url', env('APP_URL'));
View::share('pre_folder', '');
