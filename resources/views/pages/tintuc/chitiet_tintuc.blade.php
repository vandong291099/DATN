@extends('layout')
@section('content')
<!-- BREADCRUMBS SETCTION START -->
        <div class="breadcrumbs-section plr-200 mb-80">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title">THÔNG TIN BÀI VIẾT</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
                                    <li><a href="{{URL::to('/tin-tuc')}}">Tin tức</a></li>
                                    <li>Thông tin bài viết</li>
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

            <!-- BLOG SECTION START -->
            <div class="blog-section mb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-xs-12">
                            <div class="blog-details-area">
                                @foreach($tintucchitiet as $key => $chitiet)
                                <!-- blog-details-photo -->
                                <div class="blog-details-photo bg-img-1 p-20 mb-30">
                                    <img src="{{URL::to('/public/uploads/tintuc/'.$chitiet->post_image)}}" alt="">
                                   <!--  <div class="today-date bg-img-1">
                                        <span class="meta-date">30</span>
                                        <span class="meta-month">June</span>
                                    </div> -->
                                </div>
                                <!-- blog-like-share -->
                                <ul class="blog-like-share mb-20">
                                    <li>
                                        <a><i class="zmdi zmdi-favorite"></i>
                                            {{$chitiet->created_at}}
                                        </a>
                                    </li>
                                   
                                </ul>
                                <!-- blog-details-title -->
                                <h3 class="blog-details-title mb-30">{{$chitiet->post_name}}</h3>
                                <!-- blog-description -->
                                <div class="blog-description mb-60">
                                    <div class="quote-author pl-30">
                                        <p class="quote-border pl-30">{{$chitiet->post_title}}</p>
                                    </div>
                                    <p>{{$chitiet->post_content}}</p>

                                    

                                  @endforeach
                                </div>
                                <!-- blog-share-tags -->
                                <div class="blog-share-tags box-shadow clearfix mb-60">
                                    <div class="blog-share f-left">
                                        <p class="share-tags-title f-left">Chia sẻ</p>
                                        <ul class="footer-social f-left">
                                            <li>
                                                <a class="facebook" href="https://www.facebook.com/" title="Facebook"><i class="zmdi zmdi-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a class="rss" href="https://www.instagram.com/" title="Instagram"><i class="zmdi zmdi-instagram"></i></a>
                                            </li>
                                            <li>
                                                <a class="twitter" href="https://twitter.com/" title="Twitter"><i class="zmdi zmdi-twitter"></i></a>
                                            </li>
                                           
                                        </ul>
                                    </div>
                                   
                                </div>
                                
                                <!-- <div class="media author-post box-shadow mb-60">
                                    <div class="media-left pr-20">
                                        <a href="#">
                                            <img class="media-object" src="img/author/1.jpg" alt="#">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="media-heading">
                                            <a href="#">Subas Chandra Das</a>
                                        </h6>
                                        <p class="mb-0">No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursu pleasure rationally encounter conseques ences that are extremely painful.</p>
                                    </div>
                                </div>  -->
                               
                            </div>
                        </div>
                        
                            
                      
                        </div>
                    </div>
                </div>
            </div>
            <!-- BLOG SECTION END -->             

        </section>
        <!-- End page content -->
@endsection