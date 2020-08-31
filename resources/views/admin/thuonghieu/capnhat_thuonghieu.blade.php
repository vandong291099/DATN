@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật thương hiệu sản phẩm
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">
                            @foreach($edit_thuonghieu as $key => $edit_value)
                            <div class="position-center">
                                <ul class="alert text-danger">
                                    @foreach($errors -> all() as $error)
                                    <li> {{ $error }}</li>
                                    @endforeach
                                </ul>
                                <form role="form" action="{{URL::to('/capnhat-thuonghieu/'.$edit_value->brand_id)}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                                    <input type="text" value="{{$edit_value->brand_name}}" name="brand_name" class="form-control" id="exampleInputEmail1" >
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Đường dẫn</label>
                                    <input type="text" value="{{$edit_value->brand_slug}}" name="brand_slug" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="brand_description" id="ckeditor" >{{$edit_value->brand_description}}</textarea>
                                </div>
                               
                                <button type="submit" name="update_brand" class="btn btn-info">Cập nhật thương hiệu</button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
@endsection