@extends('layout')
@section('content')
  <!-- BREADCRUMBS SETCTION START -->
        <div class="breadcrumbs-section plr-200 mb-80">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title">HÌNH THỨC THANH TOÁN</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
                                    <li><a href="{{URL::to('/gio-hang')}}">Xem lại giỏ hàng</a></li>
                                    <li>Hình thức thanh toán</li>
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
                             <div class="tab-pane active" id="infor-thanhtoan">
                            
                                
                                    <div class="checkout-content box-shadow p-30">
                                        <form action="{{URL::to('/dat-hang')}}" method="POST">
                                            {{ csrf_field() }}
                                            <div class="row">
                                   
                                            
                                                <div class="col-md-10">
                                                    <!-- our order -->
                                                     @if(Session::has("Cart") != null)  

                                                    <div class="payment-details pl-10 mb-50">
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
 
                                                    </div>
                                                     @endif
                                                 </div>
                                                
                                                <div class="col-md-10">
                                                    <!-- payment-method -->

                                                    <div class="payment-method">

                                                        <h6 class="widget-title border-left mb-20">Hình thức thanh toán</h6>
                                                        <div>
                                                        <ul class="alert text-danger">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                    <div class="form-group">
                                   
                                     <select name="payment_option" class="form-control input-sm m-bot15">
                                             <option value="0">Chọn hình thức thanh toán</option>
                                            <option value="ATM">Chuyển khoản (ATM)</option>
                                            <option value="ShipCOD">Thanh toán khi giao hàng (COD)</option>
                                            
                                    </select>
                                </div>

                    @if(Session::get('coupon'))
                    @foreach(Session::get('coupon') as $key => $cou)
                    <input type="hidden" name="order_coupon" class="order_coupon" value="{{$cou['coupon_code']}}">
                    @endforeach
                    @else 
                    <input type="hidden" name="order_coupon" class="order_coupon" value="Không">
                    @endif
                   
                                                    </div>
                                                <br>
                                                <br>
                                                    <!-- payment-method end -->
                                                   <input style="width: 100px;" type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-primary btn-sm">
                                                     </div>
                                                </div>
                                            </div>
                                        </form>
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
                    </div>
                </div>
            </div>
            <!-- SHOP SECTION END -->             

        </section>
        <!-- End page content -->
@endsection