@extends('layout')
@section('content')
<!-- BREADCRUMBS SETCTION START -->
        <div class="breadcrumbs-section plr-200 mb-80">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title">CẢM ƠN BẠN ĐÃ ĐẶT HÀNG!</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMBS SETCTION END -->
            <!-- Start page content -->
        <section id="page-content" class="page-wrapper">

            <!-- SHOP SECTION START -->
            <div class="shop-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <ul class="cart-tab">
                                <li>
                                    <a class="active" href="#shopping-cart" data-toggle="tab">
                                        <span>01</span>
                                        Shopping cart
                                    </a>
                                </li>
                                <li>
                                    <a class="active" href="#wishlist" data-toggle="tab">
                                        <span>02</span>
                                        Wishlist
                                    </a>
                                </li>
                                <li>
                                    <a class="active" href="#checkout" data-toggle="tab">
                                        <span>03</span>
                                        Checkout
                                    </a>
                                </li>
                                <li>
                                    <a href="#order-complete" data-toggle="tab">
                                        <span>04</span>
                                        Order complete
                                    </a>
                                </li>
                            </ul>
                        </div>
                         
                               
                        <div class="col-md-8">
                                <!-- order-complete start -->
                                <div class="tab-pane" id="order-complete">
                                
                                    <div class="order-complete-content box-shadow">
                                        <div class="thank-you p-30 text-center">
                                            <h6 class="text-black-5 mb-0">Cảm ơn bạn. Đơn đặt hàng của bạn đã được nhận; Đã nhận được đơn đặt hàng của bạn.</h6>
                                        </div>
                                     
                                      
                                    </div>
                                </div>
                               
                            </div>
                                <!-- order-complete end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SHOP SECTION END -->             

        </section>
        <!-- End page content -->
@endsection