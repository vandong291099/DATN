@extends('layout')
@section('content')
<!-- Start page content -->
<section id="page-content" class="page-wrapper">
<!-- BY BRAND SECTION START-->
<div class="by-brand-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title text-left mb-40">
                                <h2 class="uppercase">THƯƠNG HIỆU SẢN PHẨM</h2>
                               <!--  <h6>There are many variations of passages of brands available,</h6> -->
                            </div>
                        </div>
                    </div>
                    <div class="by-brand-product">
                        <div class="row active-by-brand slick-arrow-2">
                            <!-- single-brand-product start -->
                            @foreach($thuonghieu as $key => $brand)
                            <div class="col-xs-12">
                                <div class="single-brand-product">
                                    <a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_slug)}}"><img src="{{asset('public/frontend/img/product/5.jpg')}}" alt=""></a>
                                    <h3 class="brand-title text-gray">
                                        <a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_slug)}}">{{$brand->brand_name}}</a>
                                    </h3>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- BY BRAND SECTION END -->

             <!-- FEATURED PRODUCT SECTION START -->
            <div class="featured-product-section mb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title text-left mb-40">
                                <h2 class="uppercase">Sản phẩm nổi bật nhất</h2>
                               <!--  <h6>There are many variations of passages of brands available,</h6> -->
                            </div>
                        </div>
                    </div>
                   
                    <div class="featured-product">
                        <div class="row active-featured-product slick-arrow-2">
                            <!-- product-item start -->
                             @foreach($sanphamnoibat as $key => $noibat)
                       
                            <div class="col-xs-12">
                                <div class="product-item">
                                    <div class="product-img">
                                <a href="{{URL::to('/chi-tiet-san-pham/'.$noibat->product_slug)}}">   
                                            <img src="{{URL::to('/public/uploads/product/'.$noibat->product_image)}}" alt=""/>
                                 </a>
                                       
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a href="{{URL::to('/chi-tiet-san-pham/'.$noibat->product_slug)}}">{{$noibat->product_name}}</a>
                                        </h6>
                                        <div class="pro-rating">
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                        </div>
                                        <h3 class="pro-price">{{number_format($noibat->product_price).' '.'VNĐ'}}</h3>
                                        <ul class="action-button">
                                           <!--  <li>
                                                <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="modal"  data-target="#productModal" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                            </li> -->
                                            <li>
                                                <a onclick="AddCart({{$noibat->product_id}})" href="javascript:" title="Thêm giỏ hàng"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                       
                            @endforeach   
                        </div>
                    </div>  
                        
                </div>            
            </div>
            <!-- FEATURED PRODUCT SECTION END -->

            <!-- FEATURED PRODUCT SECTION START -->
            <div class="featured-product-section mb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title text-left mb-40">
                                <h2 class="uppercase">ĐIỆN THOẠI</h2>
                               <!--  <h6>There are many variations of passages of brands available,</h6> -->
                            </div>
                        </div>
                    </div>
                   
                    <div class="featured-product">
                        <div class="row active-featured-product slick-arrow-2">
                            <!-- product-item start -->
                             @foreach($dienthoai as $key => $phone)
                       
                            <div class="col-xs-12">
                                <div class="product-item">
                                    <div class="product-img">
                                     <a href="{{URL::to('/chi-tiet-san-pham/'.$phone->product_slug)}}"> 
                                            <img src="{{URL::to('/public/uploads/product/'.$phone->product_image)}}" alt=""/>
                                    </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a href="{{URL::to('/chi-tiet-san-pham/'.$phone->product_slug)}}">{{$phone->product_name}}</a>
                                        </h6>
                                        <div class="pro-rating">
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                        </div>
                                        <h3 class="pro-price">{{number_format($phone->product_price).' '.'VNĐ'}}</h3>
                                        <ul class="action-button">
                                           <!--  <li>
                                                <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="modal"  data-target="#productModal" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                            </li> -->
                                            <li>
                                                <a onclick="AddCart({{$phone->product_id}})" href="javascript:" title="Thêm giỏ hàng"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            @endforeach   
                        </div>
                    </div>  
                        
                </div>            
            </div>
            <!-- FEATURED PRODUCT SECTION END -->

            <!-- FEATURED PRODUCT SECTION START -->
            <div class="featured-product-section mb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title text-left mb-40">
                                <h2 class="uppercase">LAPTOP</h2>
                               <!--  <h6>There are many variations of passages of brands available,</h6> -->
                            </div>
                        </div>
                    </div>
                   
                    <div class="featured-product">  
                        <div class="row active-featured-product slick-arrow-2">
                            <!-- product-item start -->
                             @foreach($laptop as $key => $lap)
                       
                            <div class="col-xs-12">
                                <div class="product-item">
                                    <div class="product-img">
                                     <a href="{{URL::to('/chi-tiet-san-pham/'.$lap->product_slug)}}"> 
                                            <img src="{{URL::to('/public/uploads/product/'.$lap->product_image)}}" alt=""/>
                                    </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a href="{{URL::to('/chi-tiet-san-pham/'.$lap->product_slug)}}">{{$lap->product_name}}</a>
                                        </h6>
                                        <div class="pro-rating">
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                        </div>
                                        <h3 class="pro-price">{{number_format($lap->product_price).' '.'VNĐ'}}</h3>
                                        <ul class="action-button">
                                           <!--  <li>
                                                <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="modal"  data-target="#productModal" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                            </li> -->
                                            <li>
                                                <a onclick="AddCart({{$lap->product_id}})" href="javascript:" title="Thêm giỏ hàng"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            @endforeach   
                        </div>
                    </div>  
                        
                </div>            
            </div>
            <!-- FEATURED PRODUCT SECTION END -->

            <!-- FEATURED PRODUCT SECTION START -->
            <div class="featured-product-section mb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title text-left mb-40">
                                <h2 class="uppercase">Đồng hồ thông minh</h2>
                               <!--  <h6>There are many variations of passages of brands available,</h6> -->
                            </div>
                        </div>
                    </div>
                   
                    <div class="featured-product">
                        <div class="row active-featured-product slick-arrow-2">
                            <!-- product-item start -->
                             @foreach($dongho as $key => $prod)
                       
                            <div class="col-xs-12">
                                <div class="product-item">
                                    <div class="product-img">
                                     <a href="{{URL::to('/chi-tiet-san-pham/'.$prod->product_slug)}}"> 
                                            <img src="{{URL::to('/public/uploads/product/'.$prod->product_image)}}" alt=""/>
                                    </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a href="{{URL::to('/chi-tiet-san-pham/'.$prod->product_slug)}}">{{$prod->product_name}}</a>
                                        </h6>
                                        <div class="pro-rating">
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                        </div>
                                        <h3 class="pro-price">{{number_format($prod->product_price).' '.'VNĐ'}}</h3>
                                        <ul class="action-button">
                                           <!--  <li>
                                                <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="modal"  data-target="#productModal" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                            </li> -->
                                            <li>
                                                <a onclick="AddCart({{$prod->product_id}})" href="javascript:" title="Thêm giỏ hàng"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            @endforeach   
                        </div>
                    </div>  
                        
                </div>            
            </div>
            <!-- FEATURED PRODUCT SECTION END -->

            <!-- FEATURED PRODUCT SECTION START -->
            <div class="featured-product-section mb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title text-left mb-40">
                                <h2 class="uppercase">Phụ kiện chính hãng</h2>
                               <!--  <h6>There are many variations of passages of brands available,</h6> -->
                            </div>
                        </div>
                    </div>
                   
                    <div class="featured-product">
                        <div class="row active-featured-product slick-arrow-2">
                            <!-- product-item start -->
                             @foreach($phukien as $key => $pk)
                       
                            <div class="col-xs-12">
                                <div class="product-item">
                                    <div class="product-img">
                                     <a href="{{URL::to('/chi-tiet-san-pham/'.$pk->product_slug)}}"> 
                                            <img src="{{URL::to('/public/uploads/product/'.$pk->product_image)}}" alt=""/>
                                    </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a href="{{URL::to('/chi-tiet-san-pham/'.$pk->product_slug)}}">{{$pk->product_name}}</a>
                                        </h6>
                                        <div class="pro-rating">
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                        </div>
                                        <h3 class="pro-price">{{number_format($pk->product_price).' '.'VNĐ'}}</h3>
                                        <ul class="action-button">
                                           <!--  <li>
                                                <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="modal"  data-target="#productModal" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                            </li> -->
                                            <li>
                                               <a onclick="AddCart({{$pk->product_id}})" href="javascript:" title="Thêm giỏ hàng"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            @endforeach   
                        </div>
                    </div>  
                        
                </div>            
            </div>
            <!-- FEATURED PRODUCT SECTION END -->

            <!-- BLOG SECTION START -->
            <div class="blog-section mb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title text-left mb-40">
                                <h2 class="uppercase">TIN TỨC MỚI NHẤT</h2>
                               
                            </div>
                        </div>
                    </div>
                    <div class="blog">
                        <div class="row active-blog">
                            @foreach($tintuc as $key => $lay_tintuc)
                            <!-- blog-item start -->
                            <div class="col-xs-12">
                                <div class="blog-item">
                                    <img src="{{URL::to('/public/uploads/tintuc/'.$lay_tintuc->post_image)}}" alt="">
                                    <div class="blog-desc">
                                        <h5 class="blog-title"><a href="{{URL::to('/chitiet-tintuc/'.$lay_tintuc->post_id)}}">{{$lay_tintuc->post_name}}</a></h5>
                                        <p>{{$lay_tintuc->post_title}}</p>
                                        <div class="read-more">
                                            <a href="{{URL::to('/chitiet-tintuc/'.$lay_tintuc->post_id)}}">Đọc thêm...</a>

                    
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- blog-item end -->
                          @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- BLOG SECTION END -->                
        </section>
        <!-- End page content -->


@endsection