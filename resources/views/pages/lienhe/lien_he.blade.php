@extends('layout')
@section('content')
 <!-- BREADCRUMBS SETCTION START -->
        <div class="breadcrumbs-section plr-200 mb-80">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title">THÔNG TIN LIÊN HỆ</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{URL::to('trang-chu')}}">Trang chủ</a></li>
                                    <li>Thông tin iên hệ</li>
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

            <!-- ADDRESS SECTION START -->
            <div class="address-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <div class="contact-address box-shadow">
                                <i class="zmdi zmdi-pin"></i>
                                <h6>65 Huỳnh Thúc Kháng, Phường Bến Nghé</h6>
                                <h6>Quận 1, Thành phố Hồ Chí Minh</h6>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="contact-address box-shadow">
                                <i class="zmdi zmdi-phone"></i>
                                <h6><a href="tel:035-283-9972">035-283-9972</a></h6>
                                <h6><a href="tel:096-117-9670">096-117-9670</a></h6>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="contact-address box-shadow">
                                <i class="zmdi zmdi-email"></i>
                                <h6>0306171035@caothang.edu.vn</h6>
                                <h6>0306171024@caothang.edu.vn</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ADDRESS SECTION END --> 
            
            <!-- GOOGLE MAP SECTION START -->
            <div class="google-map-section">
                <div class="container-fluid">
                    <!-- <div class="google-map plr-185">
                        <div id="googleMap"></div>
                    </div> -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.513780776301!2d106.69912411462093!3d10.771905862223038!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f40c7a0f411%3A0xe272a9c70ba4a66e!2zNjUgxJDGsOG7nW5nIEh14buzbmggVGjDumMgS2jDoW5nLCBC4bq_biBOZ2jDqSwgUXXhuq1uIDEsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1597938166641!5m2!1svi!2s" width="100%" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                 <hr>
            </div>
            <!-- GOOGLE MAP SECTION END -->
            <br>
            <br>
            <br>
        
          
          

            
            <!-- MESSAGE BOX SECTION START -->
            <div class="message-box-section mt--50 mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="message-box box-shadow white-bg">
                                <form action="{{URL::to('/save-lienhe')}}" method="POST">
                                	{{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-12">
                                             @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{!! $error !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                           
                                            <h4 class="blog-section-title border-left mb-30">Gửi thắc mắc cho chúng tôi</h4>
                                        </div>
                                        <div class="col-md-12">
                                         <?php
                                	
                            			$message = Session::get('message');
                            		if($message){
                                echo '<span class="text-alertt">'.$message.'</span>';
                                Session::put('message',null);
                           				}
                            		?>
                            		<br>
                            		<br>
                            		
                        			</div>
                                        <div class="col-md-12">
                                            <input type="text" name="contact_name" placeholder="Tên của bạn">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="contact_phone" placeholder="Số điện thoại của bạn">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="contact_email" placeholder="Email của bạn">
                                        </div>
                                    
                                        <div class="col-md-12">
                                            <textarea class="custom-textarea" name="contact_content" placeholder="Nội dung"></textarea>
         
                                        </div>
                                      
                                         	<input type="submit" value="Gửi cho chúng tôi" name="send_contact" class="submit-btn-1 mt-30 btn-hover-1">
                                       
                                    </div>
                                </form>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- MESSAGE BOX SECTION END --> 
        </section>
        <!-- End page content -->

@endsection