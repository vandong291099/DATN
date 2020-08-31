@extends('layout')
@section('content')

 <!-- BREADCRUMBS SETCTION START -->
        <div class="breadcrumbs-section plr-200 mb-80">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                @foreach($tenthuonghieu as $key => $namethuonghieu)
                                <h1 class="breadcrumbs-title">{{$namethuonghieu->brand_name}}</h1>
                                @endforeach
                                <ul class="breadcrumb-list">
                                    <li><a href="{{URL::to('trang-chu')}}">Trang chủ</a></li>
                            @foreach($tenthuonghieu as $key => $namethuonghieu)    
                                    <li>{{$namethuonghieu->brand_name}}</li>
                                 @endforeach  
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
                            <div class="shop-content">
                                <!-- shop-option start -->
                                <div class="shop-option box-shadow mb-30 clearfix">
                                    <!-- Nav tabs -->
                                    <ul class="shop-tab f-left" role="tablist">
                                        <li class="active">
                                            <a href="#grid-view" data-toggle="tab"><i class="zmdi zmdi-view-module"></i></a>
                                        </li>
                                        <li>
                                            <a href="#list-view" data-toggle="tab"><i class="zmdi zmdi-view-list-alt"></i></a>
                                        </li>
                                    </ul>
                                   
                                 <!--    <div class="short-by f-left text-center">
                                        <span>Sort by :</span>
                                        <select>
                                            <option value="volvo">Newest items</option>
                                            <option value="saab">Saab</option>
                                            <option value="mercedes">Mercedes</option>
                                            <option value="audi">Audi</option>
                                        </select> 
                                    </div>  -->
                                  
                                   <!--  <div class="showing f-right text-right">
                                        <span>Showing : 01-09 of 17.</span>
                                    </div>   -->                                 
                                </div>
                                <!-- shop-option end -->
                                <!-- Tab Content start -->
                               
                                <div class="tab-content">
                                    <!-- grid-view -->
                                   
                                    <div role="tabpanel" class="tab-pane active" id="grid-view">
                                        <div class="row">
                                            @foreach($sanphamtheothuonghieu as $key => $proth)
                                            <a href="{{URL::to('/chi-tiet-san-pham/'.$proth->product_slug)}}">
                                            <!-- product-item start -->
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="product-item">
                                                    <div class="product-img">
                                                        
                                                            <img src="{{URL::to('/public/uploads/product/'.$proth->product_image)}}" alt=""/>
                                                        
                                                    </div>
                                                    <div class="product-info">
                                                        <h6 class="product-title">
                                                            <a href="{{URL::to('/chi-tiet-san-pham/'.$proth->product_slug)}}">
                                                             {{$proth->product_name}}   
                                                            </a>
                                                        </h6>
                                                        <div class="pro-rating">
                                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                        </div>
                                                        <h3 class="pro-price">{{number_format($proth->product_price).' '.'VNĐ'}}</h3>
                                                        <ul class="action-button">
                                                            <li>
                                                <a onclick="AddCartCategory({{$proth->product_id}})" href="javascript:" title="Thêm giỏ hàng"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- product-item end -->
                                        </a>
                                           @endforeach
                                        </div>
                                       
                                    </div>

                                    <!-- list-view -->
                                    <div role="tabpanel" class="tab-pane" id="list-view">
                                        <div class="row">
                                            <!-- product-item start -->
                                            @foreach($sanphamtheothuonghieu as $key => $proth)
                                            <a href="{{URL::to('/chi-tiet-san-pham/'.$proth->product_slug)}}">
                                            <div class="col-md-12">
                                                <div class="shop-list product-item">
                                                    <div class="product-img">
                                                      
                                                            <img src="{{URL::to('/public/uploads/product/'.$proth->product_image)}}" alt=""/>
                                                        
                                                    </div>
                                                    <div class="product-info">
                                                        <div class="clearfix">
                                                            <h6 class="product-title f-left">
                                                                <a href="{{URL::to('/chi-tiet-san-pham/'.$proth->product_slug)}}">
                                                                    {{$proth->product_name}}
                                                                </a>
                                                            </h6>
                                                            <div class="pro-rating f-right">
                                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                            </div>
                                                        </div>
                                                       
                                                        <h6 class="brand-name mb-30">{{$proth->brand_name}}</h6>
                                                        <h3 class="pro-price">{{number_format($proth->product_price).' '.'VNĐ'}}</h3>
                    
                                                        <ul class="action-button">
                                                           
                                                            <li>
                                                                <a onclick="AddCartCategory({{$proth->product_id}})" href="javascript:" title="Thêm giỏ hàng"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                            @endforeach
                                            
                                        </div>                                        
                                    </div>
                                </div>
                               
                                <!-- Tab Content end -->
                               <span> {{$sanphamtheothuonghieu->links()}}</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12">
                           
                            <aside class="widget widget-categories box-shadow mb-30">
                                <h6 class="widget-title border-left mb-20">Thương hiệu</h6>
                                @foreach($thuonghieu as $key => $brand)
                                <div id="cat-treeview" class="product-cat">
                                    <ul>
                                        <li class="closed"><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_slug)}}">{{$brand->brand_name}}</a>
                                          
                                        </li>                                       
                                     
                                    </ul>
                                </div>
                                @endforeach
                            </aside>
                            <!-- shop-filter -->
                       
                       
                        </div>
                    </div>
                </div>
            </div>
            <!-- SHOP SECTION END -->             

        </section>
<!-- End page content -->
        
@endsection