<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect; //trả về
use Cart;
use App\Shipping;
use App\Order;
Use App\OrderDetails;
session_start();


class ThanhToanController extends Controller
{
    public function dangnhap_thanhtoan()
    {
    	$category_product = DB::table('table_danhmuc')->where('category_status','Hiển thị')->orderby('category_id','DESC')->get(); 
    	
    	return view('pages.thanhtoan.dangnhap_thanhtoan')->with('danhmuc',$category_product);
    }

    public function dangky_thanhtoan()
    {
        $category_product = DB::table('table_danhmuc')->where('category_status','Hiển thị')->orderby('category_id','DESC')->get(); 
        
        return view('pages.thanhtoan.dangki_thanhtoan')->with('danhmuc',$category_product);
    }

    public function dangxuat_thanhtoan()
    {   
        Session::forget('customer_id');
        Session::forget('customer_name');
        Session::forget('coupon');


    	return Redirect::to('/dangnhap-thanhtoan');
    }

    public function dangky_khachhang(Request $request)
    {
        $this->validate($request,[
            'customer_name' => 'required|min:5|max:15',
            'customer_phone' => 'required|min:10|max:10',
            'customer_email' => 'required|email|unique:table_khachhang,customer_email',
            'customer_password' => 'required|min:5|max:15',
            // 'customer_password_again' => 'required|same:password'
           

        ],[
            'customer_name.required' => 'Bạn chưa nhập họ và tên',
            'customer_name.min' => 'Họ và tên phải có ít nhất 5 kí tự',
            'customer_name.max' => 'Họ và tên tối đa 15 kí tự',
            'customer_phone.required' => 'Bạn chưa nhập số điện thoại',
            'customer_phone.min' => 'Số điện thoại phải có ít nhất 10 số',
            'customer_phone.max' => 'Số điện thoại tối đa 10 số',
            'customer_email.required' => 'Bạn chưa nhập email',
            'customer_email.email' => 'Bạn chưa nhập đúng định dạng email',
            'customer_email.unique' => 'Email đã tồn tại',
            'customer_password.required' => 'Bạn chưa nhập mật khẩu',
            'customer_password.min' => 'Mật khẩu phải có ít nhất 5 kí tự',
            'customer_password.max' => 'Mật khẩu tối đa 15 kí tự',
            // 'customer_password_again.required' => 'Bạn chưa nhập lại mật khẩu',
            // 'customer_password_again.same' => 'Mật khẩu nhập lại chưa chính xác'
        ]);

    	$data = array();
    	$data['customer_name'] = $request->customer_name;
    	$data['customer_phone'] = $request->customer_phone;
    	$data['customer_email'] = $request->customer_email;
    	$data['customer_password'] = md5($request->customer_password);

    	$customer_id = DB::table('table_khachhang')->insertGetId($data);

    	Session::put('customer_id',$customer_id);
    	Session::put('customer_name',$request->customer_name);
        return Redirect::to('/thanh-toan');
    	
    }

    public function dangnhap_khachhang(Request $request)
    {
        $this->validate($request,[
            'email_account' => 'required|email',
            'password_account' => 'required|min:3|max:10',
            
           

        ],[
            'email_account.required' => 'Bạn chưa nhập email',
            'email_account.email' => 'Bạn chưa nhập đúng định dạng email',
            'password_account.required' => 'Bạn chưa nhập mật khẩu',
            'password_account.min' => 'Mật khẩu phải có ít nhất 3 kí tự',
            'password_account.max' => 'Mật khẩu phải tối đa 10 kí tự',
        ]);

    	$email = $request->email_account;
        $password = md5($request->password_account);
        $result = DB::table('table_khachhang')->where('customer_email',$email)->where('customer_password',$password)->first();
       
        
        if($result)
        {
            Session::put('customer_id',$result->customer_id);
            Session::put('customer_name',$result->customer_name);
            return Redirect::to('/thanh-toan');
        }
        else
        {   
            Session::put('message','Mật khẩu hoặc tài khoản bị sai.Vui lòng nhập lại');
            return Redirect::to('/dangnhap-thanhtoan');
        }
    }


    public function thanh_toan()
    {
    	$category_product = DB::table('table_danhmuc')->where('category_status','Hiển thị')->orderby('category_id','DESC')->get(); 
    	
    	return view('pages.thanhtoan.thanh_toan')->with('danhmuc',$category_product);
    }

    

    public function hinhthuc_thanhtoan()
    {
        $category_product = DB::table('table_danhmuc')->where('category_status','Hiển thị')->orderby('category_id','DESC')->get(); 
        
        return view('pages.hinhthucthanhtoan.hinhthuc_thanhtoan')->with('danhmuc',$category_product);
    }

    public function save_thanh_toan(Request $request)
    {
        $this->validate($request,[
            'shipping_name' => 'required|min:5|max:25',
            'shipping_email' => 'required|email|',
            'shipping_phone' => 'required|min:10|max:10',
            'shipping_address' => 'required|min:10|max:100'
        ],[
            'shipping_name.required' => 'Bạn chưa nhập họ và tên',
            'shipping_name.min' => 'Họ và tên phải có ít nhất 5 kí tự',
            'shipping_name.max' => 'Họ và tên tối đa 25 kí tự',
            'shipping_email.required' => 'Bạn chưa nhập email',
            'shipping_email.email' => 'Bạn chưa nhập đúng định dạng email',
            'shipping_phone.required' => 'Bạn chưa nhập số điện thoại',
            'shipping_phone.min' => 'Số điện thoại phải có ít nhất 10 số',
            'shipping_phone.max' => 'Số điện thoại tối đa 10 số',
            'shipping_address.required' => 'Bạn chưa nhập địa chỉ',
            'shipping_address.min' => 'Địa chỉ phải có ít nhất 10 kí tự',
            'shipping_address.max' => 'Địa chỉ tối đa 100 kí tự',
        ]);
        $data = $request->all();
        $shipping = new Shipping;
        $shipping->shipping_name = $data['shipping_name'];
        $shipping->shipping_phone = $data['shipping_phone'];
        $shipping->shipping_email = $data['shipping_email'];
        $shipping->shipping_address = $data['shipping_address'];
        $shipping->shipping_note = $data['shipping_note'];
        $shipping->save();

        $shipping_id = $shipping->shipping_id;
        Session::put('shipping_id',$shipping_id);

        return Redirect::to('/hinhthuc-thanhtoan');
    }

    public function dat_hang(Request $request)
    {    
        $this->validate($request,[
            'payment_option' => 'required',
            // 'payment_option' => 'accepted'

        ],[
            'payment_option.required' => 'Hãy chọn 1 trong 2 hình thức thanh toán'
        ]);
         $data = $request->all();
         $data['payment_method'] = $request->payment_option;
         
         $checkout_code = substr(md5(microtime()),rand(0,26),5);
         
         $order = new Order;
         $order->customer_id = Session::get('customer_id');
         $order->shipping_id = Session::get('shipping_id');
         // $order->order_total = Session::get('Cart')->totalPrice;
         $order->order_status = 1;
         $order->order_code = $checkout_code;
         $order->save();

         if(Session::get('Cart')==true)
         {
            foreach(Session::get('Cart')->products as $key => $item)
            {
            $order_details = new OrderDetails;
            $order_details->order_code = $checkout_code;
            $order_details->product_id = $item['productInfo']->product_id;
            $order_details->product_name = $item['productInfo']->product_name;
            $order_details->product_price = $item['productInfo']->product_price;
            $order_details->order_details_total = Session::get('Cart')->totalPrice;
            $order_details->product_sales_quantity = $item['quanty'];
            $order_details->payment_method = $request->payment_option = $data['payment_method'];
            $order_details->product_coupon = $data['order_coupon'];
            $order_details->save();
            }
         }

         
        
        if($data['payment_method']=='ATM')
        {
            Session::forget('coupon');
        
           $request->Session()->forget('coupon');
            $category_product = DB::table('table_danhmuc')->where('category_status','Hiển thị')->orderby('category_id','DESC')->get(); 
            
            return view('pages.hinhthucthanhtoan.camon_muahang')->with('danhmuc',$category_product);
            

        }
        elseif($data['payment_method']=='ShipCOD')
        {
            
           // // $request->Session()->forget('Cart');
           $request->Session()->forget('coupon');
            
           $category_product = DB::table('table_danhmuc')->where('category_status','Hiển thị')->orderby('category_id','DESC')->get(); 
        
           return view('pages.hinhthucthanhtoan.camon_muahang')->with('danhmuc',$category_product);
        
       }
        // else
        // {
            

        //     $category_product = DB::table('table_danhmuc')->where('category_status','Hiển thị')->orderby('category_id','DESC')->get();
        //      return view('pages.hinhthucthanhtoan.camon_muahang')->with('danhmuc',$category_product);
        //      echo 'không chọn';
        // }
            
    }
        

     public function camon_muahang()
     {  
        $category_product = DB::table('table_danhmuc')->where('category_status','Hiển thị')->orderby('category_id','DESC')->get(); 

        return view('pages.hinhthucthanhtoan.camon_muahang')->with('danhmuc',$category_product);
     }
}
