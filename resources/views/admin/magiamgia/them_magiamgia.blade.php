@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm mã giảm giá
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
                                <form role="form" action="{{URL::to('/save-ma-giam-gia')}}" method="post">
                                    @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên mã giảm giá</label>
                                    <input type="text" name="coupon_name" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mã giảm giá</label>
                                    <input type="text" name="coupon_code" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Số lượng mã</label>
                                      <input type="number"  name="coupon_quantity" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tính năng mã</label>
                                     <select name="coupon_condition" class="form-control input-sm m-bot15">
                                             <option value="0">----Chọn-----</option>
                                            <option value="Giảm theo phần trăm">Giảm theo phần trăm</option>
                                            <option value="Giảm theo giá tiền">Giảm theo giá tiền</option>
                                            
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Nhập số % hoặc giá tiền giảm</label>
                                     <input type="number" name="coupon_number" class="form-control" id="exampleInputEmail1" >
                                </div>
                               
                               
                                <button type="submit" name="add_coupon" class="btn btn-info">Thêm mã</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection