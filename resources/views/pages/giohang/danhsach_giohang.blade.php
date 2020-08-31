    @if(session()->has('message'))
                                        <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                        </div>
                                        @elseif(session()->has('error'))
                                        <div class="alert alert-danger">
                                        {{ session()->get('error') }}
                                        </div>
                                        @endif
                                            <div class="table-content table-responsive mb-50">
                               @if(count($errors) > 0)
                                <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{!! $error !!}</li>
                                    @endforeach
                                </ul>
                                </div>
                                @endif
                                                <table class="text-center">
                                                    <thead>
                                                        <tr>
                                                            <th class="product-thumbnail">Sản phẩm</th>
                                                            <th class="product-price">Giá</th>
                                                            <th class="product-quantity">Số lượng</th>
                                                            <th class="product-subtotal">Thành tiền</th>
                                                             <th class="product-remove">Cập nhật</th>
                                                            <th class="product-remove">Xóa</th>
                                                           
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                            @if(Session::get('Cart')->products==true)
                            @if(Session::has("Cart") != null)    
                            @foreach(Session::get('Cart')->products as $item)
                                                        <!-- tr -->
                                                        <tr>
                                                            <td class="product-thumbnail">
                                                                <div class="pro-thumbnail-img">
                                                                    <img src="public/uploads/product/{{$item['productInfo']->product_image}}" alt="">
                                                                </div>
                                                                <div class="pro-thumbnail-info text-left">
                                                                    <h6 class="product-title-2">
                                                                        <a href="#">{{$item['productInfo']->product_name}}</a>
                                                                    </h6>
                                                                   <!--  <p>Brand: Brand Name</p>
                                                                    <p>Model: Grand s2</p>
                                                                    <p> Color: Black, White</p> -->
                                                                </div>
                                                            </td>
                                                            <td class="product-price">{{number_format($item['productInfo']->product_price).' '.'VNĐ'}}</td>
                                                            <td class="product-quantity">
                          <div class="cart-plus-minus f-left">
                    <input id="quanty-item-{{$item['productInfo']->product_id}}" type="text" min="1" value="{{$item['quanty']}}" name="qtybutton" class="cart-plus-minus-box">
                                                                </div> 
                           
                               
                         <!--    <input id="quanty-item-{{$item['productInfo']->product_id}}" type="number" min="1"  value="{{$item['quanty']}}" name="qtybutton"> -->
                        

                                                            </td>
                                                            <td class="product-subtotal">{{number_format($item['product_price']).' '.'VNĐ'}}</td>
                                                                <td class="product-remove">
                <a><i class="zmdi zmdi-save" onclick="SaveListItemCart({{$item['productInfo']->product_id}});"></i></a>
                                                            </td>
                                                            <td class="product-remove">
            <a><i class="zmdi zmdi-close" onclick="DeleteListItemCart({{$item['productInfo']->product_id}});"></i></a>
                                                            </td>
                                                        </tr>
                                                        <!-- tr -->
                                    @endforeach

                                    @endif

                                    @else 
                        <tr>
                            <td colspan="6"><center>
                            @php 
                            echo 'Giỏ hàng của bạn đang trống';
                            @endphp
                            </center></td>
                        </tr>
                        @endif


                                                    </tbody>
                                                </table>
                                            </div>
                            <div class="row">
                            @if(Session::get('Cart')->products)
                            <div class="col-md-12">    
                                            <form action="{{URL::to('/check-coupon')}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="coupon-discount box-shadow p-30 mb-50">
                                                        <h6 class="widget-title border-left mb-20">MÃ KHUYẾN MÃI</h6>
                                                        <p>Nhập mã phiếu giảm giá của bạn nếu bạn có!</p>
                                                        <input type="text" name="coupon" placeholder="Nhập mã của bạn ở đây.">
                                                        <input type="submit" value="Tính mã giảm giá" name="send_contact" class="submit-btn-1 mt-30 btn-hover-1">
                                                        </div>
                                                </form>
                                </div>
                                @endif
                                </div>

                                                


                                                    
                                              <div class="row"> 
                                                @if(Session::has("Cart") != null)
                                                <div class="col-md-12">
                                                    <div class="payment-details box-shadow p-30 mb-50">
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
                                            <br>


                                                    <?php
                                    $customer_id = Session::get('customer_id');
                                    if($customer_id!=NULL)
                                {
                                    ?>
                                    <a href="{{URL::to('/thanh-toan')}}" class="button extra-small button-black" tabindex="-1" title="Thanh toán">
                                    <span class="text-uppercase">THANH TOÁN</span></a>
                                    <?php
                                }
                                else
                                {
                                    ?>

                                    <a href="{{URL::to('/dangnhap-thanhtoan')}}" class="button extra-small button-black" tabindex="-1" title="Thanh toán">
                                    <span class="text-uppercase">THANH TOÁN</span></a>
                                    <?php
                                }

                                    ?>

                                                       
                                                    </div>
                                                </div>
                                            @endif
                                            </div>
                                        </div>