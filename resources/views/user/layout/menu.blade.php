<!--menu start-->
<div class="impl_menu_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <button class="impl_menu_btn">
                    <i class="fa fa-car" aria-hidden="true"></i>
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button>
                <div class="impl_menu_inner">
                    <div class="impl_logo_responsive">
                        <a href="index.html"><img src="images/logo1.png" alt="Logo" class="img-fluid"></a>
                    </div>
                    <a href="{{ route('sell_step') }}" class="impl_btn">Báo hổng</a>
                    <div class="impl_menu">
                        <nav>
                            <div class="menu_cross">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </div>
                            <ul>
                                <li class="dropdown"><a href="{{ route('home') }}" class="active">Trang Chủ</a></li>
                                <!-- <li><a href="about.html">Công Ty</a></li> -->
                                <li class="dropdown"><a href="{{ route('purchase') }}">Sản phẩm</a>
                                    <ul class="sub-menu">
                                        @foreach($category as $cat)
                                        <li><a href="{{ route('sanpham',$cat->id) }}">Xe Oto</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="{{ route('blog_single') }}">Tin tức</a></li>
                                <li class="dropdown"><a href="{{ route('blog') }}">Dịch vụ</a>
                                    <ul class="sub-menu">
                                        <li><a href="#">Đặt lịch </a></li>
                                        <li><a href="#">Bảo dưỡng Định kì</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                            </ul>
                            <ul class="impl_header_icons">
                                <li class="impl_search"><span><i class="fa fa-search" aria-hidden="true"></i></span></li>
                                <li><a href="compare.html"><i class="fa fa-exchange" aria-hidden="true"></i></a></li>
                                <li class="cart-popup"><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"><span class='badge badge-warning' id='lblCartCount'>{{ $cart->total_quantity}}</span></i></a>
                                    <!--shopping cart box-->
                                    <div class="cart-box">
                                        <div class="popup-container">
                                            @foreach($cart->items as $cart_item)
                                            <div class="cart-entry">
                                                <a href="#" class="image">
                                                    <!-- 70x60 -->
                                                    <img src="{{url('public/uploads')}}/{{$cart_item['image']}}" alt="" width="70px" height="60px">
                                                </a>
                                                <div class="content">
                                                    <a href="#" class="title">{{ $cart_item['name'] }}</a>
                                                    <p class="quantity">Số Lượng: {{$cart_item['quantity']}}</p>
                                                    <span class="price">{{ number_format($cart_item['price']) }} VND</span>
                                                </div>
                                                <div class="button-x">
                                                    <a href="{{ route('cart_remove',['id' => $cart_item['id'] ]) }}">
                                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            @endforeach
                                            <div class="summary">
                                                <div class="subtotal" style="color: #000;">Tổng giá:</div>
                                                <div class="price-s" style="color: #000;">{{number_format($cart->total_price) }} VND</div>
                                            </div>
                                            <div class="cart-buttons">
                                                <a href="{{route('checkout')}}" class="btn impl_btn">Xem giỏ hàng</a>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="#signin" data-toggle="modal"><i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>