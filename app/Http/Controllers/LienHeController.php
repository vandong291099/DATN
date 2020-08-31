<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class LienHeController extends Controller
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
    public function lietke_lienhe()	
    {
        $this->AuthLogin();
     	$lay_lienhe = DB::table('table_lienhe')->orderby('contact_id','DESC')->get();

     	$quanly_lienhe  = view('admin.lienhe.xem_lienhe')->with('lay_lienhe',$lay_lienhe);
        return view('admin_layout')->with('admin.lienhe.xem_lienhe',$quanly_lienhe);
    }

    public function delete_lienhe($contact_id)
    {
     	DB::table('table_lienhe')->where('contact_id',$contact_id)->delete();
        Session::put('message','Xóa thông tin liên hệ thành công');
        return Redirect::to('lietke-lienhe');
    }

}
