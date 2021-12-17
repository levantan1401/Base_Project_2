<!DOCTYPE html>

<html lang="en">

<head>
    <title>@yield('title_user')</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="Impel">
    <meta name="keywords" content="">
    <meta name="author" content="hsoft">
    <meta name="MobileOptimized" content="320">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!--Srart Style -->
    <link rel="stylesheet" type="text/css" href="{{url('public/fontend')}}/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="{{url('public/fontend')}}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('public/fontend')}}/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('public/fontend')}}/css/ion.rangeSlider.css">
    <link rel="stylesheet" type="text/css" href="{{url('public/fontend')}}/css/ion.rangeSlider.skinFlat.css">
    <link rel="stylesheet" type="text/css" href="{{url('public/fontend')}}/js/plugin/magnific/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="{{url('public/fontend')}}/js/plugin/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="{{url('public/fontend')}}/js/plugin/slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="{{url('public/fontend')}}/js/plugin/nice_select/nice-select.css">
    <!----Revolution slider---->
    <link rel="stylesheet" type="text/css" href="{{url('public/fontend')}}/js/plugin/revolution/css/settings.css">
    <link rel="stylesheet" type="text/css" href="{{url('public/fontend')}}/css/style.css">
    <!-- Favicon Link -->
    <link rel="shortcut icon" type="image/png" href="{{url('public/uploads/logo_main.png')}}">
    @yield('css')
    <!-- <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'> -->

    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'>
    </script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'>
    </script>
</head>

<body>
    <!------ Preloader Start ------>
    <div id="preloader">
        <div id="status">
            <img src="{{ url('public/uploads/logo_main.png') }}" alt="logo" />
            <div class="loader">
                Loading...
                <div class="ball"></div>
                <div class="ball"></div>
                <div class="ball"></div>
            </div>
        </div>
    </div>
    <!------ Header Start ------>
    <!-- menu -->
    <div class="impl_menu_wrapper">
        <div class="impl_logo">
            <a href="{{route('home')}}"><img style="" src="{{ url('public/uploads/logo_main.png') }}" alt="Logo"
                    class="img-fluid"></a>
        </div>
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

                        <div class="impl_menu">
                            <nav>
                                <div class="menu_cross">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </div>
                                <ul class="ul_menu">
                                    <li class="dropdown"><a href="{{ route('home') }}" class="active">Trang Chủ</a></li>
                                    <!-- <li><a href="about.html">Công Ty</a></li> -->
                                    <li class="dropdown"><a href="">Sản phẩm</a>
                                        <ul class="sub-menu">
                                            @foreach($cats as $cat)
                                            <li><a
                                                    href="{{ route('purchase',['id' => $cat->id, 'slug' => $cat->slug]) }}">{{$cat->name}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="{{ route('blog') }}">Tin tức</a></li>
                                    <li class="dropdown"><a href="{{ route('service') }}">Dịch vụ</a>
                                        <ul class="sub-menu">
                                            <li><a href="#">Đặt lịch </a></li>
                                            <li><a href="#">Bảo dưỡng Định kì</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('contact.index') }}">Liên hệ</a></li>
                                </ul>
                            </nav>

                        </div>
                        <!-- THANH MENU ICON -->
                        <ul class="impl_header_icons">
                            <li class="impl_search"><span><i class="fa fa-search" aria-hidden="true"></i></span></li>
                            <li class="cart-popup"><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"><span
                                            class='badge badge-warning'
                                            id='lblCartCount'>{{ $cart->total_quantity}}</span></i></a>
                                <!--shopping cart box-->
                                <div class="cart-box">
                                    <div class="popup-container">
                                        @foreach($cart->items as $cart_item)
                                        <div class="cart-entry">
                                            <a href="#" class="image">
                                                <!-- 70x60 -->
                                                <img src="{{url('public/uploads')}}/{{$cart_item['image']}}" alt=""
                                                    width="70px" height="60px">
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
                                            <div class="price-s" style="color: #000;">
                                                {{number_format($cart->total_price) }} VND</div>
                                        </div>
                                        <div class="cart-buttons">
                                            <a href="{{route('checkout')}}" class="btn btn-outline-primary  w-100">Xem
                                                giỏ hàng</a>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="cart-popup"><a href="#signin"><i class="fa fa-sign-in"
                                        aria-hidden="true"></i></a>
                                <div class="cart-box" style="width: 200px;">
                                    <div class="popup-container">
                                        @if(Auth::guard('customer')->check())
                                        <div class="subtotal" style="color: #000;">
                                            <a href="{{route('setting.edit',Auth::guard('customer')->user()->id)}}">{{ Auth::guard('customer')->user()->name}}</a>
                                        </div>


                                        <div class="subtotal" style="color: #000;">
                                            <a href="{{route('reset.edit',Auth::guard('customer')->user()->id )}}">Đổi
                                                Mật Khẩu</a>
                                        </div>

                                        <div class="subtotal" style="color: #000;">
                                            <a href="{{ route('oders.index') }}">Đơn Hàng của tôi</a>
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
                            <li>
                                <a href="{{ route('sell_step') }}" class=""><button
                                        class="btn btn-outline-primary btn-sm">Báo Hổng</button></a>

                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- giữa -->
    @yield('main')
    <!-- LOGIN -->

    <div class="modal" id="signin">
        <div class="impl_signin">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="impl_sign_form">
                <h1>Đăng nhập</h1>
                <div class="form-group">
                    <input type="text" placeholder="Email" class="form-control">
                    <span class="form_icon">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" class="form-control">
                    <span class="form_icon">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="forget_password">
                    <div class="remember_checkbox">
                        <label>Lưu mật khẩu
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <a href="#">Quên mật khẩu ?</a>
                </div>
                <a href="#" class="impl_btn">Đăng nhập</a>
                <div class="login_google">
                    <p style="margin: 12px 0;">Hoặc đăng nhập bằng / Or login by</p>
                    <input type="button" class="btn btn-success" value="Login Google">
                </div>
                <p>Bạn chưa có tài khoản ? <a href="#signup" data-toggle="modal" class="impl_modal">Đăng ký</a></p>
            </div>
            <div class="impl_sign_img">
                <h2>Chào mừng bạn đến với chúng tôi</h2>
                <p>Là nơi thực hiện hiện ước mơ của bạn</p>
                <div class="impl_sign_bottom"
                    style="margin-top: 32px; position: relative;bottom: -176px;right: 0px; left: 426px;">
                    <i>Design by Le Van Tan</i>
                </div>
            </div>
        </div>
    </div>
    <!--sign-up form-->
    <div class="modal" id="signup">
        <div class="impl_signin">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="impl_sign_form">
                <h1>Đăng ký</h1>
                <div class="form-group">
                    <input type="text" placeholder="Username" class="form-control">
                    <span class="form_icon">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Email" class="form-control">
                    <span class="form_icon">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" class="form-control">
                    <span class="form_icon">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Confirm Password" class="form-control">
                    <span class="form_icon">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                <a href="#" class="impl_btn">Đăng ký</a>
                <p>Bạn đã có tài khoản ? <a href="#signin" data-toggle="modal">Đăng nhập</a></p>
            </div>
            <div class="impl_sign_img">
                <h2>Chào mừng bạn đến với chúng tôi</h2>
                <p>Là nơi thực hiện hiện ước mơ của bạn</p>
                <div class="impl_sign_bottom" style="position: relative;bottom: -176px;right: 0px; left: 426px;">
                    <i>Design by Le Van Tan</i>
                </div>
            </div>
        </div>
    </div>
    <div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "102250355624592");
  chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v12.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
    <!-- END LOGIN -->
    <!------ Footer Section Start ------>
    <!---- Go To Top---->
    <span class="gotop"><img src="images/goto.png" alt=""></span>
    @include('user.layout.footer')
    <!--Main js file Style-->
    @yield('js')
    <script type="text/javascript" src="{{url('public/fontend')}}/js/jquery.js"></script>
    <script type="text/javascript" src="{{url('public/fontend')}}/js/popper.js"></script>
    <script type="text/javascript" src="{{url('public/fontend')}}/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{url('public/fontend')}}/js/ion.rangeSlider.min.js"></script>
    <script type="text/javascript" src="{{url('public/fontend')}}/js/plugin/magnific/jquery.magnific-popup.min.js">
    </script>
    <script type="text/javascript" src="{{url('public/fontend')}}/js/plugin/slick/slick.min.js"></script>
    <script type="text/javascript" src="{{url('public/fontend')}}/js/plugin/nice_select/jquery.nice-select.min.js">
    </script>
    <!----------Revolution slider start---------->
    <script type="text/javascript"
        src="{{url('public/fontend')}}/js/plugin/revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript"
        src="{{url('public/fontend')}}/js/plugin/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript"
        src="{{url('public/fontend')}}/js/plugin/revolution/js/revolution.extension.kenburn.min.js"></script>
    <script type="text/javascript"
        src="{{url('public/fontend')}}/js/plugin/revolution/js/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript"
        src="{{url('public/fontend')}}/js/plugin/revolution/js/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript"
        src="{{url('public/fontend')}}/js/plugin/revolution/js/revolution.extension.parallax.min.js"></script>
    <script type="text/javascript"
        src="{{url('public/fontend')}}/js/plugin/revolution/js/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript"
        src="{{url('public/fontend')}}/js/plugin/revolution/js/revolution.extension.actions.min.js"></script>
    <script type="text/javascript"
        src="{{url('public/fontend')}}/js/plugin/revolution/js/revolution.addon.slicey.min.js"></script>
    <!----------Revolution slider start---------->
    <script type="text/javascript" src="{{url('public/fontend')}}/js/custom.js"></script>
    <!--Main js file End-->
    <script>window.MBID="xtVjOkTEi";</script><script defer src="https://menu.metu.vn/static/js/sdk.js?container=body"></script>
    <!-- Messenger Plugin chat Code -->
   
    @yield('js')
    @yield('main_javascript_page')
</body>

</html>
