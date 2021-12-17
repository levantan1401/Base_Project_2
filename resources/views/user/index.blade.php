@extends('user.site')
@section('title_user','Trang Chủ')
@section('main')
@include('user.layout.slide')
<!-- slide  -->
<!------ Header Start ------
    -- Search Box Start ---- So Sanh
<!-- <div class="impl_searchbox_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="impl_search_box custom_select">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="impl_select_boxes">
                                <select>
                                    <option>Select Brand</option>
                                    <option value="1">Brand 1</option>
                                    <option value="2">Brand 2</option>
                                    <option value="3">Brand 3</option>
                                    <option value="4">Brand 4</option>
                                </select>
                                <select>
                                    <option>Select Status</option>
                                    <option value="b1">Status 1</option>
                                    <option value="b2">Status 2</option>
                                    <option value="b3">Status 3</option>
                                    <option value="b4">Status 4</option>
                                </select>
                                <select>
                                    <option>Select Model</option>
                                    <option value="b1">Model 1</option>
                                    <option value="b2">Model 2</option>
                                    <option value="b3">Model 3</option>
                                    <option value="b4">Model 4</option>
                                </select>
                                <select>
                                    <option>Select Year</option>
                                    <option value="b1">Year 1</option>
                                    <option value="b2">Year 2</option>
                                    <option value="b3">Year 3</option>
                                    <option value="b4">Year 4</option>
                                </select>
                                <select>
                                    <option>Select Color</option>
                                    <option value="b1">Color 1</option>
                                    <option value="b2">Color 2</option>
                                    <option value="b3">Color 3</option>
                                    <option value="b4">Color 4</option>
                                </select>
                                <select>
                                    <option>Select Type</option>
                                    <option value="b1">Type 1</option>
                                    <option value="b2">Type 2</option>
                                    <option value="b3">Type 3</option>
                                    <option value="b4">Type 4</option>
                                </select>
                                <div class="price_range">
                                    <label>price range</label> <input type="text" id="range_24" name="ionRangeSlider" value="" />
                                </div>
                            </div>
                            <div class="impl_search_btn">
                                <button class="impl_btn">search vehicle</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!------ Welcome Wrapper Start ------>
<div class="impl_welcome_wrapper impl_bottompadder80">
    <div class="container">
        <div class="row">

            <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                <div class="impl_welcome_text">
                    <h1>Chào mừng bạn đến với ô tô Fadil </h1>
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Chú trọng trải nghiệm của người dùng, Fadil mang đến khoang ngồi thoải mái bên trong một kích cỡ nhỏ gọn và đậm chất đô thị. Đồng thời tích hợp hệ thống tiện ích tiện dụng, hỗ trợ tối đa cho hành khách trên xe.</a></h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in show">
                                <div class="panel-body">
                                    Các đường nét thiết kế mang hơi thở châu Âu hòa quyện cùng những điểm nhấn đặc trưng của tinh thần Việt tạo nên một mẫu hatchback lý tưởng cho đô thị, nhỏ gọn và thông minh, sẵn sàng chinh phục mọi cung đường thành phố.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Không gian nội thất thoáng đãng và khoang hành lý rộng rãi tạo sự thoải mái cho mọi chuyến đi.</a></h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Tự tin lướt qua mọi con phố, an tâm trên những hành trình dài với động cơ 1.4L cùng hàng loạt tích hợp công nghệ thông minh và tiện dụng giúp tăng cường trải nghiệm lái. Hơn hết là hệ thống an toàn vượt trội nhất phân khúc, cho bạn vững tay lái trên mọi cung đường.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Màn hình giải trí 7 inch kết nối điện thoại và dàn âm thanh 6 loa đem lại trải nghiệm giải trí ấn tượng.</a></h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                    Nội thất bọc da, kết nối Bluetooth, đàm thoại rảnh tay, điều hòa tự động có cảm biến độ ẩm tạo nên một không gian thân thiện.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                <div class="impl_welcome_img">
                    <img src="{{ url('public/fontend/images/xe_president_den.png')}}" alt="Xe Fadil Xám" class="img-responsive">
                </div>
            </div>
        </div>
    </div>
</div>
<!------ Service and Video Wrapper Start ------>
<div class="impl_service_wrapper">
    <div class="impl_service_car">
        <!-- 346x503 -->
        <img src="{{url('public/fontend/images/service_car.png')}}" alt="" />
    </div>
    <div class="impl_service_video">
        <div class="impl_video_inner">
            <div class="impl_servdo_video">
                <span class="impl_play_icon"><a class="impl-popup-youtube" href="https://www.youtube.com/watch?v=BqjuObIH1nY"><i class="fa fa-play" aria-hidden="true"></i></a></span>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12">
                <div class="impl_service_left">
                    <div class="impl_service_details" style="color: #fff">
                        <div class="impl_heading">
                            <h1>Dịch vụ</h1>
                        </div>
                        <div class="impl_timeline_wrapper">
                            <ul class="impl_timeline">
                                <li>
                                    <div class="impl_tl_item">
                                        <h2>Mua</h2>
                                        <p>Mua hàng tiện lợi</br> và nhanh chống.</p>
                                        <span class="impl_tl_icon">
                                            <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="impl_tl_item impl_tl_item_rt">
                                        <h2>Bán</h2>
                                        <p>Giao hàng tại nhà.Giao dịch tiện lợi trực tiếp.</p>
                                        <span class="impl_tl_icon">
                                            <i class="fa fa-usd" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="impl_tl_item">
                                        <h2>Sửa chữa</h2>
                                        <p>Nhân viên sửa chữa<br> nhanh chống.Sửa chữa tại </br>nhà đáp ứng nhu cầu của khách hàng.</p>
                                        <span class="impl_tl_icon">
                                            <i class="fa fa-wrench" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!------ Featured Cars Start ------>
<div class="impl_featured_wrappar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="impl_heading">
                    <h1>Các loại xe nổi bật</h1>
                </div>
            </div>
            @foreach($product as $pro)
            <?php $images = json_decode($pro->list_image); ?>

            <div class="col-lg-4 col-md-6">
                <div class="card" style=" margin-bottom: 24px; box-shadow: -4px 4px 16px #ddd; border-radius: 12px;">
                    <img class="card-img-top" src="" alt="">
                    <div class="card-body">
                        <div class="impl_fea_car_box">
                            <div class="impl_fea_car_img">
                                <!-- 370x320 -->
                                <img src="{{ url('public/uploads')}}/{{ $pro->image }}" alt="{{ $pro->name }}" class="card-img-top img-fluid impl_frst_car_img" />
                                @if(is_array($images))
                                <img src="{{$images[0]}}" alt="{{ $pro->name }}" class="img-fluid impl_hover_car_img" />
                                @endif
                                <span class="impl_img_tag" title="compare"><i class="fa fa-exchange" aria-hidden="true"></i></span>
                            </div>
                            <div class="impl_fea_car_data">
                                <h2><a href="{{ route('sp',['slug' => $pro->slug])}}/{{ $pro->id }}">{{$pro->name}}</a></h2>
                                <ul>
                                    <li><span class="impl_fea_title">Mô hình</span>
                                        <span class="impl_fea_name">{{ $pro->name }}</span>
                                    </li>
                                    <li><span class="impl_fea_title">Tình trạng xe</span>
                                        <span class="impl_fea_name">{{$pro->created_at->format('d-m-Y')}}</span>
                                    </li>
                                    <li><span class="impl_fea_title">Màu</span>
                                        <span class="impl_fea_name">{{$pro->color}}</span>
                                    </li>
                                </ul>
                                <div class="impl_fea_btn">
                                    <a href="{{ route('cart_add',['id' => $pro->id]) }}" class="impl_btn">
                                        <span class="impl_doller">{{ number_format($pro->price)}} VND </span>
                                        <span class="impl_bnw">Mua Ngay</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach

        </div>
        
    </div>
    <!------ Need Help Section Start ------>
    <div class="impl_help_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-12 offset-lg-1">
                    <div class="impl_help_data">
                        <h1>Cần giúp bạn tìm xe hoàn hảo</h1>
                        <p>Gọi ngay tới số để được nhân viên tư vấn</p>
                        <div class="impl_help_no"><span>0398769600</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------ Latest Blog Section Start ------>
    <div class="impl_blog_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="impl_heading">
                        <h1>Bài viết nổi bật</h1>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="impl_blog_box">
                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <div class="impl_post_img">
                                    <!-- 370x303  VF33_-->
                                    <img src="{{ url('public/fontend/images/news.jpg')}}" alt="" class="img-fluid" />
                                    <span class="impl_pst_date">
                                        16 sep
                                    </span>
                                    <div class="impl_pst_img_icon"><a href="{{ route('blog') }}" class="fa fa-link"></a></div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <div class="impl_post_data">
                                    <h2><a href="{{ route('blog') }}">VinFast thắng lớn, giành 3 giải nhất trong Bình chọn “Xe của năm 2021” tại Việt Nam </a></h2>
                                    <p>Với định hướng chiến lược là trở thành thương hiệu ô tô công nghệ cao toàn cầu, chỉ sau 3 năm đi vào hoạt động, VinFast đã nghiên cứu
                                        và phát triển thành công ba dòng xe thông minh đầu tiên là VF31, VF32, VF33, trong đó VF31 là dòng SUV cỡ vừa (Phân khúc C) và chỉ có một phiên bản xe điện, VF32 là xe SUV cỡ trung (Phân khúc D), VF33 là xe SUV cỡ đại (Phân khúc E). VF32 và VF33 mỗi xe đều có 2 phiên bản điện và xăng.</p>
                                    <div class="impl_pst_info">
                                        <div class="impl_pst_admin">
                                            <span><a href="#">Admin</a></span>
                                            <span><a href="#">16/10/2021</a></span>
                                        </div>
                                        <ul class="impl_pst_views">
                                            <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i>22</a></li>
                                            <li><a href="#"><i class="fa fa-comments" aria-hidden="true"></i>4</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Blog 2-->
                    <div class="impl_blog_box impl_blog_right">
                        <div class="row">
                            <div class="col-lg-4 col-md-12 push-lg-8">
                                <div class="impl_post_img">
                                    <!-- 370x303 Press Release .png-->
                                    <img src="{{ url('public/fontend/images/slide1.jpg')}}" alt="" class="img-fluid" />
                                    <span class="impl_pst_date">
                                        16 sep
                                    </span>
                                    <div class="impl_pst_img_icon"><a href="{{ route('blog') }}"><i class="fa fa-link" aria-hidden="true"></i></a></div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-12 pull-lg-4">
                                <div class="impl_post_data">
                                    <h2><a href="{{ route('blog') }}">VinFast công bố 2 mẫu xe điện mới tại Los Angeles Auto Show 2021 </a></h2>
                                    <p>Los Angeles, California/Hà Nội, ngày 14/10/2021, Công ty TNHH Kinh doanh Thương mại và Dịch vụ VinFast công bố sẽ chính thức ra mắt thương hiệu xe điện toàn cầu tại Los Angeles Auto Show 2021 – 1 trong những triển lãm ô tô lớn nhất toàn cầu. Đặc biệt, VinFast sẽ lần đầu tiên giới thiệu tới công chúng 2 mẫu ô tô điện hoàn toàn mới - VF e35 và VF e36 như một dấu mốc quan trọng trên lộ trình tiến ra thế giới</p>
                                    <div class="impl_pst_info">
                                        <div class="impl_pst_admin">
                                            <span><a href="#">Admin</a></span>
                                            <span><a href="#">14.10.2021</a></span>

                                        </div>
                                        <ul class="impl_pst_views">
                                            <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i>3</a></li>
                                            <li><a href="#"><i class="fa fa-comments" aria-hidden="true"></i>0</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection