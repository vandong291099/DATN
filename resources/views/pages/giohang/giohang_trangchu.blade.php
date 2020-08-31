
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
                                             <input hidden id="total-quanty-cart" type="number" value="{{Session::get('Cart')->totalQuanty}}">             
                                                    </div>
                                                </li>
@endif

