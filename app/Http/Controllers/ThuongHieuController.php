<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Brand;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class ThuongHieuController extends Controller
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
    public function them_thuonghieu()
    {
        $this->AuthLogin();
    	return view('admin.thuonghieu.them_thuonghieu');
    }

    public function lietke_thuonghieu()
    {
    $this->AuthLogin();			
    							//sắp xếp theo giảm dần
        $lietke_thuonghieu = Brand::orderBy('brand_id','DESC')->get();
    	$lietke  = view('admin.thuonghieu.lietke_thuonghieu')->with('lietke_thuonghieu',$lietke_thuonghieu);
    	return view('admin_layout')->with('admin.thuonghieu.lietke_thuonghieu',$lietke);
    }

    public function save_thuonghieu(Request $request)
    {
        $this->validate($request,[
            'brand_name' => 'required|min:3|unique:table_thuonghieu,brand_name',
            'brand_slug' => 'required|min:3',
            'brand_description' => 'required|min:5'


        ],[
            'brand_name.required' => 'Bạn chưa nhập tên thương hiệu',
            'brand_name.min' => 'Tên thương hiệu phải có ít nhất 3 kí tự',
            'brand_name.unique' => 'Thương hiệu đã tồn tại',
            'brand_slug.required' => 'Bạn chưa nhập đường dẫn',
            'brand_slug.min' => 'Đường dẫn phải có ít nhất 3 kí tự',
            'brand_description.required' => 'Bạn chưa nhập mô tả thương hiệu',
            'brand_description.min' => 'Mô tả phải có ít nhất 5 kí tự'

        ]);

        $data = $request->all();
        $brand = new Brand(); // lấy class model
        $brand->brand_name = $data['brand_name'];
        $brand->brand_slug = $data['brand_slug'];
        $brand->brand_description = $data['brand_description'];
        $brand->brand_status = $data['brand_status'];
        $brand->save();
    	Session::put('message','Thêm thương hiệu sản phẩm thành công');
    	return Redirect::to('them-thuonghieu');
    }

    public function unactive_thuonghieu($brand_product_id)
    {
        DB::table('table_thuonghieu')->where('brand_id',$brand_product_id)->update(['brand_status'=>'Ẩn']);
        Session::put('message','Ẩn thương hiệu sản phẩm thành công');
        return Redirect::to('lietke-thuonghieu');
    }

    public function active_thuonghieu($brand_product_id)
    {
         DB::table('table_thuonghieu')->where('brand_id',$brand_product_id)->update(['brand_status'=>'Hiển thị']);
        Session::put('message','Hiển thị thương hiệu sản phẩm thành công');
        return Redirect::to('lietke-thuonghieu');
    }

    public function edit_thuonghieu($brand_product_id)
    {
        $this->AuthLogin();
        $edit_thuonghieu = DB::table('table_thuonghieu',$brand_product_id)->where('brand_id',$brand_product_id)->get();

        $edit = view('admin.thuonghieu.capnhat_thuonghieu')->with('edit_thuonghieu',$edit_thuonghieu);

        return view('admin_layout')->with('admin.thuonghieu.capnhat_thuonghieu',$edit);
    }
    public function capnhat_thuonghieu(Request $request,$brand_product_id)
    {   
        $this->validate($request,[
            'brand_name' => 'required|min:3',
            'brand_slug' => 'required|min:3',
            'brand_description' => 'required|min:5'


        ],[
            'brand_name.required' => 'Bạn chưa nhập tên thương hiệu',
            'brand_name.min' => 'Tên thương hiệu phải có ít nhất 3 kí tự',
            'brand_slug.required' => 'Bạn chưa nhập đường dẫn',
            'brand_slug.min' => 'Đường dẫn phải có ít nhất 3 kí tự',
            'brand_description.required' => 'Bạn chưa nhập mô tả thương hiệu',
            'brand_description.min' => 'Mô tả phải có ít nhất 5 kí tự'

        ]);
        $data = $request->all();
        $brand = Brand::find($brand_product_id);
        $brand->brand_name = $data['brand_name'];
        $brand->brand_slug = $data['brand_slug'];
        $brand->brand_description = $data['brand_description'];
        $brand->save();        
        Session::put('message','Cập nhật thương hiệu sản phẩm thành công');
        return Redirect::to('lietke-thuonghieu');
    }

    public function delete_thuonghieu($brand_product_id)
    {
        DB::table('table_thuonghieu')->where('brand_id',$brand_product_id)->delete();
        Session::put('message','Xóa thương hiệu sản phẩm thành công');
        return Redirect::to('lietke-thuonghieu');
    }
    
}
