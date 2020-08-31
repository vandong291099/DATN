<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use App\Product;
use App\ProductImage;
use App\Cart;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();


class SanPhamController extends Controller
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
   	public function them_sanpham()
    {
        $this->AuthLogin();
    	$category_product = DB::table('table_danhmuc')->orderby('category_id','DESC')->get(); 
        $brand_product = DB::table('table_thuonghieu')->orderby('brand_id','DESC')->get();
        
        return view('admin.sanpham.them_sanpham')->with('category_product', $category_product)->with('brand_product',$brand_product);
    }

    public function lietke_sanpham()
    {
        $this->AuthLogin();
    	$lietke_sanpham = DB::table('table_sanpham')
        ->join('table_danhmuc','table_danhmuc.category_id','=','table_sanpham.category_id')
        ->join('table_thuonghieu','table_thuonghieu.brand_id','=','table_sanpham.brand_id')
        ->orderby('table_sanpham.product_id','DESC')->paginate(9);
    	$lietke  = view('admin.sanpham.lietke_sanpham')->with('lietke_sanpham',$lietke_sanpham);
    	return view('admin_layout')->with('admin.lietke_sanpham', $lietke);
    }

    public function save_sanpham(Request $request)
    {
        $this->validate($request,[
            'product_name' => 'required|min:3|unique:table_sanpham,product_name',
            'product_slug' => 'required|min:3',
            'product_price' => 'required|integer|min:100000|max:1000000000',
            'product_description' => 'required|min:5',
            'product_content' => 'required|min:5'


        ],[
            'product_name.required' => 'Bạn chưa nhập tên sản phẩm',
            'product_name.min' => 'Tên sản phẩm phải có ít nhất 3 kí tự',
            'product_name.unique' => 'Sản phẩm đã tồn tại',
            'product_slug.required' => 'Bạn chưa nhập đường dẫn',
            'product_slug.min' => 'Đường dẫn phải có ít nhất 3 kí tự',
            'product_price.required' => 'Bạn chưa nhập giá sản phẩm',
            'product_price.min' => 'Giá sản phẩm phải lớn hơn 100000',
            'product_price.max' => 'Giá sản phẩm phải nhỏ hơn 1000000000',
            'product_description.required' => 'Bạn chưa nhập mô tả sản phẩm',
            'product_description.min' => 'Mô tả sản phẩm phải có ít nhất 5 kí tự',
            'product_content.required' => 'Bạn chưa nhập thông số kỹ thuật',
            'product_content.min' => 'Thông số kỹ thuật phải có ít nhất 5 kí tự'
        ]);

    	$data = $request->all();
        $product = new Product();
        $product->product_name = $data['product_name'];   //name
        $product->product_slug = $data['product_slug'];
        $product->product_price = $data['product_price'];
        $product->product_description = $data['product_description'];
        $product->product_content = $data['product_content'];
        $product->category_id = $data['product_category'];
        $product->brand_id = $data['product_brand'];
        $product->product_status = $data['product_status'];
        $product->product_hightlight = $data['product_hightlight'];
        // $product->product_image = $data['product_image'];

        $get_image = $request->file('product_image');
        if($get_image)
        {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $product['product_image'] = $new_image;
            $product->save();

        //     $id = $product->product_id;
        //     if (Input::hasFile('fProductDetail'))
        //     {
        //     foreach(Input::file('fProductDetail') as $file)
        //     {
        //         $product_img = new ProductImage();
        //         if (isset($file))
        //         {
        //             $product_img->image = $file->getClientOriginalName();
        //             $product_img->id_product = $id;
        //             $file->move('public/uploads/detail',$file->getClientOriginalName());
        //             $product_img->save();
        //         }
                

        //     }
        // }
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('them-sanpham');
            
        }


        $product['product_image'] = '';
        $product->save();

        Session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('them-sanpham');

        
    }

    public function unactive_product($product_id){
         $this->AuthLogin();
        DB::table('table_sanpham')->where('product_id',$product_id)->update(['product_status'=>'Ẩn']);
        Session::put('message','Không kích hoạt sản phẩm thành công');
        return Redirect::to('lietke-sanpham');

    }

    public function active_product($product_id){
         $this->AuthLogin();
        DB::table('table_sanpham')->where('product_id',$product_id)->update(['product_status'=>'Hiển thị']);
        Session::put('message','Kích hoạt sản phẩm thành công');
        return Redirect::to('lietke-sanpham');
    }

    public function edit_sanpham($product_id)
    {
        $this->AuthLogin();
        $category_product = DB::table('table_danhmuc')->orderby('category_id','DESC')->get(); 
        $brand_product = DB::table('table_thuonghieu')->orderby('brand_id','DESC')->get(); 
      
        $edit_sanpham = DB::table('table_sanpham')->where('product_id',$product_id)->get();

        

        $edit  = view('admin.sanpham.capnhat_sanpham')->with('edit_sanpham',$edit_sanpham)->with('category_product',$category_product)->with('brand_product',$brand_product);

        return view('admin_layout')->with('admin.sanpham.capnhat_sanpham', $edit); 
    }

    public function capnhat_sanpham(Request $request,$product_id)
    {
        $this->validate($request,[
            'product_name' => 'required|min:3',
            'product_slug' => 'required|min:3',
            'product_price' => 'required|integer|min:100000|max:1000000000',
            'product_description' => 'required|min:5',
            'product_content' => 'required|min:5'


        ],[
            'product_name.required' => 'Bạn chưa nhập tên sản phẩm',
            'product_name.min' => 'Tên sản phẩm phải có ít nhất 3 kí tự',
            'product_slug.required' => 'Bạn chưa nhập đường dẫn',
            'product_slug.min' => 'Đường dẫn phải có ít nhất 3 kí tự',
            'product_price.required' => 'Bạn chưa nhập giá sản phẩm',
            'product_price.min' => 'Giá sản phẩm phải lớn hơn 100000',
            'product_price.max' => 'Giá sản phẩm phải nhỏ hơn 1000000000',
            'product_description.required' => 'Bạn chưa nhập mô tả sản phẩm',
            'product_description.min' => 'Mô tả sản phẩm phải có ít nhất 5 kí tự',
            'product_content.required' => 'Bạn chưa nhập thông số kỹ thuật',
            'product_content.min' => 'Thông số kỹ thuật phải có ít nhất 5 kí tự'
        ]);

    	$data = array();
        $data['product_name'] = $request->product_name;
        $data['product_slug'] = $request->product_slug;
        $data['product_price'] = $request->product_price;
        $data['product_description'] = $request->product_description;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_category;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $data['product_hightlight'] = $request->product_hightlight;
        $get_image = $request->file('product_image');

        if($get_image)
        {
                    $get_name_image = $get_image->getClientOriginalName();
                    $name_image = current(explode('.',$get_name_image));
                    $new_image =  $name_image.'.'.$get_image->getClientOriginalExtension();
                    $get_image->move('public/uploads/product',$new_image);
                    $data['product_image'] = $new_image;
                    DB::table('table_sanpham')->where('product_id',$product_id)->update($data);
                    Session::put('message','Cập nhật sản phẩm thành công');
                    return Redirect::to('lietke-sanpham');
        }
        DB::table('table_sanpham')->where('product_id',$product_id)->update($data);
        Session::put('message','Cập nhật sản phẩm thành công');
        return Redirect::to('lietke-sanpham');
    }

    public function delete_sanpham($product_id)
    {
        DB::table('table_sanpham')->where('product_id',$product_id)->delete();
        Session::put('message','Xóa sản phẩm thành công');
        return Redirect::to('lietke-sanpham');
    }   
}
