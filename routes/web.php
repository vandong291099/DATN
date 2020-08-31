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
//trang chu home
Route::get('/','HomeController@index' );
Route::get('/trang-chu','HomeController@index');
Route::get('/san-pham','HomeController@san_pham');
Route::post('/tim-kiem','HomeController@tim_kiem');

//trang chu admin
Route::get('/admin','AdminController@index');
Route::get('/logout','AdminController@logout');
Route::get('/trang-chu-admin','AdminController@trang_chu_admin');
Route::post('/admin-taikhoan','AdminController@admin_taikhoan');

//danh muc san pham admin
Route::get('/them-danhmuc','DanhMucController@them_danhmuc');
Route::get('/lietke-danhmuc','DanhMucController@lietke_danhmuc');
Route::post('/save-danhmuc','DanhMucController@save_danhmuc');

Route::get('/edit-danhmuc/{category_product_id}','DanhMucController@edit_danhmuc');
Route::get('/delete-danhmuc/{category_product_id}','DanhMucController@delete_danhmuc');

Route::get('/unactive-danhmuc/{category_product_id}','DanhMucController@unactive_danhmuc');
Route::get('/active-danhmuc/{category_product_id}','DanhMucController@active_danhmuc');

Route::post('/capnhat-danhmuc/{category_product_id}','DanhMucController@capnhat_danhmuc');

//thuong hieu san pham amin
Route::get('/them-thuonghieu','ThuongHieuController@them_thuonghieu');
Route::get('/lietke-thuonghieu','ThuongHieuController@lietke_thuonghieu');
Route::post('/save-thuonghieu','ThuongHieuController@save_thuonghieu');

Route::get('/edit-thuonghieu/{brand_product_id}','ThuongHieuController@edit_thuonghieu');
Route::get('/delete-thuonghieu/{brand_product_id}','ThuongHieuController@delete_thuonghieu');

Route::get('/unactive-thuonghieu/{brand_product_id}','ThuongHieuController@unactive_thuonghieu');
Route::get('/active-thuonghieu/{brand_product_id}','ThuongHieuController@active_thuonghieu');

Route::post('/capnhat-thuonghieu/{brand_product_id}','ThuongHieuController@capnhat_thuonghieu');


//san pham amin
Route::get('/them-sanpham','SanPhamController@them_sanpham');
Route::get('/lietke-sanpham','SanPhamController@lietke_sanpham');
Route::post('/save-sanpham','SanPhamController@save_sanpham');
Route::get('/edit-sanpham/{product_id}','SanPhamController@edit_sanpham');
Route::get('/delete-sanpham/{product_id}','SanPhamController@delete_sanpham');
Route::post('/capnhat-sanpham/{product_id}','SanPhamController@capnhat_sanpham');

Route::get('/unactive-product/{product_id}','SanPhamController@unactive_product');
Route::get('/active-product/{product_id}','SanPhamController@active_product');

//quan ly don hang admin
Route::get('/lietke-khachhang','QuanLyDonHangController@lietke_khachhang');
Route::get('/delete-khachhang/{customer_id}','QuanLyDonHangController@delete_khachhang');
Route::get('/lietke-donhang','QuanLyDonHangController@lietke_donhang');
Route::get('/view-donhang/{order_code}','QuanLyDonHangController@view_donhang');
Route::get('/delete-donhang/{order_code}','QuanLyDonHangController@delete_donhang');
Route::post('/update-order','OrderController@update_order');

//ma giam gia admin
Route::post('/check-coupon','GioHangController@check_coupon');
Route::get('/them-ma-giam-gia','MaGiamGiaController@them_ma_giam_gia');
Route::post('/save-ma-giam-gia','MaGiamGiaController@save_ma_giam_gia');
Route::get('/lietke-ma-giam-gia','MaGiamGiaController@lietke_ma_giam_gia');
Route::get('/delete-magiamgia/{coupon_id}','MaGiamGiaController@delete_magiamgia');

//lien he admin
Route::get('/lietke-lienhe','LienHeController@lietke_lienhe');
Route::get('/delete-lienhe/{contact_id}','LienHeController@delete_lienhe');


//tin tuc admin
Route::get('/them-tintuc','TinTucController@them_tintuc');
Route::get('/lietke-tintuc','TinTucController@lietke_tintuc');
Route::post('/save-tintuc','TinTucController@save_tintuc');
Route::get('/delete-tintuc/{post_id}','TinTucController@delete_tintuc');


//danh muc va thuong hieu san pham home
Route::get('/danh-muc-san-pham/{category_slug}','HomeController@danhmuc_theo_sanpham');
Route::get('/them-gio-hang/{id}','HomeController@them_gio_hang_danhmuc');
Route::get('/shoplaravel/xoa-gio-hang/{id}','HomeController@xoa_gio_hang_danhmuc');

Route::get('/thuong-hieu-san-pham/{brand_slug}','HomeController@thuonghieu_theo_sanpham');

// chi tiet san pham home
Route::get('/chi-tiet-san-pham/{product_slug}','HomeController@chi_tiet_san_pham');
Route::get('/them-gio-hang/{id}','HomeController@them_gio_hang_chitiet');
Route::get('/shoplaravel/xoa-gio-hang/{id}','HomeController@xoa_gio_hang_chitiet');
	
//gio hang home
Route::get('/gio-hang','GioHangController@gio_hang');
Route::get('/them-gio-hang/{id}','GioHangController@them_gio_hang');
Route::get('/xoa-gio-hang/{id}','GioHangController@DeleteItemCart');
Route::get('/xoa-danh-sach-gio-hang/{id}','GioHangController@DeleteListItemCart');
Route::get('/save-danh-sach-gio-hang/{id}/{quanty}','GioHangController@SaveListItemCart');


//thanh toan home
Route::get('/dangnhap-thanhtoan','ThanhToanController@dangnhap_thanhtoan');
Route::get('/dangxuat-thanhtoan','ThanhToanController@dangxuat_thanhtoan');
Route::get('/dangky-thanhtoan','ThanhToanController@dangky_thanhtoan');
Route::get('/thanh-toan','ThanhToanController@thanh_toan');
Route::post('/save-thanh-toan','ThanhToanController@save_thanh_toan');
Route::get('/hinhthuc-thanhtoan','ThanhToanController@hinhthuc_thanhtoan');
Route::post('/dat-hang','ThanhToanController@dat_hang');
Route::get('/camon-muahang','ThanhToanController@camon_muahang');


//khach hang home
Route::post('/dangky-khachhang','ThanhToanController@dangky_khachhang');
Route::post('/dangnhap-khachkhang','ThanhToanController@dangnhap_khachhang');


//lien he home
Route::get('/lien-he','HomeController@lien_he');
Route::post('/save-lienhe','HomeController@save_lienhe');

//tin tuc home
Route::get('/tin-tuc','HomeController@tin_tuc');
Route::get('/chitiet-tintuc/{post_id}','HomeController@chitiet_tintuc');




