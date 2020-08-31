<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
use App\Carbon;
use App\Contact;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();


class HomeController extends Controller
{
    public function index()
    {	
    	$category_product = DB::table('table_danhmuc')->where('category_status','Hiển thị')->orderby('category_id','DESC')->get();
        
    	$brand_product = DB::table('table_thuonghieu')->where('brand_status','Hiển thị')->orderby('brand_id','DESC')->get();

        $lay_dongho = DB::table('table_sanpham')->where('category_id','7')->orderby('product_id','DESC')->get();

        $lay_dienthoai = DB::table('table_sanpham')->where('category_id','1')->orderby('product_id','DESC')->get();

        $lay_laptop = DB::table('table_sanpham')->where('category_id','2')->orderby('product_id','DESC')->get();

        $lay_phukien = DB::table('table_sanpham')->where('category_id','8')->orderby('product_id','DESC')->get();

        $lay_sanphamnoibat = DB::table('table_sanpham')->where('product_hightlight','Có')->orderby('product_id','DESC')->get();

        $sanpham_danhmuc = DB::table('table_sanpham')->where('product_status','Hiển thị')->orderby('product_id','DESC')->get();

        $lay_tintuc = DB::table('table_tintuc')->orderby('post_id','DESC')->get();

      

    	return view('pages.trang_chu')->with('danhmuc',$category_product)->with('thuonghieu',$brand_product)->with('dongho',$lay_dongho)->with('phukien',$lay_phukien)->with('sanphamdanhmuc',$sanpham_danhmuc)->with('sanphamnoibat',$lay_sanphamnoibat)->with('tintuc',$lay_tintuc)->with('dienthoai',$lay_dienthoai)->with('laptop',$lay_laptop);
    }


    public function san_pham()
    {
    	$category_product = DB::table('table_danhmuc')->where('category_status','Hiển thị')->orderby('category_id','DESC')->get(); 

        $brand_product = DB::table('table_thuonghieu')->where('brand_status','Hiển thị')->orderby('brand_id','DESC')->get();
    	
        $lay_sanpham = DB::table('table_sanpham')->where('product_status','Hiển thị')->orderby('product_id','DESC')->paginate(9);

        $lay_sanphamnoibat = DB::table('table_sanpham')->where('product_hightlight','Có')->orderby('product_id','DESC')->limit(10)->get();

        

        return view('pages.sanpham.san_pham')->with('danhmuc',$category_product)->with('thuonghieu',$brand_product)->with('sanpham',$lay_sanpham)->with('sanphamnoibat',$lay_sanphamnoibat);
    }

    public function chi_tiet_san_pham($product_slug)
    {
        $category_product = DB::table('table_danhmuc')->where('category_status','Hiển thị')->orderby('category_id','DESC')->get();

        $brand_product = DB::table('table_thuonghieu')->where('brand_status','Hiển thị')->orderby('brand_id','DESC')->get();

        $lay_sanphamnoibat = DB::table('table_sanpham')->where('product_hightlight','Có')->orderby('product_id','DESC')->get();

       

        $chitiet_sanpham = DB::table('table_sanpham')
        ->join('table_danhmuc','table_danhmuc.category_id','=','table_sanpham.category_id')
        ->join('table_thuonghieu','table_thuonghieu.brand_id','=','table_sanpham.brand_id')->where('table_sanpham.product_slug',$product_slug)->get();

         foreach($chitiet_sanpham as $key => $value)  //$sanpham_lienquan đã lấy ra chi tiết sản phẩm đã chứa category_id nên giờ foreach để lấy ra sản phharm đó thuộc danh mục nào rồi sản phẩm liên quan nó sẽ là toàn sản phẩm thuộc danh mục đó
      {
            $category_id = $value->category_id;
      }
       
        
        $sanpham_lienquan = DB::table('table_sanpham')
        ->join('table_danhmuc','table_danhmuc.category_id','=','table_sanpham.category_id')
        ->join('table_thuonghieu','table_thuonghieu.brand_id','=','table_sanpham.brand_id')
        ->where('table_danhmuc.category_id',$category_id)->whereNotIn('table_sanpham.product_slug',[$product_slug])->get();

        return view('pages.sanpham.chitiet_sanpham')->with('danhmuc',$category_product)->with('thuonghieu',$brand_product)->with('sanphamnoibat',$lay_sanphamnoibat)->with('chitietsanpham',$chitiet_sanpham)->with('sanphamlienquan',$sanpham_lienquan);
    }

    public function danhmuc_theo_sanpham($category_slug)
    {   
        $category_product = DB::table('table_danhmuc')->where('category_status','Hiển thị')->orderby('category_id','DESC')->get(); 

         $danhmuc_theo_sanpham = DB::table('table_sanpham')
        ->join('table_danhmuc','table_sanpham.category_id','=','table_danhmuc.category_id')
        ->where('table_danhmuc.category_slug',$category_slug)->paginate(6);

       

        $lay_sanphamnoibat = DB::table('table_sanpham')->where('product_hightlight','Có')->orderby('product_id','DESC')->limit(10)->get();

        $ten_danhmuc = DB::table('table_danhmuc')->where('table_danhmuc.category_slug',$category_slug)->limit(1)->get();

        return view('pages.danhmuctheosanpham.load_sanpham_theo_danhmuc')->with('danhmuc',$category_product)->with('sanphamtheodanhmuc',$danhmuc_theo_sanpham)->with('sanphamnoibat',$lay_sanphamnoibat)->with('tendanhmuc',$ten_danhmuc);
    }

    public function thuonghieu_theo_sanpham($brand_slug)
    {   
        $category_product = DB::table('table_danhmuc')->where('category_status','Hiển thị')->orderby('category_id','DESC')->get(); 

        $lay_thuonghieu = DB::table('table_thuonghieu')->where('brand_status','Hiển thị')->orderby('brand_id','DESC')->get();

         $thuonghieu_theo_sanpham = DB::table('table_sanpham')
        ->join('table_thuonghieu','table_sanpham.brand_id','=','table_thuonghieu.brand_id')
        ->where('table_thuonghieu.brand_slug',$brand_slug)->paginate(6);


        $ten_thuonghieu = DB::table('table_thuonghieu')->where('table_thuonghieu.brand_slug',$brand_slug)->limit(1)->get();

        return view('pages.thuonghieutheosanpham.load_sanpham_theo_thuonghieu')->with('thuonghieu',$lay_thuonghieu)->with('sanphamtheothuonghieu',$thuonghieu_theo_sanpham)->with('tenthuonghieu',$ten_thuonghieu)->with('danhmuc',$category_product);
    }

    public function them_gio_hang_danhmuc(Request $request,$id)
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

    public function xoa_gio_hang_danhmuc(Request $request,$id)
    {
            $oldCart = Session('Cart') ? Session('Cart') : null; // lấy lại giỏ hàng cũ
            $newCart = new Cart($oldCart); // tạo 1 biến gán cho Cart
            $newCart->DeleteItemCart($id); // rồi xóa

            if(Count($newCart->products) >= 0) // kiểm tra nếu còn sản phẩm
            {
                $request->Session()->put('Cart',$newCart); // giỏ hàng vẫn tiếp tục
            }
            
            else
            {
                $request->Session()->forget('Cart'); // không còn sản phẩm nào thì xóa luôn giỏ hàng.
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

    public function them_gio_hang_chitiet(Request $request,$id)
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
    public function xoa_gio_hang_chitiet(Request $request,$id)
    {
            $oldCart = Session('Cart') ? Session('Cart') : null; // lấy lại giỏ hàng cũ
            $newCart = new Cart($oldCart); // tạo 1 biến gán cho Cart
            $newCart->DeleteItemCart($id); // rồi xóa

            if(Count($newCart->products) >= 0) // kiểm tra nếu còn sản phẩm
            {
                $request->Session()->put('Cart',$newCart); // giỏ hàng vẫn tiếp tục
            }
            
            else
            {
                $request->Session()->forget('Cart'); // không còn sản phẩm nào thì xóa luôn giỏ hàng.
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

    public function lien_he()
    {
        $category_product = DB::table('table_danhmuc')->where('category_status','Hiển thị')->orderby('category_id','DESC')->get();

        return view('pages.lienhe.lien_he')->with('danhmuc',$category_product);
    }

    public function save_lienhe(Request $request)
    {   
        $this->validate($request,[
            'contact_name' => 'required|min:5|max:25',
            'contact_phone' => 'required|min:10|max:10',
            'contact_email' => 'required|email|',
            'contact_content' => 'required|min:10|max:100'
        ],[
            'contact_name.required' => 'Bạn chưa nhập họ và tên',
            'contact_name.min' => 'Họ và tên phải có ít nhất 5 kí tự',
            'contact_name.max' => 'Họ và tên tối đa 25 kí tự',
            'contact_phone.required' => 'Bạn chưa nhập số điện thoại',
            'contact_phone.min' => 'Số điện thoại phải có ít nhất 10 số',
            'contact_phone.max' => 'Số điện thoại tối đa 10 số',
            'contact_email.required' => 'Bạn chưa nhập email',
            'contact_email.email' => 'Bạn chưa nhập đúng định dạng email',
            'contact_content.required' => 'Bạn chưa nhập nội dung',
            'contact_content.min' => 'Nội dung phải có ít nhất 10 kí tự',
            'contact_content.max' => 'Nội dung tối đa 100 kí tự',
        ]);
        $data = $request->all();
        $contact = new Contact;
        $contact->contact_name = $data['contact_name'];
        $contact->contact_phone = $data['contact_phone'];
        $contact->contact_email = $data['contact_email'];
        $contact->contact_content = $data['contact_content'];
        $contact->save();
        Session::put('message','Gửi thông tin liên hệ thành công');
        return Redirect::to('lien-he');
    }

    public function tin_tuc()
    {
        $category_product = DB::table('table_danhmuc')->where('category_status','Hiển thị')->orderby('category_id','DESC')->get();

        $lay_tintuc = DB::table('table_tintuc')->orderby('post_id','DESC')->get();

        return view('pages.tintuc.tin_tuc')->with('danhmuc',$category_product)->with('tintuc',$lay_tintuc);

    }

    public function chitiet_tintuc($post_id)
    {
        $category_product = DB::table('table_danhmuc')->where('category_status','Hiển thị')->orderby('category_id','DESC')->get();

        $lay_tintucchitiet = DB::table('table_tintuc')->where('table_tintuc.post_id',$post_id)->get();

        return view('pages.tintuc.chitiet_tintuc')->with('danhmuc',$category_product)->with('tintucchitiet',$lay_tintucchitiet);

    }

    

    public function tim_kiem(Request $request)
    {     
        $category_product = DB::table('table_danhmuc')->where('category_status','Hiển thị')->orderby('category_id','desc')->get(); 
        $keywords = $request->keywords_submit;

        $search_product = DB::table('table_sanpham')->where('product_name','like','%'.$keywords.'%')->paginate(9);

        $lay_sanphamnoibat = DB::table('table_sanpham')->where('product_hightlight','Có')->orderby('product_id','DESC')->get();

        return view('pages.sanpham.tim_kiem')->with('danhmuc',$category_product)->with('search_product',$search_product)->with('sanphamnoibat',$lay_sanphamnoibat);

    }


}
