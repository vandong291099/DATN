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
                                <h1 class="breadcrumbs-title">ĐĂNG NHẬP</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
                                <li>Đăng nhập</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- LOGIN SECTION START -->
            <div class="login-section mb-80">
                <div style="margin-right: -150px;" class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="registered-customers">

                                <div class="col-md-20">
                             <div class="login-account p-30 box-shadow">
                            <div class="new-customers">
                                
                                <h6 class="widget-title border-left mb-50">ĐĂNG NHẬP</h6>
                               
                    <?php
                        $message = Session::get('message');
                        if($message) 
                {
                    echo '<span class="text-alert">'.$message.'</span>';
                            Session::put('message',null);   
                }
                    ?> 
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{!! $error !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
   
                                <form action="{{URL::to('/dangnhap-khachkhang')}}" method="POST">
                                {{ csrf_field() }}
                                    
                                        <p>Nếu bạn có tài khoản với chúng tôi, vui lòng đăng nhập.</p>
                                        <input type="text" name="email_account"     placeholder="Tài khoản đăng nhập" >
                                        <input type="password" name="password_account"    placeholder="Mật khẩu" >
                                        <!-- <input type="password" name="password_account_again"    placeholder="Nhập lại mật khẩu" > -->
                                        <p><a href="{{URL::to('/dangky-thanhtoan')}}">Đăng kí tài khoản.</a></p>
                                        <button class="submit-btn-1 btn-hover-1" type="submit">Đăng nhập</button>
                                   
                                </form>
                            </div>
                        </div>
                        
                        </div>
                    </div>
                </div>
            </div>
            <!-- LOGIN SECTION END -->             

        </div>
    </div>
        <!-- End page content -->
        
@endsection