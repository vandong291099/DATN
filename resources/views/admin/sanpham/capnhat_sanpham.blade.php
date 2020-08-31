@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật sản phẩm
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">

                            <div class="position-center">
                                <ul class="alert text-danger">
                                    @foreach($errors -> all() as $error)
                                    <li> {{ $error }}</li>
                                    @endforeach
                                </ul>
                                @foreach($edit_sanpham as $key => $pro)
                                <form role="form" action="{{URL::to('/capnhat-sanpham/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" value="{{$pro->product_name}}">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Đường dẫn</label>
                                    <input type="text" name="product_slug" class="form-control" id="exampleInputEmail1" value="{{$pro->product_slug}}">
                                </div>
                                     <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" value="{{$pro->product_price}}" name="product_price" class="form-control" id="" >
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                                    <img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" height="100" width="100">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="product_description" id="ckeditor">{{$pro->product_description}}</textarea>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Thông số kỹ thuật</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="product_content" id="ckeditor1" >{{$pro->product_content}}</textarea>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                      <select name="product_category" class="form-control input-sm m-bot15">
                                        @foreach($category_product as $key => $cate)
                                            @if($cate->category_id==$pro->category_id)
                                        <!--  lấy ra danh mục có sản phẩm đó đầu tiên thuộc danh mục đó  -->
                                            <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @else
                                            <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @endif
                                        @endforeach
                                            
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Thương hiệu</label>
                                      <select name="product_brand" class="form-control input-sm m-bot15">
                                        @foreach($brand_product as $key => $brand)
                                             @if($brand->brand_id==$pro->brand_id)
                                            <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                             @else
                                            <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                             @endif
                                        @endforeach
                                            
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tình trạng</label>
                                      <select name="product_status" class="form-control input-sm m-bot15" value="{{$pro->product_status}}">
                                            <option value="Hiển thị">Hiển thị</option>
                                            <option value="Ẩn">Ẩn</option>
                                            
                                    </select>
                                </div>
                                 <div class="form-group">

                                    <label for="exampleInputPassword1">Nổi bật</label>
                                      <select name="product_hightlight" class="form-control input-sm m-bot15">
                                        <option value="Có">Có</option>
                                       
                                        <option value="Không">Không</option>  

                                    </select>
                                </div>
                               
                                <button type="submit" name="add_product" class="btn btn-info">Cập nhật sản phẩm</button>
                                </form>
                                @endforeach
                            </div>

                        </div>
                    </section>

            </div>
@endsection