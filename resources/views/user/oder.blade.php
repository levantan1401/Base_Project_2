@extends('user.site')
@section('title_user','Đơn hàng của tôi')
@section('css')
@stop()
@section('main')
<!------ Breadcrumbs Start ------>
<div class="impl_bread_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h1>Đơn hàng của tôi</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{Route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active"><a>Đơn hàng của tôi</a></li>
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
                        <li class="active" id="step1"><span>Đơn hàng hàng của tôi</span></li>
                    </ul>
                    <div class="impl_step ">
                        <div class="woocommerce">
                            <form>
                                <table class="table table-hover shop_table cart">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Hình Ảnh</th>
                                            <th>Tên Sản Phẩm</th>
                                            <th>Số Lượng</th>
                                            <th>Giá</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- <tr>{{$oder_product}}</tr> -->

                                        @foreach($oder_product as $item)
                                        <tr>
                                            <td>{{$loop->index}}</td>
                                            <td>
                                                <img src="{{url('public/uploads')}}/{{$item->or_order_detail->od_product->image}}">
                                            </td>
                                            <td>
                                                    {{$item->or_order_detail->od_product->name}}
                                            </td>
                                            <td>
                                                    {{$item->or_order_detail->quantity}}
                                            </td>
                                            <td>
                                                    {{$item->or_order_detail->price}}
                                            </td>
                                            <td>
                                            @if($item->tinhtrang == '0')
                                                Đang Xử Lý
                                                @elseif($item->tinhtrang == '1')
                                                Đang Giao Hàng
                                                @elseif($item->tinhtrang == '2')
                                                    Đã Hủy
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </form>
                        </div>
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
