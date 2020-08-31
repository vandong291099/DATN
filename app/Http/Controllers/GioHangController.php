<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Coupon;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect; //trả về
use Response;
session_start();

class GioHangController extends Controller
{
	public function gio_hang()
	{
		$category_product = DB::table('table_danhmuc')->where('category_status','Hiển thị')->orderby('category_id','DESC')->get();

		

		return view('pages.giohang.gio_hang')->with('danhmuc',$category_product);
	}

	public function them_gio_hang(Request $request,$id)
	{	
		$sanpham = DB::table('table_sanpham')->where('product_id',$id)->first();
		if($sanpham != null)
		{
			$oldCart = Session('Cart') ? Session('Cart') : null;
			$newCart = new Cart($oldCart);
			$newCart->them_gio_hang($sanpham, $id);
			
			$request->Session()->put('Cart',$newCart);
		}
		return view('pages.giohang.giohang_trangchu');
	}


	public function DeleteItemCart(Request $request,$id)
	{
			$oldCart = Session('Cart') ? Session('Cart') : null; // lấy lại giỏ hàng cũ
			$newCart = new Cart($oldCart); // tạo 1 biến gán cho Cart
			$newCart->DeleteItemCart($id); // rồi xóa

			if(Count($newCart->products) >= 0) // kiểm tra nếu còn sản phẩm
			{
				$request->Session()->put('Cart',$newCart);
				$request->Session()->forget('coupon');
				 // giỏ hàng vẫn tiếp tục
			}
			
			else
			{
				$request->Session()->forget('Cart');// không còn sản phẩm nào thì xóa luôn giỏ hàng.
				
			}
			
			// return view('pages.giohang.giohang_trangchu');
			return Response::json
			(
				[
					'view_1' => view('pages.giohang.giohang_trangchu')->render(),
					'view_2' => view('pages.giohang.danhsach_giohang')->render(),
					'view_3' => view('pages.thanhtoan.render_infor')->render(),
					'view_4' => view('pages.hinhthucthanhtoan.infor_thanhtoan')->render(),
				]);
	}

	public function DeleteListItemCart(Request $request,$id)
	{	
			

			$oldCart = Session('Cart') ? Session('Cart') : null; // lấy lại giỏ hàng cũ
			$newCart = new Cart($oldCart); // tạo 1 biến gán cho Cart
			$newCart->DeleteItemCart($id); // rồi xóa

			if(Count($newCart->products) >= 0) // kiểm tra nếu còn sản phẩm
			{
				$request->Session()->put('Cart',$newCart); // giỏ hàng vẫn tiếp tục
				$request->Session()->forget('coupon');
				
			}
			else
			{
				$request->Session()->forget('Cart'); // xóa cho đến khi không còn sản phẩm nào và thành tiền = 0;
				
				 
			}
			
			// return view('pages.giohang.danhsach_giohang');
			return Response::json
			(
				[
					'view_1' => view('pages.giohang.danhsach_giohang')->render(),
					'view_2' => view('pages.giohang.giohang_trangchu')->render(),
				]);
	}

	public function SaveListItemCart(Request $request, $id, $quanty)
	{		
		

			$oldCart = Session('Cart') ? Session('Cart') : null; // lấy lại giỏ hàng cũ
			$newCart = new Cart($oldCart); // tạo 1 biến gán cho Cart
			$newCart->UpdateItemCart($id, $quanty); 

	
			$request->Session()->put('Cart',$newCart); 

			return Response::json
			(
				[
					'view_1' => view('pages.giohang.danhsach_giohang')->render(),
					'view_2' => view('pages.giohang.giohang_trangchu')->render(),
				]);
			
			
	}

	public function check_coupon(Request $request){
        $data = $request->all();
        $coupon = Coupon::where('coupon_code',$data['coupon'])->first();
        if($coupon){
            $count_coupon = $coupon->count();
            if($count_coupon>0){
                $coupon_session = Session::get('coupon');
                if($coupon_session==true){
                    $is_avaiable = 0;
                    if($is_avaiable==0){
                        $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,

                        );
                        Session::put('coupon',$cou);
                    }
                }else{
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

        }else{
            return redirect()->back()->with('error','Mã giảm giá không đúng');
        }
    }   
}
    

