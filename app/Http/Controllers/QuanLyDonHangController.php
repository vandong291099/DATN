<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Order;  
use App\OrderDetails;
use App\Customer;
use App\Shipping;
use App\Coupon;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();


class QuanLyDonHangController extends Controller
{
  public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('trang-chu-admin');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function lietke_donhang()
    {
      $this->AuthLogin();
    	// $lietke_donhang = DB::table('table_dat_hang')
     //    ->join('table_khachhang','table_dat_hang.customer_id','=','table_khachhang.customer_id')
     //    ->select('table_dat_hang.*','table_khachhang.customer_name')
     //    ->orderby('table_dat_hang.order_id','DESC')->get();

     //    $lietke = view('admin.quanlydonhang.lietke_donhang')->with('lietke_donhang',$lietke_donhang);
     //    return view('admin_layout')->with('admin.quanlydonhang.lietke_donhang',$lietke);
        $order = Order::orderby('created_at','DESC')->get();
        return view('admin.quanlydonhang.lietke_donhang')->with(compact('order'));

    }

    public function view_donhang($order_code)
    {
      $this->AuthLogin();
    	 // $chitiet_donhang = DB::table('table_dat_hang')
      //   ->join('table_khachhang','table_dat_hang.customer_id','=','table_khachhang.customer_id')
      //   ->join('table_thongtin_giaohang','table_dat_hang.shipping_id','=','table_thongtin_giaohang.shipping_id')
      //   ->join('table_chitiet_dathang','table_dat_hang.order_id','=','table_chitiet_dathang.order_id')
      //   ->select('table_dat_hang.*','table_khachhang.*','table_thongtin_giaohang.*','table_chitiet_dathang.*')->first();

        $order_details = OrderDetails::where('order_code',$order_code)->get();
        $order = Order::where('order_code',$order_code)->get();
        foreach($order as $key => $ord)
        {
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
        }

        $customer = Customer::where('customer_id',$customer_id)->first();
        $shipping = Shipping::where('shipping_id',$shipping_id)->first();

        $order_details_product = OrderDetails::with('product')->where('order_code', $order_code)->get();

        foreach($order_details_product as $key => $order_d)
        {
            $product_coupon = $order_d->product_coupon;
        }
        if($product_coupon != 'Không')
        {
            $coupon = Coupon::where('coupon_code',$product_coupon)->first();
            $coupon_condition = $coupon->coupon_condition;
            $coupon_number = $coupon->coupon_number;
        }
        else
        {
            $coupon_condition = 'Không';
            $coupon_number = 0;
        }

        // $quanly_donhang  = view('admin.quanlydonhang.xem_donhang')->with('chitiet_donhang',$chitiet_donhang);
        // return view('admin_layout')->with('admin.quanlydonhang.xem_donhang',$quanly_donhang);
        return view('admin.quanlydonhang.xem_donhang')->with(compact('order_details','customer','shipping','coupon_condition','coupon_number','order'));
    }

    public function delete_donhang($order_code)
    {
        DB::table('table_dat_hang')->where('order_code',$order_code)->delete();
        Session::put('message','Xóa đơn hàng thành công');
        return Redirect::to('lietke-donhang');
    }

    public function lietke_khachhang()	
    {
      $this->AuthLogin();
     	 $lay_khachhang = DB::table('table_khachhang')->orderby('customer_id','DESC')->get();

     	 $quanly_khachhang  = view('admin.thongtinkhachhang.xem_khachhang')->with('lay_khachhang',$lay_khachhang);
        return view('admin_layout')->with('admin.thongtinkhachhang.xem_khachhang',$quanly_khachhang);
    }

    public function delete_khachhang($customer_id)
    {
     	DB::table('table_khachhang')->where('customer_id',$customer_id)->delete();
        Session::put('message','Xóa khách hàng thành công');
        return Redirect::to('lietke-khachhang');
    }
}
