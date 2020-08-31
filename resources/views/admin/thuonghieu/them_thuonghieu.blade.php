@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm thương hiệu sản phẩm
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

                                <form role="form" action="{{URL::to('/save-thuonghieu')}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                                    <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" placeholder="Tên thương hiệu">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Đường dẫn</label>
                                    <input type="text" name="brand_slug" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="brand_description" id="ckeditor" placeholder="Mô tả thương hiệu"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Trạng thái</label>
                                      <select name="brand_status" class="form-control input-sm m-bot15">
                                            <option value="Hiển thị">Hiển thị</option>
                                            <option value="Ẩn">Ẩn</option>      
                                        </select>
                                </div>
                               
                                <button type="submit" name="add_brand" class="btn btn-info">Thêm thương hiệu</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection