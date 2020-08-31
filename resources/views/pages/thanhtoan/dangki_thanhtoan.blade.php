@extends('layout')
@section('content')
<!-- Start page content -->
        <div id="page-content" class="page-wrapper">

<div class="breadcrumbs-section plr-200 mb-80">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title">ĐĂNG KÍ</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
                                <li>Đăng kí</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="login-section mb-80">
                <div style="margin-right: -150px;" class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="registered-customers">

                    <!-- new-customers -->
                        <div class="col-md-20">
                             <div class="login-account p-30 box-shadow">
                            <div class="new-customers">
                               
                                    <h6 class="widget-title border-left mb-50">ĐĂNG KÍ TÀI KHOẢN</h6>
                                    @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{!! $error !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                                     <form action="{{URL::to('/dangky-khachhang')}}" method="POST">
                                {{ csrf_field() }}
                                        <input type="text" name="customer_name"  placeholder="Họ và tên">

                                        <input type="number" name="customer_phone"  placeholder="Số điện thoại">

                                        <input type="text" name="customer_email" placeholder="Tài khoản email">

                                        <input type="password" name="customer_password"  placeholder="Mật khẩu">

                                        <!-- <input type="password" name="customer_password_again"  placeholder="Nhập lại mật khẩu"> -->
                                        <!-- <input type="password"  placeholder="Nhập lại mật khẩu" required=""> -->
                                        <div class="row">
                                            <div class="col-md-10">
                                                <button class="submit-btn-1 mt-20 btn-hover-1" type="submit" value="register">Đăng kí</button>
                                            </div>
                                          <!--   <div class="col-md-6">
                                                <button class="submit-btn-1 mt-20 btn-hover-1 f-right" type="reset">Clear</button>
                                            </div> -->
                                        </div>
                                     </form>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- LOGIN SECTION END -->             

        </div>
        <!-- End page content -->
        
@endsection