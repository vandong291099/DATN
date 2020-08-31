@extends('layout')
@section('content')
 <!-- BREADCRUMBS SETCTION START -->
        <div class="breadcrumbs-section plr-200 mb-80">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title">THANH TOÁN</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
                                    <li>Thông tin giao hàng</li>
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
                        <div class="col-md-10">
                            <!-- Tab panes -->
                            <div class="tab-content">
                             @if(Session::get('Cart')->products==true)
                                <!-- checkout start -->


                                <div class="tab-pane active" id="info-cart">
                                    <div class="checkout-content box-shadow p-30">

                
                                        
                                            <div class="row">
                                                <!-- billing details -->
                                                <div class="col-md-6">

                                                    <div class="billing-details pr-10">
                                                        
                                                        <h6 class="widget-title border-left mb-20">Thông tin giao hàng</h6>
                                                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{!! $error !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                <form action="{{URL::to('/save-thanh-toan')}}" method="POST">
                    {{csrf_field()}}
                <input type="text" placeholder="Họ và tên" name="shipping_name">

                <input type="text" placeholder="Địa chỉ email"  name="shipping_email">

                <input type="number" min="0" placeholder="Số điện thoại"  name="shipping_phone">

                <input type="text" placeholder="Địa chỉ"  name="shipping_address">

                <textarea name="shipping_note" class="custom-textarea" placeholder="Ghi chú đơn hàng"></textarea>
                <br>
                <br>
                <input style="width: 100px;" type="submit" value="Gửi" name="send_order" class="btn btn-primary btn-sm">

                </form>
                                                            <br>
                                                         <br>
                                                 
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                @if(Session::has("Cart") != null)  

                                                   <div class="payment-details box-shadow p-30 mb-50" >
                                                        <h6 class="widget-title border-left mb-20">THÔNG TIN ĐƠN HÀNG</h6>
                                                        <table>
                                                            <tr>
                                                                <td class="td-title-1">Số lượng</td>
    <td class="td-title-2" >{{Session::get('Cart')->totalQuanty}}</td>
                                                            </tr>
                                                        <tr>
                                                                <td class="order-total">Tổng tiền</td>
                                                                <td class="order-total-price">{{number_format(Session::get('Cart')->totalPrice).' '.'VNĐ'}}</td>
                                                            </tr>


                                        @if(Session::get('coupon'))
                                        @foreach(Session::get('coupon') as $key => $cou)
                                        @if($cou['coupon_condition']=='Giảm theo phần trăm')
                                        <tr>
                                        <td class="td-title-1">Chiết khấu</td>
                                        <td class="td-title-2">
                                            {{$cou['coupon_number']}} %
                                        </td>
                                        </tr>

                                        <tr>
                                        <td class="td-title-1">Tổng giảm</td>
                                         <td class="td-title-2" >
                                            @php 
                                                $total_coupon = (Session::get('Cart')->totalPrice*$cou['coupon_number'])/100;
                                              echo number_format($total_coupon,0,',','.').' '.'VND'
                                            @endphp
                                        </td>
                                        </tr> 

                                        <tr>
                                        <td class="order-total">Tổng đã giảm</td>
                                        <td class="order-total-price" >
                                        {{number_format(Session::get('Cart')->totalPrice-$total_coupon,0,',','.')}} VNĐ
                                        </td>
                                        </tr>
                                        @elseif($cou['coupon_condition']=='Giảm theo giá tiền')
                                     <tr>
                                        <td class="td-title-1">Chiết khấu</td>
                                       
                                          <td class="td-title-2">{{number_format($cou['coupon_number'],0,',','.')}} VNĐ</td>  
                                        
                                    </tr>
                                        
                                        <p>
                                        
                                            @php 
                                                $total_coupon = Session::get('Cart')->totalPrice - $cou['coupon_number'];
                                
                                                @endphp
                                        <p>
                                       
                                        <tr>
                                        <td class="order-total">Tổng đã giảm</td>
                                        <td class="order-total-price" >
                                        {{number_format($total_coupon,0,',','.')}} VNĐ
                                        </td>
                                        </tr> 
                                        @endif
                                    @endforeach
                                    @endif  
    
                                                </table>
                                                @endif
                                                 
                                              
                                                 
                                                </div>
                                            </div>
                                        
                                    </div>
                        @else 
                        <tr>
                            <td colspan="6"><center>
                            @php 
                            echo 'Giỏ hàng của bạn đang trống';
                            @endphp
                            <br>
                            <br>
                            <a href="{{URL::to('/san-pham')}}" class="button extra-small button-black" tabindex="-1" title="Thanh toán">
                                    <span class="text-uppercase">TIẾP TỤC MUA HÀNG</span></a>
                            </center></td>
                        </tr>
                        @endif
                                </div>
                                <!-- checkout end -->
                </div>
            </div>
            <!-- SHOP SECTION END -->             

        </section>
        <!-- End page content -->

@endsection