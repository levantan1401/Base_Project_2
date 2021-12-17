@extends('user.site')

@section('css')
<!-- <link rel="stylesheet" href="{{url('public/fontend/css')}}/progress.css"> -->
@stop()
@section('main')
<!------ Breadcrumbs Start ------>
<div class="impl_bread_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h1>checkout</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">checkout</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!------ Sell wrapper  Start ------>
<div class="impl_sell_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-12 offset-lg-1">
                <div class="impl_checkout_wrapper" id="impl_sform">
                    <ul id="step_progressbar">
                        <li class="active" id="step1"><span>Giỏ Hàng</span></li>
                        <li id="step2"><span>Thông Tin</span></li>
                        <!-- <li id="step3"><span>Payment</span></li> -->
                        <!-- <li id="step4"><span>Receipt</span></li> -->
                    </ul>
                    <div class="impl_step ">
                        <div class="woocommerce">
                            <form>
                                <table class="table table-hover shop_table cart">
                                    <thead>
                                        <tr>
                                            <!-- <th>STT</th> -->
                                            <th>Hình Ảnh</th>
                                            <th>Tên Sản Phẩm</th>
                                            <th>Số Lượng</th>
                                            <th>Giá</th>
                                            <th>Remove</th>
                                        </tr><?php $key = 1 ?>
                                        @foreach($cart->items as $item)
                                        <tr>
                                            <!-- <td>{{$key}}</td> -->
                                            <td><a href=""><img src="{{url('public/uploads')}}/{{$item['image']}}" alt=""></a></td>
                                            <td>{{$item['name']}}</td>
                                            <td>
                                                {{$item['quantity']}}
                                            </td>
                                            <td>
                                                {{number_format($cart->total_price) }} VND
                                            </td>
                                            <td>
                                                <a href="{{ route('cart_remove',['id'=> $item['id']]) }}">
                                                    <span class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></span>
                                            </td>
                                            </a>
                                        </tr>
                                        <?php $key++ ?>
                                        @endforeach
                                    </thead>
                                </table>
                                <div class="impl_cart_footer">
                                    <div class="impl_footer_subs">
                                        <input type="text" class="form-control" placeholder="Nhập mã giới thiệu">
                                        <button class="foo_subs_btn">APPLY</button>
                                    </div>
                                    <div class="cart-subtotals">
                                        <div class="total-line">
                                            <span class="label">Tổng Tiền</span>
                                            <span class="value price">{{number_format($cart->total_price) }} VND</span>
                                        </div>
                                        <div class="total-line">
                                            <span class="label">VAT</span>
                                            <span class="value price">+ {{number_format( 0.1 * $cart->total_price) }} VND</span>
                                        </div>
                                        <div class="total-line">
                                            <span class="label">Khuyến mãi</span>
                                            <span class="value price">- 0</span>
                                        </div>
                                        <div class="total-line total_amount">
                                            <span class="label">Tổng</span>
                                            <span class="value price"> {{number_format($cart->total_price + 0.1* $cart->total_price - 0) }} VND</span>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <button type="button" name="next-step" class="next-step action-button impl_btn" value="Next"> next</button>
                    </div>
                    <!--second step-->

                    <div class="impl_step">
                        <h2 class="step-title">Thông tin vận chuyển</h2>
                        <form action="{{ route('form_checkout') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control" placeholder="Enter your Name" value="{{ Auth::guard('customer')->user()->name }}">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="phone" name="phone" class="form-control" placeholder="Enter Your Phone" value="{{ Auth::guard('customer')->user()->phone }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control" placeholder="Enter your Email" value="{{ Auth::guard('customer')->user()->email }}">
                                    </div>
                                    <div class="col-md-6">
                                    <input type="text" name="address" class="form-control" placeholder="Enter Your Address" value="{{ Auth::guard('customer')->user()->address}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="or_note" rows="3" placeholder="Ghi Chú"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">Online</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0" checked/>
                                    <label class="form-check-label" for="inlineRadio2">Thanh toán khi nhận hàng</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-default" >Đặt Hàng</button>
                        </form>
                        <!-- <button type="button" name="next-step" class="next-step action-button impl_btn" value="Next"> next</button> -->
                        <button type="button" name="previous-step" class="previous-step action-button impl_btn" value="Back"> Back</button>
                    </div>
                    <!--third step-->
                    <!-- <div class="impl_step  impl_pay_wrapper">
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                                <div class="impl_card_type form-group">
                                    <label class="radio_control control_radio">Debit Card
                                        <input type="radio" name="radio" checked="checked" />
                                        <span class="control_indicator"></span>
                                    </label>
                                    <label class="radio_control control_radio">Credit Card
                                        <input type="radio" name="radio" />
                                        <span class="control_indicator"></span>
                                    </label>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="h_name" class="form-control" placeholder="CARD HOLDER'S NAME">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="card_no" class="form-control" placeholder="CARD NUMBER">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="s_code" class="form-control" placeholder="SECURITY CODE">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <div class="pay_select_box custom_select">
                                            <label>EXPIRY DATE</label>
                                            <select>
                                                <option data-display="01">01</option>
                                                <option value="1">02</option>
                                                <option value="2">03</option>
                                                <option value="3">04</option>
                                                <option value="4">05</option>
                                            </select>
                                            <select>
                                                <option data-display="2017">2017</option>
                                                <option value="1">2018</option>
                                                <option value="2">2019</option>
                                                <option value="3">2020</option>
                                                <option value="4">2021</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('checkout') }}">
                            <button type="button" name="next-step" class="next-step action-button impl_btn" value="pay"> pay</button>
                        </a>
                        <button type="button" name="previous-step" class="previous-step action-button impl_btn" value="Back"> Back</button>
                    </div> -->
                    <!--fourth step-->
                    <div class="impl_step  impl_print_rcpt">
                        <h1>Thank You For Your Order !</h1>
                        <button type="button" name="next-step" class="impl_btn">Hóa Đơn</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop()

@section('js')
<!-- VÀO CHƯA -->
<script>
    $(document).ready(function() {
        var currentGfgStep, nextGfgStep, previousGfgStep;
        var opacity;
        var current = 1;
        var steps = $(".impl_step").length;

        setProgressBar(current);

        $(".next-step").click(function() {

            currentGfgStep = $(this).parent();
            nextGfgStep = $(this).parent().next();

            $("#step_progressbar li").eq($(".impl_step")
                .index(nextGfgStep)).addClass("active");

            nextGfgStep.show();
            currentGfgStep.animate({
                opacity: 0
            }, {
                step: function(now) {
                    opacity = 1 - now;
                    currentGfgStep.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    nextGfgStep.css({
                        'opacity': opacity
                    });
                },
                duration: 500
            });
            setProgressBar(++current);
        });

        $(".previous-step").click(function() {

            currentGfgStep = $(this).parent();
            previousGfgStep = $(this).parent().prev();

            $("#progressbar li").eq($(".impl_step")
                .index(currentGfgStep)).removeClass("active");

            previousGfgStep.show();

            currentGfgStep.animate({
                opacity: 0
            }, {
                step: function(now) {
                    opacity = 1 - now;
                    currentGfgStep.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previousGfgStep.css({
                        'opacity': opacity
                    });
                },
                duration: 500
            });
            setProgressBar(--current);
        });

        function setProgressBar(currentStep) {
            var percent = parseFloat(100 / steps) * current;
            percent = percent.toFixed();
            $(".progress-bar")
                .css("width", percent + "%")
        }

        $(".submit").click(function() {
            return false;
        })
    });
</script>

@stop()