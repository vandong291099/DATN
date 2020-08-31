<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect; //trả về
session_start();
class AdminController extends Controller
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
    public function index()
    {
    	return view('admin_login');	
    }
    public function logout()
    {	
    	Session::put('admin_name',null); // giá trị null , khi đăng xuất thông tin name và id sẽ được xóa khỏi session
        Session::put('admin_id',null);
        return Redirect::to('/admin');
    }

    public function trang_chu_admin()
    {
        $this->AuthLogin(); 
    	return view('admin.trang_chu_admin');
    }

    public function admin_taikhoan(Request $request)
    {   
        $this->validate($request,[
            'admin_email' => 'required|email',
            'admin_password' => 'required|min:5|max:15',
        ],[
            'admin_email.required' => 'Bạn chưa nhập email',
            'admin_email.email' => 'Bạn chưa nhập đúng định dạng email',
            'admin_password.required' => 'Bạn chưa nhập mật khẩu',
            'admin_password.min' => 'Mật khẩu phải có ít nhất 3 kí tự',
            'admin_password.max' => 'Mật khẩu tối đa 15 kí tự',
        ]);

    	$admin_email = $request->admin_email;
    	$admin_password = md5($request->admin_password);

    	$ketqua = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first(); //lấy giới hạn chỉ 1 user       //admin_email = $admin_email 

        

    	if($ketqua)
    	{
            Session::put('admin_name',$ketqua->admin_name);  //  lấy dữ liệu đã được lưu trong database
            Session::put('admin_id',$ketqua->admin_id);
            return Redirect::to('/trang-chu-admin');
        }
        else
        {
            Session::put('message','Mật khẩu hoặc tài khoản bị sai.Vui lòng nhập lại');
            return Redirect::to('/admin');
        }
    }
}
