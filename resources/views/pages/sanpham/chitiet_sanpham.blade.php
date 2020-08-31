@extends('layout')
@section('content')

<!-- BREADCRUMBS SETCTION START -->
        <div class="breadcrumbs-section plr-200 mb-80">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title">CHI TIẾT SẢN PHẨM</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
                                    <li>Chi tiết sản phẩm</li>
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
                    
                        <div class="col-md-9 col-xs-12">
                        @foreach($chitietsanpham as $key => $value)
                            <!-- single-product-area start -->
                            <div class="single-product-area mb-80">
                                <div class="row">

                                    <!-- imgs-zoom-area start -->
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <div class="imgs-zoom-area">
                                            <img id="zoom_03" src="{{URL::to('/public/uploads/product/'.$value->product_image)}}" data-zoom-image="{{URL::to('/public/uploads/product/'.$value->product_image)}}" alt="">
                                            
                                        </div>
                                    </div>
                                    <!-- imgs-zoom-area end -->
                                    <!-- single-product-info start -->
                                    <div class="col-md-7 col-sm-7 col-xs-12"> 
                                        <div class="single-product-info">
                                            <h3 class="text-black-1">{{$value->product_name}}</h3>
                                            <h6 class="brand-name-2">{{$value->brand_name}}</h6>
                                            <!--  hr -->
                                          <!--   <hr> -->
                                            <!-- single-pro-color-rating -->
                                          <!--   <div class="single-pro-color-rating clearfix">
                                                <div class="sin-pro-color f-left">
                                                    <p class="color-title f-left"><b>{{$value->product_status}}</b></p>
                                                    
                                                </div>
                                               
                                            </div> -->
                                            <!-- hr -->
                                           
                                            <!-- plus-minus-pro-action -->
                                            <!-- <div class="plus-minus-pro-action clearfix">
                                                <div class="sin-plus-minus f-left clearfix">
                                                    <p class="color-title f-left"><b>Số lượng:  </b></p>
                                                   
                                                        <input type="number" value="1" min="1" name="qty" class="cart-plus-minus-box">
                                                        <input name="productid_hidden" type="hidden"  value="{{$value->product_id}}" />

                                                    
                                                </div>
                                              
                                            </div> -->
                                            <!-- plus-minus-pro-action end -->
                                            <!-- hr -->
                                            <hr>
                                            <!-- single-product-price -->
                                            <h3 class="pro-price">{{number_format($value->product_price).' '.'VNĐ'}}</h3>
                                            <!--  hr -->
                                            <hr>
                                            <div>

                                              

                                                <a onclick="AddCartDetail({{$value->product_id}})" href="javascript:" class="button extra-small button-black" tabindex="-1" title="Thêm giỏ hàng">
                                                    <span class="text-uppercase">Thêm giỏ hàng</span>
                                                </a>
                                            </div>
                                        </div>    
                                    </div>
                                    <!-- single-product-info end -->
                                </div>
                                <!-- single-product-tab -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- hr -->
                                        <hr>
                                        <div class="single-product-tab">
                                            <ul class="reviews-tab mb-20">
                                                <li  class="active"><a href="#description" data-toggle="tab">Mô tả sản phẩm</a></li>
                                                <li ><a href="#information" data-toggle="tab">Thông số kỹ thuật</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="description">
                                                    <p>{!!$value->product_description!!}</p>
                                                   
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="information">
                                                    <p>{!!$value->product_content!!}</p>
                                                    
                                                </div>
                                               
                                            </div>
                                        </div>
                                        <!--  hr -->
                                        <hr>
                                    </div>
                                    @endforeach
                                </div>
                                
                            </div>
                            
                            <!-- single-product-area end -->
                            <div class="related-product-area">
                                <div class="row">
                               
                                    <div class="col-md-12">
                                        <div class="section-title text-left mb-40">
                                            <h2 class="uppercase">Sản phẩm liên quan</h2>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="active-related-product">
                                    @foreach($sanphamlienquan as $key => $lienquan)
                                   
                                        <!-- product-item start -->
                                        <div class="col-xs-12">
                                            <div class="product-item">
                                                <div class="product-img">
                                                 <a href="{{URL::to('/chi-tiet-san-pham/'.$lienquan->product_slug)}}">    
                                                        <img src="{{URL::to('/public/uploads/product/'.$lienquan->product_image)}}" alt=""/>
                                                  </a> 
                                                </div>
                                                <div class="product-info">
                                                    <h6 class="product-title">
                                                        <a href="{{URL::to('/chi-tiet-san-pham/'.$lienquan->product_slug)}}">{{$lienquan->product_name}}</a>
                                                    </h6>
                                                    <div class="pro-rating">
                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                    </div>
                                                    <h3 class="pro-price">{{number_format($lienquan->product_price).' '.'VNĐ'}}</h3>
                                                    <ul class="action-button">
                                                        
                                                        <li>
                                                           <a onclick="AddCartDetail({{$lienquan->product_id}})" href="javascript:" title="Thêm giỏ hàng"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product-item end -->
                                       
                                        @endforeach
                                      
                                       
                                    </div>   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12">
                           
                            <aside class="widget widget-categories box-shadow mb-30">
                                
                                <h6 class="widget-title border-left mb-20">Danh mục</h6>
                                @foreach($danhmuc as $key => $category)
                                <div id="cat-treeview" class="product-cat">
                                    <ul>
                                    <li class="closed"><a href="{{URL::to('/danh-muc-san-pham/'.$category->category_slug)}}">{{$category->category_name}}</a>
                                           
                                    </li>                                       
                                       
                                    </ul>
                                </div>
                                @endforeach
                            </aside>
                         
                            <aside class="widget widget-product box-shadow">

                                <h6 class="widget-title border-left mb-20">Sản phẩm nổi bật</h6>
                                @foreach($sanphamnoibat as $key => $prod)
                                <a href="{{URL::to('/chi-tiet-san-pham/'.$prod->product_slug)}}">
                                <!-- product-item start -->
                                <div class="product-item">
                                    <div class="product-img">
                                        
                                            <img src="{{URL::to('/public/uploads/product/'.$prod->product_image)}}" alt=""/>
                                        
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a href="{{URL::to('/chi-tiet-san-pham/'.$prod->product_slug)}}">{{$prod->product_name}}</a>
                                        </h6>
                                        <h3 class="pro-price">{{number_format($prod->product_price).' '.'VNĐ'}}</h3>
                                    </div>
                                </div>
                                <!-- product-item end -->
                                </a>
                                @endforeach
                                           
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SHOP SECTION END -->             

        </section>
        <!-- End page content -->


@endsection