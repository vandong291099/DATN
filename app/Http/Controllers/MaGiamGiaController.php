<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Coupon;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class MaGiamGiaController extends Controller
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
    public function check_coupon(Request $request)
    {
    	 $data = $request->all();
        $coupon = Coupon::where('coupon_code',$data['coupon'])->first();
        if($coupon)
        {
            $count_coupon = $coupon->count();
            if($count_coupon>0)
            {
                $coupon_session = Session::get('coupon');
                if($coupon_session==true) //neu session coupon ton tai 
                {
                    $is_avaiable = 0;
                    if($is_avaiable==0)
                    {
                        $cou[] = array(
                            'coupon_code' => $coupon->coupon_code, //cot csdl
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,

                        );
                        Session::put('coupon',$cou);
                    }
                }
                else
                {
                    $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,

                        );
                    Session::put('coupon',$cou);
                }
                Session::save();
                return redirect()->back()->with('message','Thêm mã giảm giá thành công');
            }

        }
        else
        {
            return redirect()->back()->with('error','Mã giảm giá không đúng');
        }
    }

    public function them_ma_giam_gia()
    {
        $this->AuthLogin();
    	return view('admin.magiamgia.them_magiamgia');
    }

    public function save_ma_giam_gia(Request $request)
    {

         $this->validate($request,[
            'coupon_name' => 'required|min:3|unique:table_magiamgia,coupon_name',
            'coupon_code' => 'required|min:3|unique:table_magiamgia,coupon_code',
            'coupon_quantity' => 'required|integer|min:1',
            'coupon_number'=>'required|integer|min:1'


        ],[
            'coupon_name.required' => 'Bạn chưa nhập tên giảm giá',
            'coupon_name.min' => 'Tên giảm giá phải có ít nhất 3 kí tự',
            'coupon_name.unique' => 'Tên mã giảm giá đã tồn tại',
            'coupon_code.required' => 'Bạn chưa nhập mã giảm giám',
            'coupon_code.min' => 'Mã giảm giá phải có ít nhất 3 kí tự',
            'coupon_code.unique' => 'Mã giảm giá đã tồn tại',
            'coupon_quantity.required' => 'Bạn chưa nhập số lượng ',
            'coupon_quantity.min' => 'Số lượng phải lớn hơn 1',
            'coupon_number.required'=> 'Bạn chưa nhập số % hoặc số tiền giảm giá',
            'coupon_number.min' => 'Số % hoặc số tiền giảm giá phải lớn hơn 1'

        ]);
    	$data = $request->all();

    	$coupon = new Coupon;

    	$coupon->coupon_name = $data['coupon_name'];
    	$coupon->coupon_code = $data['coupon_code'];
    	$coupon->coupon_quantity = $data['coupon_quantity'];
    	$coupon->coupon_condition = $data['coupon_condition'];
    	$coupon->coupon_number = $data['coupon_number'];
    	$coupon->save();

       
    	Session::put('message','Thêm mã giảm giá thành công');
        
        return Redirect::to('them-ma-giam-gia');
    }

    public function lietke_ma_giam_gia()
    {
        $this->AuthLogin();
    	$coupon = Coupon::orderby('coupon_id','DESC')->get();
    	return view('admin.magiamgia.lietke_magiamgia')->with(compact('coupon'));
    }

     public function delete_magiamgia($coupon_id)
     {
    	$coupon = Coupon::find($coupon_id);
    	$coupon->delete();
    	Session::put('message','Xóa mã giảm giá thành công');
        return Redirect::to('lietke-ma-giam-gia');
    }
}
