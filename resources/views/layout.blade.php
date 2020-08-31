<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from demo.hasthemes.com/subas-preview/subas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Jun 2019 07:20:42 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Subas || Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/frontend/img/icon/favicon.png')}}">

    <!-- All CSS Files -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}">

    <!-- Nivo-slider css -->
    <link rel="stylesheet" href="{{asset('public/frontend/lib/css/nivo-slider.css')}}">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/core.css')}}">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/shortcode/shortcodes.css')}}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/responsive.css')}}">
    <!-- User style -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/custom.css')}}">
    
  <!--   <link rel="stylesheet" href="{{asset('public/frontend/css/material-design-iconic-font.css')}}"> -->


  <!-- CSS -->
<link rel="stylesheet" href="{{asset('public/frontend/css/alertify.min.css')}}"/>
<!-- Default theme -->
<link rel="stylesheet" href="{{asset('public/frontend/css/default.min.css')}}"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="{{asset('public/frontend/css/semantic.min.css')}}"/>
    
   
 <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/jquery.fancybox.min.css')}}" media="screen" />

        
    <!-- Style customizer (Remove these two lines please) -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/style-customizer.css')}}">

    <!-- Modernizr JS -->
    <script src="{{asset('public/frontend/js/vendor/modernizr-2.8.3.min.js')}}"></script>
   
</head>

<body>
<div class="wrapper">
    
    <!-- START HEADER AREA -->
        <header class="header-area header-wrapper">
            <!-- header-top-bar -->
            <div class="header-top-bar plr-185">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 hidden-xs">
                            <div class="call-us">
                                <p class="mb-0 roboto">(+84) 352839972</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="top-link clearfix">
                                <ul class="link f-right">
                                    <li>
                                        <a>
                                            <i class="zmdi zmdi-account"></i>
                                            <?php
                                        $name = Session::get('customer_name');
                                            if($name)
                                            {
                                            echo $name; 
                                                }
                                            ?>
                                        </a>
                                    </li>

                                
                                    <?php
                                    $customer_id = Session::get('customer_id');
                                    if($customer_id!=NULL)
                                {
                                    ?>

                                        <li>
                                        <a href="{{URL::to('/dangxuat-thanhtoan')}}">
                                            <i class="zmdi zmdi-lock"></i>
                                            Đăng xuất
                                        </a>
                                    </li>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <li>
                                        <a href="{{URL::to('/dangnhap-thanhtoan')}}">
                                            <i class="zmdi zmdi-lock"></i>
                                            Đăng nhập
                                        </a>
                                    </li>

                                    
                                    <?php
                                }

                                    ?>
                                   
                                  
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- header-middle-area -->
            <div id="sticky-header" class="header-middle-area plr-185">
                <div class="container-fluid">
                    <div class="full-width-mega-dropdown">
                        <div class="row">
                            <!-- logo -->
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <div class="logo">
                                    <a href="{{URL::to('/')}}">
                                        <img src="{{asset('public/frontend/img/logo/logo.png')}}" alt="main logo">
                                    </a>
                                </div>
                            </div>
                            <!-- primary-menu -->
                        <div class="col-md-8 hidden-sm hidden-xs">
                            <nav id="primary-menu">
                                <ul class="main-menu text-center">
                                    <li><a href="{{URL::to('/trang-chu')}}">Trang chủ</a>
                                     </li>
                                        
                                        <li class="mega-parent"><a href="{{URL::to('/')}}">Danh mục</a>
                                              
                                            <div class="mega-menu-area clearfix">
                                               
                                            <div class="mega-menu-link mega-menu-link-4  f-left">
                                            
                                            @foreach($danhmuc as $key => $cate)
                                            <a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_slug)}}">
                                            <ul class="single-mega-item">
                                                <li class="menu-title">
                                                {{$cate->category_name}}
                                                        </li>
                                          
                                                    </ul>
                                                </a>
                                            @endforeach
                                     
                                                </div>
                                                  
                                            </div>
                                            
                                        </li>
                                        
                                        <li class="mega-parent"><a href="{{URL::to('/san-pham')}}">sản phẩm</a></li>
                                        <li><a href="{{URL::to('/tin-tuc')}}">tin tức</a>
                                        
                                        </li>
                                        <li>
                                            <a href="{{URL::to('/lien-he')}}">Liên hệ</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- header-search & total-cart -->
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <div class="search-top-cart  f-right">
                                    <!-- header-search -->
                                    <div class="header-search f-left">
                                        <div class="header-search-inner">
                                           <button class="search-toggle">
                                            <i class="zmdi zmdi-search"></i>
                                           </button>
                                            <form action="{{URL::to('/tim-kiem')}}" method="POST">
                                                {{ csrf_field() }}
                                                <div class="top-search-box">
                                                    <input type="text" name="keywords_submit" placeholder="Tìm kiếm sản phẩm...">
                                                    <input type="submit" name="timkiem_items" value="Tìm kiếm">
                                                </div>
                                            </form> 
                                        </div>
                                    </div>
                                    <!-- total-cart -->
                                    <div class="total-cart f-left">
                                        <div class="total-cart-in">
                                            <div class="cart-toggler">
                                                <a href="#">
                                                @if(Session::has("Cart") != null)
                                                <span id="total-quanty-show" class="cart-quantity">{{Session::get('Cart')->totalQuanty}}</span>
                                                @else
                                                <span id="total-quanty-show" class="cart-quantity">0</span>
                                                @endif
                                                    <br>
                                                    <span class="cart-icon">
                                                        <i class="zmdi zmdi-shopping-cart-plus"></i>
                                                    </span>
                                                </a>                            
                                            </div>
                                            <ul>


<li>
<div class="top-cart-inner your-cart">
<h5 class="text-capitalize">Giỏ hàng</h5>
</div>
</li>

<div id="change-item-cart">
@if(Session::has("Cart") != null)
                                   
<li>
                                        
                                            <div class="total-cart-pro">
                                                        <!-- single-cart -->
                                            @foreach(Session::get('Cart')->products as $item)
                                                        <div class="single-cart clearfix">
                                                            <div class="cart-img f-left">
                                                                <a href="#">
                <img width="45px" height="45px" src="{{URL::to('/public/uploads/product/'.$item['productInfo']->product_image)}}" alt="Cart Product"  />
                                                                </a>
                                                                <div class="del-icon">
                                                               <a>    
                            <i class="zmdi zmdi-close" data-id="{{$item['productInfo']->product_id}}"></i>
                                                                 </a>  
                                                                </div>
                                                            </div>
                                                            <div class="cart-info f-left">
                                                                <h6 class="text-capitalize">
                                                                    <a href="#">{{$item['productInfo']->product_name}}</a>
                                                                </h6>
                                                                <p>
                                    {{number_format($item['productInfo']->product_price).' '.'VNĐ'}} x  <b> {{$item['quanty']}} </b>
                                                                </p>
                                                               
                                                            </div>
                                                        </div>
                                                @endforeach
                                                    </div>
                                                    
                                                </li>
                                                <li>
                                                    <div class="top-cart-inner subtotal">
                                                        <h4 class="text-uppercase g-font-2">
                                                            Thành tiền  =  
                                                            <span>{{number_format(Session::get('Cart')->totalPrice).' '.'VNĐ'}}</span>
                                                        </h4>
                                                    </div>
                                                </li>
@endif
</div>

                                                <li>
                                   
                                                    <div class="top-cart-inner view-cart">
                                                        <h4 class="text-uppercase">
                                                            <a href="{{URL::to('/gio-hang')}}">Xem giỏ hàng</a>
                                                        </h4>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="top-cart-inner check-out">
                                                        <h4 class="text-uppercase">

                                <?php
                                   $customer_id = Session::get('customer_id');
                                   $shipping_id = Session::get('shipping_id');
                                   if($customer_id!=NULL && $shipping_id==NULL)
                                { 
                                 ?>
                                 <a href="{{URL::to('/thanh-toan')}}">Thanh toán</a>
                                
                                <?php
                                 }
                                 elseif($customer_id!=NULL && $shipping_id!=NULL)
                                 {
                                 ?>
                                 <li><a href="{{URL::to('/thanh-toan')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                 <?php 
                                }
                                else
                                {
                                ?>
                                <a href="{{URL::to('/dangnhap-thanhtoan')}}">Thanh toán</a>
                                <?php
                                 }
                                ?>
                                                        </h4>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
      <!-- END HEADER AREA -->
   
      

        <!-- START SLIDER AREA -->
        <div class="slider-area  plr-185  mb-80">
            <div class="container-fluid">
                <div class="slider-content">
                    <div class="row">
                        <div class="active-slider-1 slick-arrow-1 slick-dots-1">
                            <!-- layer-1 Start -->
                            <div class="col-md-12">
                                <div class="layer-1">
                                    <div class="slider-img">
                                        <img src="{{asset('public/frontend/img/slider/slider-1/1.jpg')}}" alt="">
                                    </div>
                                    <div class="slider-info gray-bg">
                                        <div class="slider-info-inner">
                                            <h1 class="slider-title-1 text-uppercase text-black-1">HÃY Ở NHÀ PHỤ KIỆN GIAO TẬN NHÀ</h1>
                                            <div class="slider-brief text-black-2">
                                                <p>Đem nhiều mẫu chọn.</p>
                                            </div>
                                            <a href="{{URL::to('/san-pham')}}" class="button extra-small button-black">
                                                <span class="text-uppercase">Xem ngay</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- layer-1 end -->
                            <!-- layer-1 Start -->
                            <div class="col-md-12">
                                <div class="layer-1">
                                    <div class="slider-img">
                                        <img src="{{asset('public/frontend/img/slider/slider-1/2.jpg')}}" alt="">
                                    </div>
                                    <div class="slider-info gray-bg">
                                        <div class="slider-info-inner">
                                            <h1 class="slider-title-1 text-uppercase text-black-1">SMARTPHONE</h1>
                                            <div class="slider-brief text-black-2">
                                                <p>Chúng tôi bắt đầu mọi chuyển động mà bạn sẽ yêu thích.</p>
                                            </div>
                                            <a href="{{URL::to('/san-pham')}}" class="button extra-small button-black" class="button extra-small button-black">
                                                <span class="text-uppercase">Xem ngay</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- layer-1 end -->
                            <!-- layer-1 Start -->
                           <!--  <div class="col-md-12">
                                <div class="layer-1">
                                    <div class="slider-img">
                                        <img src="{{asset('public/frontend/img/slider/slider-1/3.png')}}" alt="">
                                    </div>
                                    <div class="slider-info gray-bg">
                                        <div class="slider-info-inner">
                                            <h1 class="slider-title-1 text-uppercase text-black-1">WaterProof smartphone</h1>
                                            <div class="slider-brief text-black-2">
                                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum,</p>
                                            </div>
                                            <a href="#" class="button extra-small button-black">
                                                <span class="text-uppercase">Buy now</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- layer-1 end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
     
        @yield('content')

         <!-- START FOOTER AREA -->
        <footer id="footer" class="footer-area">
            <div class="footer-top">
                <div class="container-fluid">
                    <div class="plr-185">
                        <div class="footer-top-inner gray-bg">
                            <div class="row">
                                <div class="col-lg-4 col-md-5 col-sm-4">
                                    <div class="single-footer footer-about">
                                        <div class="footer-logo">
                                            <img src="{{asset('public/frontend/img/logo/logo.png')}}" alt="">
                                        </div>
                                        <div class="footer-brief">
                                            <p>Chúng tôi bắt đầu mọi chuyển động mà bạn sẽ yêu thích.</p>
                                            <p>Cam kết chất lượng phục vụ tốt nhất, chuyên nghiệp nhất cho mọi khách hàng bằng chính sách hoàn tiền và tặng quà nếu nhân viên phục vụ quý khách không chu đáo.</p>
                                            <p>Nếu bạn gặp rắc rối về sản phẩm hay chất lượng, hãy gọi ngay đến số 0352839972. </p>
                                           
                                        </div>
                                        <ul class="footer-social">
                                            <li>
                                                <a class="facebook" href="https://www.facebook.com/HHungMix" title="Facebook"><i class="zmdi zmdi-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a class="rss" href="https://www.instagram.com/ins_with.xim/" title="Instagram"><i class="zmdi zmdi-instagram"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-2 hidden-md hidden-sm">
                                    <div class="single-footer">
                                        <h4 class="footer-title border-left">CSKH</h4>
                                        <ul class="footer-menu">
                                            <li>
                                                <a href="{{URL::to('/lien-he')}}"><i class="zmdi zmdi-circle"></i><span>Than phiền/Chăm sóc khách hàng
                                                </span></a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4">
                                    <div class="single-footer">
                                        <h4 class="footer-title border-left">TÀI KHOẢN</h4>
                                        <ul class="footer-menu">
                                            <li>
                                                <a href="{{URL::to('/dangnhap-thanhtoan')}}"><i class="zmdi zmdi-circle"></i><span>Đăng nhập</span></a>
                                            </li>
                                            <li>
                                                <a href="{{URL::to('/dangki-thanhtoan')}}"><i class="zmdi zmdi-circle"></i><span>Đăng kí</span></a>
                                            </li>
                                           
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="single-footer">
                                        <h4 class="footer-title border-left">BẢN ĐỒ</h4>
                                        <div class="footer-message">
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.513780776301!2d106.69912411462093!3d10.771905862223038!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f40c7a0f411%3A0xe272a9c70ba4a66e!2zNjUgxJDGsOG7nW5nIEh14buzbmggVGjDumMgS2jDoW5nLCBC4bq_biBOZ2jDqSwgUXXhuq1uIDEsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1597938166641!5m2!1svi!2s" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom black-bg">
                <div class="container-fluid">
                    <div class="plr-185">
                        <div class="copyright">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="copyright-text">
                                        <p>&copy; <a href="#" target="_blank">DevItems</a> 2017. All Rights Reserved.</p>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END FOOTER AREA -->

       

        <!--style-customizer start -->
        <div class="style-customizer closed">
            <div class="buy-button">
                <a href="index.html" class="customizer-logo"><img src="{{asset('public/frontend/images/logo/logo.png')}}" alt="Theme Logo"></a>
                <a class="opener" href="#"><i class="zmdi zmdi-settings"></i></a>
            </div>
            <div class="clearfix content-chooser">
                <h3>Tùy chọn giao diện</h3>
                <p>Bạn muốn sử dụng tùy chọn bố cục nào?</p>
                <ul class="layoutstyle clearfix">
                    <li class="wide-layout selected" data-style="wide" title="wide"> Rộng </li>
                    <li class="boxed-layout" data-style="boxed" title="boxed"> Đóng hộp </li>
                </ul>
                <h3>Phối màu</h3>
                <p>Bạn muốn sử dụng màu chủ đề nào? Chọn từ đây.</p>
                <ul class="styleChange clearfix">
                    <li class="skin-default selected" title="skin-default" data-style="skin-default" ></li>
                    <li class="skin-green" title="green" data-style="skin-green"></li>
                    <li class="skin-purple" title="purple" data-style="skin-purple"></li>
                    <li class="skin-blue" title="blue" data-style="skin-blue"></li>
                    <li class="skin-cyan" title="cyan" data-style="skin-cyan"></li>
                    <li class="skin-amber" title="amber" data-style="skin-amber"></li>
                    <li class="skin-blue-grey" title="blue-grey" data-style="skin-blue-grey"></li>
                    <li class="skin-teal" title="teal" data-style="skin-teal"></li>
                </ul>
                <h3>Các mẫu nền</h3>
                <p>Bạn muốn sử dụng mẫu nền nào?</p>
                    <ul class="patternChange clearfix">
                    <li class="pattern-1" data-style="pattern-1" title="pattern-1"></li>
                    <li class="pattern-2" data-style="pattern-2" title="pattern-2"></li>
                    <li class="pattern-3" data-style="pattern-3" title="pattern-3"></li>
                    <li class="pattern-4" data-style="pattern-4" title="pattern-4"></li>
                    <li class="pattern-5" data-style="pattern-5" title="pattern-5"></li>
                    <li class="pattern-6" data-style="pattern-6" title="pattern-6"></li>
                    <li class="pattern-7" data-style="pattern-7" title="pattern-7"></li>
                    <li class="pattern-8" data-style="pattern-8" title="pattern-8"></li>
                </ul>
                <h3>Hình nền</h3>
                <p>Bạn muốn sử dụng hình nền nào?</p>
                <ul class="patternChange main-bg-change clearfix">
                    <li class="main-bg-1" data-style="main-bg-1" title="Background 1"> <img src="images/customizer/bodybg/01.jpg" alt=""></li>
                    <li class="main-bg-2" data-style="main-bg-2" title="Background 2"> <img src="images/customizer/bodybg/02.jpg" alt=""></li>
                    <li class="main-bg-3" data-style="main-bg-3" title="Background 3"> <img src="images/customizer/bodybg/03.jpg" alt=""></li>
                    <li class="main-bg-4" data-style="main-bg-4" title="Background 4"> <img src="images/customizer/bodybg/04.jpg" alt=""></li>
                    <li class="main-bg-5" data-style="main-bg-5" title="Background 5"> <img src="images/customizer/bodybg/05.jpg" alt=""></li>
                    <li class="main-bg-6" data-style="main-bg-6" title="Background 6"> <img src="images/customizer/bodybg/06.jpg" alt=""></li>
                    <li class="main-bg-7" data-style="main-bg-7" title="Background 7"> <img src="images/customizer/bodybg/07.jpg" alt=""></li>
                    <li class="main-bg-8" data-style="main-bg-8" title="Background 8"> <img src="images/customizer/bodybg/08.jpg" alt=""></li>
                </ul>
                <ul class="resetAll">
                    <li><a class="button button-border button-reset" href="{{URL::to('/')}}">Xóa tất cả</a></li>
                </ul>
            </div>
        </div>
        <!--style-customizer end -->

    <!-- Body main wrapper end -->
 
</div>
    <!-- Placed JS at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script  src="{{asset('public/frontend/js/vendor/jquery-3.1.1.min.js')}}"></script>

    <script src="{{asset('public/frontend/js/jsmap.js')}}"></script>

    <!-- Bootstrap framework js -->
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <!-- jquery.nivo.slider js -->
    <script src="{{asset('public/frontend/lib/js/jquery.nivo.slider.js')}}"></script>
    <!-- All js plugins included in this file. -->
    <script src="{{asset('public/frontend/js/plugins.js')}}"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
    
    <script src="{{asset('public/frontend/js/map.js')}}"></script>

    <script src="{{asset('public/frontend/js/ajax-mail.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/frontend/js/jquery.fancybox.pack.js')}}"></script>

 


    <!-- <script src="{{asset('public/backend/js/jquery.form-validator.min.js')}}"></script> -->

    
<!-- JavaScript -->
<script src="{{asset('public/frontend/js/alertify.min.js')}}"></script>
    
 <script type="text/javascript">
        function AddCart(product_id)
        {
           $.ajax({
            url: 'them-gio-hang/' + product_id,
            type: 'GET',
           }).done(function(result) // xong sẽ trả về kết quả result
           {
                RenderCart(result);
                alertify.success('Thêm vào giỏ hàng thành công');
           });
        }

        function AddCartCategory(product_id)
        {
           $.ajax({
            url: '/shoplaravel/' + 'them-gio-hang/' + product_id,
            type: 'GET',
           }).done(function(result) // xong sẽ trả về kết quả result
           {
                RenderCart(result);
                alertify.success('Thêm vào giỏ hàng thành công');
           });
        }
       

        $("#change-item-cart").on("click", ".del-icon i" , function()
        {
            $.ajax({
            url: 'xoa-gio-hang/' +$(this).data("id"),
            type: 'GET',
           }).done(function(result) // xong sẽ trả về kết quả result
           {    

                RenderCart(result.view_1);
                RenderListCart(result.view_2);
                RenderInforCart(result.view_3);
                RederInforHinhThuc(result.view_4);
                alertify.success('Xóa sản phẩm thành công');
           });
        });

        $("#change-item-cart").on("click", ".del-icon i" , function()
        {
            $.ajax({
            url: '/shoplaravel/' + 'xoa-gio-hang/' +$(this).data("id"),
            type: 'GET',
           }).done(function(result) // xong sẽ trả về kết quả result
           {    

                RenderCart(result.view_1);
                alertify.success('Xóa sản phẩm thành công');
           });
        });


        function AddCartDetail(product_id)
        {
           $.ajax({
            url: '/shoplaravel/' + 'them-gio-hang/' + product_id,
            type: 'GET',
           }).done(function(result) // xong sẽ trả về kết quả result
           {
                RenderCart(result);
                alertify.success('Thêm vào giỏ hàng thành công');
           });
        }


        function RenderCart(result)
        {   
            $("#change-item-cart").empty();
            $("#change-item-cart").html(result);
            $("#total-quanty-show").text($("#total-quanty-cart").val());
        }

       

        function DeleteListItemCart(product_id)
        {
            $.ajax({
            url: 'xoa-danh-sach-gio-hang/' + product_id,
            type: 'GET',
            
           }).done(function(result) // xong sẽ trả về kết quả result
           {    
                
                RenderListCart(result.view_1);
                RenderCart(result.view_2);
                alertify.success('Xóa sản phẩm thành công');
           });
        }

        function SaveListItemCart(product_id)
        {
            $("#quanty-item-" + product_id).val(); //giá trị số lượng đã thay đổi
            $.ajax({
            url: 'save-danh-sach-gio-hang/' + product_id + '/' + $("#quanty-item-" + product_id).val() ,
            type: 'GET',
           }).done(function(result) // xong sẽ trả về kết quả result
           {    

                RenderListCart(result.view_1);
                RenderCart(result.view_2);
                alertify.success('Cập nhật số lượng thành công');
           });
        }





        function RenderInforCart(result)
        {
            $("#info-cart").empty();
            $("#info-cart").html(result);
        }

        function RederInforHinhThuc(result)
        {
            $("#infor-thanhtoan").empty();
            $("#infor-thanhtoan").html(result);
        }


        function RenderListCart(result)
        {
            $("#list-cart").empty();
            $("#list-cart").html(result);

          
          
            


            $(".cart-plus-minus").prepend('<div class="dec qtybutton">-</div>');
            $(".cart-plus-minus").append('<div class="inc qtybutton">+</div>');
            $(".qtybutton").on("click", function() {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        if ($button.text() == "+") {
            var newVal = parseFloat(oldValue) + 1;
        } 
        else {
            // Don't allow decrementing below zero
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
            } 
            else {
                newVal = 1;
            }
        }
        $button.parent().find("input").val(newVal);
    });
        }
    </script>

</body>


<!-- Mirrored from demo.hasthemes.com/subas-preview/subas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Jun 2019 07:20:53 GMT -->
</html>