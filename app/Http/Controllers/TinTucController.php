<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class TinTucController extends Controller
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
    public function them_tintuc()
   	{
        $this->AuthLogin();
    	return view('admin.tintuc.them_tintuc');
    }

    public function save_tintuc(Request $request)
    {
         $this->validate($request,[
            'post_name' => 'required|min:3',
            'post_title' => 'required|min:3',
            'post_content' => 'required|min:5'


        ],[
            'post_name.required' => 'Bạn chưa nhập tên tin tức',
            'post_name.min' => 'Tên tin tức phải có ít nhất 3 kí tự',
            'post_title.required' => 'Bạn chưa nhập tiêu đề',
            'post_title.min' => 'Tiêu đề phải có ít nhất 3 kí tự',
            'post_content.required' => 'Bạn chưa nhập nội dung',
            'post_content.min' => 'Nội dung phải có ít nhất 5 kí tự'

        ]);

    	$data = $request->all();
        $post = new Post();
        $post->post_name = $data['post_name'];   //name
        $post->post_title = $data['post_title'];
        $post->post_content = $data['post_content'];
		
        $get_image = $request->file('post_image');
        if($get_image)
        {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/tintuc',$new_image);
            $post['post_image'] = $new_image;
            $post->save();
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('them-tintuc');
            
        }
        $post['post_image'] = '';
    	$post->save();
    	Session::put('message','Thêm tin tức thành công');
    	return Redirect::to('them-tintuc');
    }

    public function lietke_tintuc()	
    {
        $this->AuthLogin();
     	$lay_tintuc = DB::table('table_tintuc')->orderby('post_id','DESC')->get();

     	$quanly_tintuc  = view('admin.tintuc.lietke_tintuc')->with('lay_tintuc',$lay_tintuc);
        return view('admin_layout')->with('admin.tintuc.lietke_tintuc',$quanly_tintuc);
    }

    public function delete_tintuc($post_id)
    {
    	DB::table('table_tintuc')->where('post_id',$post_id)->delete();
        Session::put('message','Xóa tin tức thành công');
        return Redirect::to('lietke-tintuc');
    }


}
