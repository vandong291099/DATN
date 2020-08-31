@extends('layout')
@section('content')
 <!-- BREADCRUMBS SETCTION START -->
        <div class="breadcrumbs-section plr-200 mb-80">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title">TIN TỨC</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
                                    <li>Tin tức</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMBS SETCTION END -->

        <!-- Start page content -->
        <div id="page-content" class="page-wrapper">

            <!-- BLOG SECTION START -->
            <div class="blog-section mb-50">
                <div class="container">
                    <div class="row">
                      
                    </div>
                    <div class="row">
                        <!-- blog-item start -->
                        @foreach($tintuc as $key => $lay_tintuc)
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="blog-item">
                                <img src="{{URL::to('/public/uploads/tintuc/'.$lay_tintuc->post_image)}}" alt="">
                                <div class="blog-desc">
                                    <h5 class="blog-title"><a href="{{URL::to('/chitiet-tintuc/'.$lay_tintuc->post_id)}}">{{$lay_tintuc->post_name}}</a></h5>
                                    <p>{{$lay_tintuc->post_title}}</p>
                                    <div class="read-more">
                                        <a href="{{URL::to('/chitiet-tintuc/'.$lay_tintuc->post_id)}}">Đọc thêm</a>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- blog-item end -->
                        
                    </div>
                </div>
            </div>
            <!-- BLOG SECTION END -->             

        </div>
        <!-- End page content -->
@endsection