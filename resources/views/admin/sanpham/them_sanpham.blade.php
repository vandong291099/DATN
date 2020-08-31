@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm sản phẩm
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
                                <form role="form" action="{{URL::to('/save-sanpham')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Đường dẫn</label>
                                    <input type="text" name="product_slug" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                     <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="number" name="product_price" class="form-control" id="" >
                                </div>
                                
                                  <div class="form-group">  
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                                </div>
                                
                                <!-- @for ($i=1;$i<=5; $i++)
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh chi tiết {{ $i }}</label>
                                    <input type="file" class="form-control"  name="fProductDetail[]"/>
                                </div>
                                @endfor -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none"  rows="8" class="form-control" name="product_description" id="ckeditor" placeholder="Mô tả sản phẩm"></textarea>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Thông số kỹ thuật</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="product_content" id="ckeditor1" placeholder="Nội dung sản phẩm"></textarea>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                      <select name="product_category" class="form-control input-sm m-bot15">
                                        @foreach($category_product as $key => $category)
                                            <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                        @endforeach
                                            
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Thương hiệu</label>
                                      <select name="product_brand" class="form-control input-sm m-bot15">
                                        @foreach($brand_product as $key => $brand)
                                            <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        @endforeach
                                            
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="product_status" class="form-control input-sm m-bot15">
                                            <option value="Hiển thị">Hiển thị</option>
                                            <option value="Ẩn">Ẩn</option>  
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Sản phẩm nổi bật</label>
                                      <select name="product_hightlight" class="form-control input-sm m-bot15">
                                            <option value="Có">Có</option>
                                            <option value="Không">Không</option>  
                                    </select>
                                </div>
                               
                                <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
                                </form>
                            </div>
 
                        </div>

                    </section>
</div>

@endsection