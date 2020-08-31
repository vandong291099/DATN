<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Category;
use Session;
use App\Cart;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();


class DanhMucController extends Controller
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

   	public function them_danhmuc()
   	{
        $this->AuthLogin();
    	return view('admin.danhmuc.them_danhmuc');
    }

    public function lietke_danhmuc()
   	{	//lấy tất cả dữ liệu từ database gán vào biến $lietke_danhmuc
    	$lietke_danhmuc = Category::orderBy('category_id','DESC')->get();
    	$lietke  = view('admin.danhmuc.lietke_danhmuc')->with('lietke_danhmuc',$lietke_danhmuc);
    										  //lấy dữ liệu được rồi gán lại 'lietke_danhmuc'(trang) để còn lấy ra bằng foreach
    	return view('admin_layout')->with('admin.danhmuc.lietke_danhmuc', $lietke);

    }

    public function save_danhmuc(Request $request) //khi nhấn thêm danh mục tất cả dữ liệu sẽ qua hàm này
    {   
        $this->validate($request,[
            'category_name' => 'required|unique:table_danhmuc,category_name|min:3',
            'category_slug' => 'required|min:3',
            'category_description' => 'required|min:5'


        ],[
            'category_name.required' => 'Bạn chưa nhập tên danh mục',
            'category_name.min' => 'Tên danh mục phải có ít nhất 3 kí tự',
            'category_name.unique' => 'Danh mục đã tồn tại',
            'category_slug.required' => 'Bạn chưa nhập đường dẫn',
            'category_slug.min' => 'Đường dẫn phải có ít nhất 3 kí tự',
            'category_description.required' => 'Bạn chưa nhập mô tả',
            'category_description.min' => 'Mô tả phải có ít nhất 5 kí tự'
        ]);

    	$data = $request->all();
        $category = new Category(); // lấy class model
        $category->category_name = $data['category_name'];
        $category->category_slug = $data['category_slug'];
        $category->category_description = $data['category_description'];
        $category->category_status = $data['category_status'];
        $category->save();
    	Session::put('message','Thêm danh mục sản phẩm thành công');
    	return Redirect::to('them-danhmuc');
    }
    public function active_danhmuc($category_product_id)
    {
        DB::table('table_danhmuc')->where('category_id',$category_product_id)->update(['category_status'=>'Hiển thị']);
        Session::put('message','Hiển thị danh mục sản phẩm thành công');
        return Redirect::to('lietke-danhmuc');
    }

    public function unactive_danhmuc($category_product_id) //1 biến id
    {								
        DB::table('table_danhmuc')->where('category_id',$category_product_id)->update(['category_status'=>'Ẩn']);
        Session::put('message','Ẩn danh mục sản phẩm thành công');
        return Redirect::to('lietke-danhmuc');

    }

    public function edit_danhmuc($category_product_id)
    {
    	$edit_danhmuc = DB::table('table_danhmuc')->where('category_id',$category_product_id)->get();
        $edit = view('admin.danhmuc.capnhat_danhmuc')->with('edit_danhmuc',$edit_danhmuc);

        return view('admin_layout')->with('admin.danhmuc.capnhat_danhmuc', $edit);
    }

    public function capnhat_danhmuc(Request $request,$category_product_id)
    {   
        $this->validate($request,[
            'category_name' => 'required|min:3',
            'category_slug' => 'required|min:3',
            'category_description' => 'required|min:5'


        ],[
            'category_name.required' => 'Bạn chưa nhập tên danh mục',
            'category_name.min' => 'Tên danh mục phải có ít nhất 3 kí tự',
            'category_slug.required' => 'Bạn chưa nhập đường dẫn',
            'category_slug.min' => 'Đường dẫn phải có ít nhất 3 kí tự',
            'category_description.required' => 'Bạn chưa nhập mô tả',
            'category_description.min' => 'Mô tả phải có ít nhất 5 kí tự'
        ]);
        $data = $request->all();
        $category = Category::find($category_product_id);
        $category->category_name = $data['category_name'];
        $category->category_slug = $data['category_slug'];
        $category->category_description = $data['category_description'];
        $category->save();
        Session::put('message','Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('lietke-danhmuc');
    }
    
    public function delete_danhmuc($category_product_id)
    {
        DB::table('table_danhmuc')->where('category_id',$category_product_id)->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công');
        return Redirect::to('lietke-danhmuc');
    }
}
