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
// Route::get('ldi9b7kal1jyhphm8fsv26ob8m4dec.html',function(){
// 	return view("ldi9b7kal1jyhphm8fsv26ob8m4dec.html");
// });

Route::get('ncovid',function(){
	return view("ncovi");
});

Route::get('/', function () {
    return view('welcome');
});


Route::get('/','FrontEndController@getHome');
Route::get('chitiet/{id}/{tenkhongdau}.html','FrontEndController@getChiTiet');
Route::get('danhmuc/{id}/{tenkhongdau}.html','FrontEndController@getDanhMuc');
Route::post('danhmuc/{id}/{tenkhongdau}.html','FrontEndController@postBinhLuan');
Route::get('seach','FrontEndController@getSeach');
Route::get('all','FrontEndController@getAll');
// Route::get('themnguoidung',function(){
// 	return view('admin.nguoidung.danhsachnguoidung');
// });
//route adminlogin
//

//sử lí giỏ hàng
Route::group(['prefix'=>'GioHang'],function(){
	Route::get('them/{id}.html','GioHangController@getThem');
	Route::get('HienThi.html','GioHangController@getHienThi');
	Route::get('Xoa/{id}.html','GioHangController@getXoa');
	Route::get('CapNhat.html','GioHangController@getCapNhat');
	Route::post('HienThi.html','GioHangController@postMail');
});

Route::get('hoanthanh','GioHangController@hoanthanh');

Route::group(['prefix'=>'adminlogin'],function(){
	Route::get('/','LoginController@getLogin');
	Route::post('/','LoginController@postLogin');
});

//route logout
Route::get('logout',function(){
	Auth::logout();
	return redirect('adminlogin');
})->middleware('Checklogin');

//route admin
Route::group(['prefix'=>'admin','middleware'=>'Checklogin'],function(){
	
	Route::get('dashboard',function(){
		return view('admin.dashboard');
	});

	Route::get('doimk/{id}','NguoiDungController@getDoimk');
	Route::post('doimk/{id}','NguoiDungController@postDoimk');
	//su li danh muc
	Route::group(['prefix'=>'danhmuc'],function(){
		Route::get('danhsach','DanhMucController@getDanhSach');

		Route::get('them','DanhMucController@getThem');
		Route::post('them','DanhMucController@postThem');

		Route::get('sua/{id}','DanhMucController@getSua');
		Route::post('sua/{id}','DanhMucController@postSua');

		Route::get('xoa/{id}','DanhMucController@getXoa');
	});
	//su li san pham
	Route::group(['prefix'=>'sanpham'],function(){
		Route::get('danhsach','SanPhamController@getDanhSach');

		Route::get('them','SanPhamController@getThem');
		Route::post('them','SanPhamController@postThem');

		Route::get('sua/{id}','SanPhamController@getSua');
		Route::post('sua/{id}','SanPhamController@postSua');

		Route::get('xoa/{id}','SanPhamController@getXoa');
	});


	//su li nguoi dung
	Route::group(['prefix'=>'nguoidung','middleware'=>'Phanquyen'],function(){
		Route::get('danhsach','NguoiDungController@getDanhSach');

		Route::get('them','NguoiDungController@getThem');
		Route::post('them','NguoiDungController@postThem');

		Route::get('sua/{id}','NguoiDungController@getSua');
		Route::post('sua/{id}','NguoiDungController@postSua');

		Route::get('xoa/{id}','NguoiDungController@getXoa');
	});

	//su li banner
	Route::group(['prefix'=>'banner','middleware'=>'Phanquyen'],function(){
		Route::get('danhsach','BannerController@getDanhSach');

		Route::get('them','BannerController@getThem');
		Route::post('them','BannerController@postThem');

		Route::get('sua/{id}','BannerController@getSua');
		Route::post('sua/{id}','BannerController@postSua');

		Route::get('xoa/{id}','BannerController@getXoa');
	});


	//su li don hang
	Route::group(['prefix'=>'donhang'],function(){
		Route::get('danhsach','DonHangController@getDanhSach');
		Route::get('chitiet/{id}.html','DonHangController@getChiTiet');

		Route::get('mail/{id}','DonHangController@Mail');
		Route::get('huy/{id}.html','DonHangController@Huy');
	});

	
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//phần này sử để test.
Route::get('soluong','SanPhamController@soluong');