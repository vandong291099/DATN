@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm tin tức
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
                                <form role="form" action="{{URL::to('/save-tintuc')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên tin tức</label>
                                    <input type="text" name="post_name" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tiêu đề</label>
                                      <input type="text" name="post_title" class="form-control" id="exampleInputEmail1" >
                                </div>  
                                <div class="form-group">  
                                    <label for="exampleInputEmail1">Hình ảnh tin tức</label>
                                    <input type="file" name="post_image" class="form-control" id="exampleInputEmail1">
                                </div>
                                
                               
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung</label>
                                    <textarea style="resize: none"  rows="8" class="form-control" name="post_content" id="ckeditor" placeholder="Nội dung"></textarea>
                                </div>
                               
                               
                                <button type="submit" name="add_tintuc" class="btn btn-info">Thêm tin tức</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection