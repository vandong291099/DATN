       <div class="checkout-content box-shadow p-30">

                

                                            <div class="row">
                                                <!-- billing details -->
                                                <div class="col-md-6">
                                                    <div class="billing-details pr-10">
                                                        <h6 class="widget-title border-left mb-20">Thông tin giao hàng</h6>
                <form action="{{URL::to('/save-thanh-toan')}}" method="POST">
                    {{csrf_field()}}
                <input type="text" placeholder="Họ và tên" name="shipping_name">

                <input type="text" placeholder="Địa chỉ email"  name="shipping_email">

                <input type="text" placeholder="Số điện thoại"  name="shipping_phone">

                <input type="text" placeholder="Địa chỉ"  name="shipping_address">

                <textarea name="shipping_note" class="custom-textarea" placeholder="Ghi chú đơn hàng"></textarea>
                <br>
                <input style="width: 100px;" type="submit" value="Gửi" name="send_order" class="btn btn-primary btn-sm">

                </form>
                                                    
                                                       
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
                                                
                                                  
                                                  <!--   <button class="submit-btn-1 mt-30 btn-hover-1" type="submit">place order</button> -->
                                                 
                                                </div>
                                            </div>
                                        
                                    </div>