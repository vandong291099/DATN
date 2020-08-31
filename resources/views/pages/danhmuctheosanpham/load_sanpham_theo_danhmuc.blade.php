@extends('layout')
@section('content')

 <!-- BREADCRUMBS SETCTION START -->
        <div class="breadcrumbs-section plr-200 mb-80">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                @foreach($tendanhmuc as $key => $name)
                                <h1 class="breadcrumbs-title">{{$name->category_name}}</h1>
                                @endforeach
                                <ul class="breadcrumb-list">
                                    <li><a href="{{URL::to('trang-chu')}}">Trang chủ</a></li>
                                @foreach($tendanhmuc as $key => $name)    
                                    <li>{{$name->category_name}}</li>
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
                                            @foreach($sanphamtheodanhmuc as $key => $prodm)
                                            <a href="{{URL::to('/chi-tiet-san-pham/'.$prodm->product_slug)}}">
                                            <!-- product-item start -->
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="product-item">
                                                    <div class="product-img">
                                                        
                                                            <img src="{{URL::to('/public/uploads/product/'.$prodm->product_image)}}" alt=""/>
                                                        
                                                    </div>
                                                    <div class="product-info">
                                                        <h6 class="product-title">
                                                            <a href="{{URL::to('/chi-tiet-san-pham/'.$prodm->product_slug)}}">
                                                             {{$prodm->product_name}}   
                                                            </a>
                                                        </h6>
                                                        <div class="pro-rating">
                                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                        </div>
                                                        <h3 class="pro-price">{{number_format($prodm->product_price).' '.'VNĐ'}}</h3>
                                                        <ul class="action-button">
                                                            <li>
                                                <a onclick="AddCartCategory({{$prodm->product_id}})" href="javascript:" title="Thêm giỏ hàng"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
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
                                            @foreach($sanphamtheodanhmuc as $key => $prodm)
                                            <a href="{{URL::to('/chi-tiet-san-pham/'.$prodm->product_slug)}}">
                                            <div class="col-md-12">
                                                <div class="shop-list product-item">
                                                    <div class="product-img">
                                                      
                                                            <img src="{{URL::to('/public/uploads/product/'.$prodm->product_image)}}" alt=""/>
                                                        
                                                    </div>
                                                    <div class="product-info">
                                                        <div class="clearfix">
                                                            <h6 class="product-title f-left">
                                                                <a href="{{URL::to('/chi-tiet-san-pham/'.$prodm->product_slug)}}">
                                                                    {{$prodm->product_name}}
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
                                                       
                                                        <h6 class="brand-name mb-30">Thương hiệu</h6>
                                                        <h3 class="pro-price">{{number_format($prodm->product_price).' '.'VNĐ'}}</h3>
                                                        <p>Sản phẩm nổi bật với thiết kế sang trọng, màn hình Infinity-O cùng cụm 4 camera đột phá.</p>
                                                        <ul class="action-button">
                                                           
                                                            <li>
                                                                <a onclick="AddCartCategory({{$prodm->product_id}})" href="javascript:" title="Thêm giỏ hàng"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
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
                               <span> {{$sanphamtheodanhmuc->links()}}</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-12">
                            
                            <aside class="widget widget-categories box-shadow mb-30">
                                <h6 class="widget-title border-left mb-20">Danh mục</h6>
                                @foreach($danhmuc as $key => $category)
                                <div id="cat-treeview" class="product-cat">
                                    <ul>
                                        <li class="closed"><a href="{{URL::to('/danh-muc-san-pham/'.$category->category_slug)}}">{{$category->category_name}}</a>
                                           <!--  <ul>
                                                <li><a href="#">Mobile</a></li>
                                                <li><a href="#">Tab</a></li>
                                                <li><a href="#">Watch</a></li>
                                                <li><a href="#">Head Phone</a></li>
                                                <li><a href="#">Memory</a></li>
                                            </ul> -->
                                        </li>                                       
                                     
                                    </ul>
                                </div>
                                @endforeach
                            </aside>
                            <!-- shop-filter -->
                            <aside class="widget shop-filter box-shadow mb-30">
                                <h6 class="widget-title border-left mb-20">Price</h6>
                                <div class="price_filter">
                                    <div class="price_slider_amount">
                                        <input type="submit"  value="You range :"/> 
                                        <input type="text" id="amount" name="price"  placeholder="Add Your Price" /> 
                                    </div>
                                    <div id="slider-range"></div>
                                </div>
                            </aside>
                            <!-- widget-color -->
                           <!--  <aside class="widget widget-color box-shadow mb-30">
                                <h6 class="widget-title border-left mb-20">color</h6>
                                <ul>
                                    <li class="color-1"><a href="#">LightSalmon</a></li>
                                    <li class="color-2"><a href="#">Dark Salmon</a></li>
                                    <li class="color-3"><a href="#">Tomato</a></li>
                                    <li class="color-4"><a href="#">Deep Sky Blue</a></li>
                                    <li class="color-5"><a href="#">Electric Purple</a></li>
                                    <li class="color-6"><a href="#">Atlantis</a></li>
                                </ul>
                            </aside> -->
                            <!-- operating-system -->
                         <!--    <aside class="widget operating-system box-shadow mb-30">
                                <h6 class="widget-title border-left mb-20">operating system</h6>
                                <form action="https://demo.hasthemes.com/subas-preview/subas/action_page.php">
                                    <label><input type="checkbox" name="operating-1" value="phone-1">Windows Phone</label><br>
                                    <label><input type="checkbox" name="operating-1" value="phone-1">Bleckgerry ios</label><br>
                                    <label><input type="checkbox" name="operating-1" value="phone-1">Android</label><br>
                                    <label><input type="checkbox" name="operating-1" value="phone-1">ios</label><br>
                                    <label><input type="checkbox" name="operating-1" value="phone-1">Windows Phone</label><br>
                                    <label><input type="checkbox" name="operating-1" value="phone-1">Symban</label><br>
                                    <label class="mb-0"><input type="checkbox" name="operating-1" value="phone-1">Bleckgerry os</label><br>
                                </form>
                            </aside> -->
                            <!-- widget-product -->
                            <aside class="widget widget-product box-shadow">
                                <h6 class="widget-title border-left mb-20">Sản phẩm nổi bật</h6>
                                @foreach($sanphamnoibat as $key => $prod)
                                <!-- product-item start -->
                                <a href="{{URL::to('/chi-tiet-san-pham/'.$prod->product_slug)}}">
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