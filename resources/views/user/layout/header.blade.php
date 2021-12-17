<div class="impl_header_wrapper">
    <div class="impl_logo">
        <a href="index.html"><img style="width: 60%;" src="" alt="Logo" class="img-fluid"></a>
    </div>
    <div class="impl_top_header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="impl_top_info">
                        <p class="impl_header_time"><i class="fa fa-clock-o" aria-hidden="true"></i></p>
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
                            <li class="cart-popup"><a href="#signin"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
                                <div class="cart-box" style="width: 200px;">
                                    <div class="popup-container">
                                        @if(Auth::guard('customer')->check())
                                        <div class="subtotal" style="color: #000;">
                                            <a href="">{{ Auth::guard('customer')->user()->name }}</a>
                                        </div>
                                        <div class="subtotal" style="color: #000;">
                                            <a href="{{ route('Mycart') }}">Đơn Hàng của tôi</a>
                                        </div>
                                        <div class="price-s" style="color: #000;">
                                            <a href="{{ route('logout_user') }}">
                                            Logout
                                            </a>
                                        </div>
                                        @else
                                        <div class="price-s" style="color: #000;">
                                            <a href="{{ route('login_user') }}">Login</a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="impl_search_overlay">
                            <div class="impl_search_area">
                                <div class="srch_inner">
                                    <form action="#">
                                        <input type="text" placeholder="Tìm kiếm mà bạn muốn...">
                                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </form>
                                    <div class="srch_close_btn">
                                        <span class="srch_close_btn_icon"><i class="fa fa-times" aria-hidden="true"></i></span>
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