@extends('user.site')
@section('main')
<?php $images = json_decode($product->list_image) ?>
<style type="text/css">
.slick-slide {
    display: none;
    float: left;
    /* height: 100%; */
    min-height: 1px;
}

.be-comment-block {
    margin-bottom: 50px !important;
    border: 1px solid #edeff2;
    border-radius: 2px;
    padding: 50px 70px;
    border: 1px solid #ffffff;
}

.comments-title {
    font-size: 16px;
    color: #262626;
    margin-bottom: 15px;
    font-family: 'Conv_helveticaneuecyr-bold';
}

.be-img-comment {
    width: 60px;
    height: 60px;
    float: left;
    margin-bottom: 15px;
}

.be-ava-comment {
    width: 60px;
    height: 60px;
    border-radius: 50%;
}

.be-comment-content {
    margin-left: 80px;
}

.be-comment-content span {
    display: inline-block;
}

.be-comment-name {
    font-size: 20px;
    font-family: 'Times New Roman';
}

.be-comment-content a {
    color: #383b43;
}

.be-comment-content span {
    display: inline-block;
}

.be-comment-time {
    text-align: right;
}

.be-comment-time {
    font-size: 11px;
    color: #b4b7c1;
}

.be-comment-text {
    font-size: 13px;
    line-height: 18px;
    color: #7a8192;
    display: block;
    background: #f6f6f7;
    border: 1px solid #edeff2;
    padding: 15px 20px 20px 20px;
}

.form-group.fl_icon .icon {
    position: absolute;
    top: 1px;
    left: 16px;
    width: 48px;
    height: 48px;
    background: #f6f6f7;
    color: #b5b8c2;
    text-align: center;
    line-height: 50px;
    -webkit-border-top-left-radius: 2px;
    -webkit-border-bottom-left-radius: 2px;
    -moz-border-radius-topleft: 2px;
    -moz-border-radius-bottomleft: 2px;
    border-top-left-radius: 2px;
    border-bottom-left-radius: 2px;
}

.form-group .form-input {
    font-size: 13px;
    line-height: 50px;
    font-weight: 400;
    color: #b4b7c1;
    width: 100%;
    height: 50px;
    padding-left: 20px;
    padding-right: 20px;
    border: 1px solid #edeff2;
    border-radius: 3px;
}

.form-group.fl_icon .form-input {
    padding-left: 70px;
}

.form-group textarea.form-input {
    height: 150px;
}

.star-rating {
    line-height: 32px;
    font-size: 1.25em;
}

.star-rating .fa-star {
    color: yellow;
}

.rating-on span {
    color: yellow;
}

.fa {
    font-size: 25px;
}
</style>
<!------ Breadcrumbs Start ------>
<div class="impl_bread_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h1>purchase single</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">purchase single</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!------ Purchase Car Start ------>
<div class="impl_buy_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="impl_buycar_wrapper">
                    <div class="impl_buycar_color" id="color_car">
                        <div class="slider slider-for1">
                            <div><img src="{{ url('public/uploads')}}/{{ $product->image }}" alt="{{ $product->name }}">
                            </div>
                            @if(is_array($images))
                            @for($i = 1 ; $i < count($images); $i++) <div>
                                <h3><img src="{{$images[$i]}}" alt="{{ $product->name }}"
                                        class="img-fluid impl_hover_car_img" style="height: 300px;" /></h3>
                        </div>
                        @endfor
                        @endif

                    </div>
                    <div class="slider slider-nav1">
                        <div><span class="car_color car_clr1"></span></div>
                        <div><span class="car_color car_clr2"></span></div>
                        <div><span class="car_color car_clr3"></span></div>
                        <div><span class="car_color car_clr4"></span></div>
                        <div><span class="car_color car_clr5"></span></div>
                        <div><span class="car_color car_clr6"></span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="impl_buycar_data">
                <h1>{{ $product->name }}
                    <span>

                    </span>
                </h1>
                @if($product->sale_price > 0)
                <h4><s> {{ number_format( $product->price )}} VND</s></h4>
                <h2 style="color: red;">{{ number_format( $product->sale_price )}} VND</h2>
                @else
                <h2>{{ number_format( $product->price )}} VND</h2>
                @endif
                <div class="content mt-3">
                    {!!($product->content)!!}
                </div>
                <div class="impl_old_buy_btn">
                    <!-- <a href="{{ route('checkout') }}/{{$product->id}}" class="impl_btn">thêm vào giỏ hàng</a> -->
                    <a href="{{ route('checkout') }}/{{$product->id}}" class="impl_btn">mua ngay</a>
                    <a href="{{ route('compare') }}/{{$product->id}}" class="impl_btn">so sánh</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!------ Purchase Car Start ------>
<div class="impl_spesi_wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="impl_car_spesi_list">
                    <div class="impl_heading">
                        <h1>Car Specifications</h1>
                    </div>
                    <ul>
                        <li>
                            <h3>Acceleration</h3>
                            <div class="progress">
                                <div class="progress-bar" style="width:70%"></div>
                            </div>
                        </li>
                        <li>
                            <h3>weight</h3>
                            <div class="progress">
                                <div class="progress-bar" style="width:30%"></div>
                            </div>
                        </li>
                        <li>
                            <h3>control</h3>
                            <div class="progress">
                                <div class="progress-bar" style="width:80%"></div>
                            </div>
                        </li>
                        <li>
                            <h3>off-road</h3>
                            <div class="progress">
                                <div class="progress-bar" style="width:60%"></div>
                            </div>
                        </li>
                        <li>
                            <h3>top speed</h3>
                            <div class="progress">
                                <div class="progress-bar" style="width:40%"></div>
                            </div>
                        </li>
                        <li>
                            <h3>toughness</h3>
                            <div class="progress">
                                <div class="progress-bar" style="width:50%"></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 impl_padderleft impl_padderright">
                <div class="impl_car_spesi_img">
                    <img src="{{ url('public/fontend/images/banner1.jpg') }}" alt="" />
                </div>
            </div>
        </div>

    </div>
</div>
<!------ Car parts wrapper Start ------>
<!-- <div class="impl_carparts_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="impl_carparts_inner">
                    <div class="impl_carparts">
                        <div class="slider slider-for">
                            <div>
                                <div class="impl_slider_img"><img src="{{ url('public/uploads/sanpham1.png')}}" alt="">
                                    <ul class="impl_car_prts">
                                        <li>
                                            <span class="impl_cr_no">1</span>
                                            <span class="impl_cr_prts_des">Anti-Lock Braking </span>
                                        </li>
                                        <li>
                                            <span class="impl_cr_no">2</span>
                                            <span class="impl_cr_prts_des"> Premium Headlights</span>
                                        </li>
                                        <li>
                                            <span class="impl_cr_no">3</span>
                                            <span class="impl_cr_prts_des">Night Vision Windshield </span>
                                        </li>
                                        <li>
                                            <span class="impl_cr_no">4</span>
                                            <span class="impl_cr_prts_des">Leather Seats </span>
                                        </li>
                                        <li>
                                            <span class="impl_cr_no">5</span>
                                            <span class="impl_cr_prts_des">Best Quality Tires </span>
                                        </li>
                                        <li>
                                            <span class="impl_cr_no">6</span>
                                            <span class="impl_cr_prts_des">Ground Clearance of 170mm </span>
                                        </li>
                                        <li>
                                            <span class="impl_cr_no">7</span>
                                            <span class="impl_cr_prts_des">350 Liters Boot Capacity </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div>
                                <div class="impl_slider_img"><img src="http://via.placeholder.com/1140x353" alt="">
                                    <ul class="impl_car_prts">
                                        <li>
                                            <span class="impl_cr_no">1</span>
                                            <span class="impl_cr_prts_des">radiator support </span>
                                        </li>
                                        <li>
                                            <span class="impl_cr_no">2</span>
                                            <span class="impl_cr_prts_des">premium headlights</span>
                                        </li>
                                        <li>
                                            <span class="impl_cr_no">3</span>
                                            <span class="impl_cr_prts_des">Night Vision Windshield </span>
                                        </li>
                                        <li>
                                            <span class="impl_cr_no">4</span>
                                            <span class="impl_cr_prts_des">Leather Seats </span>
                                        </li>
                                        <li>
                                            <span class="impl_cr_no">5</span>
                                            <span class="impl_cr_prts_des">premium headlights</span>
                                        </li>
                                        <li>
                                            <span class="impl_cr_no">6</span>
                                            <span class="impl_cr_prts_des">solid bumber </span>
                                        </li>
                                        <li>
                                            <span class="impl_cr_no">7</span>
                                            <span class="impl_cr_prts_des">mirror</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div>
                                <div class="impl_slider_img"><img src="http://via.placeholder.com/1140x353" alt="">
                                    <ul class="impl_car_prts">
                                        <li>
                                            <span class="impl_cr_no">1</span>
                                            <span class="impl_cr_prts_des">step bumper </span>
                                        </li>
                                        <li>
                                            <span class="impl_cr_no">2</span>
                                            <span class="impl_cr_prts_des"> tail lights</span>
                                        </li>
                                        <li>
                                            <span class="impl_cr_no">3</span>
                                            <span class="impl_cr_prts_des">Night Vision Windshield </span>
                                        </li>
                                        <li>
                                            <span class="impl_cr_no">4</span>
                                            <span class="impl_cr_prts_des">grilles </span>
                                        </li>
                                        <li>
                                            <span class="impl_cr_no">5</span>
                                            <span class="impl_cr_prts_des">tailgates trunk lids </span>
                                        </li>
                                        <li>
                                            <span class="impl_cr_no">6</span>
                                            <span class="impl_cr_prts_des">silencer </span>
                                        </li>
                                        <li>
                                            <span class="impl_cr_no">7</span>
                                            <span class="impl_cr_prts_des">tail light </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="slider slider-nav">
                            <div>
                                <div class="impl_thumb_ovrly"><img src="http://via.placeholder.com/170x100" alt="">
                                </div>
                            </div>
                            <div>
                                <div class="impl_thumb_ovrly"><img src="http://via.placeholder.com/170x100" alt="">
                                </div>
                            </div>
                            <div>
                                <div class="impl_thumb_ovrly"><img src="http://via.placeholder.com/170x100" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!------ Car description wrapper Start ------>
<div class="impl_descrip_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="img">
                    @if(is_array($images))
                    <img src="{{$images[1]}}" alt="{{ $product->name }}" class="img-fluid impl_hover_car_img"
                        style=" max-height: 480px; max-width: 634px;" />
                    @endif
                </div>
                <div class="button" style=" margin-top: 40px; text-align: center;">
                    <a href="" type="button" class="btn "
                        style="background-color: #2c72c6;border-color: #2c72c6; color: #fff; max-width:200px;width: 100%;min-width: 0;">MUA
                        NGAY</a>
                    <a href="" type="button" class="btn "
                        style="margin-left: 10px;  max-width: 200px;  width: 100%;  min-width: 0; border:1px solid #000; color:#2c72c6">XEM
                        PROCHUSE</a>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="impl_heading">
                            <h1>Thông số kĩ thuật</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="impl_descrip_box">
                            <h2>Dài x Rộng x Cao</h2>
                            <p>{!! $thongso->dai_rong_cao !!}</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="impl_descrip_box">
                            <h2>Động Cơ</h2>
                            <p>{!! $thongso->dongCo !!}</p>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="impl_descrip_box">
                            <h2>Chiều Dài Cơ Sở</h2>
                            <p>{!! $thongso->chieuDaiCS !!}</p>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="impl_descrip_box">
                            <h2>Khoảng Sáng Gầm</h2>
                            <p>{!! $thongso->khoangSangGam !!}</p>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="impl_descrip_box">
                            <h2>Dung tích Nhiên liệu</h2>
                            <p>{!! $thongso->dungTichNL !!}</p>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="impl_descrip_box">
                            <h2>Mức tiêu thụ Nhiên Liệu</h2>
                            <p>{!! $thongso->mucTieuThuNL !!}</p>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="impl_descrip_box">
                            <h2>Công suất max</h2>
                            <p>{!! $thongso->congSuatMax !!}</p>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="impl_descrip_box">
                            <h2>Momem Xoắn cực đại</h2>
                            <p>{!! $thongso->moMemXoan !!}</p>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="impl_descrip_box">
                            <h2>Hộp số</h2>
                            <p>{!! $thongso->hopSo !!}</p>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="impl_descrip_box">
                            <h2>Dẫn động</h2>
                            <p>{!! $thongso->danDong !!}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!------ comment ------>
<div class="container">
    <div class="be-comment-block">
        <h3 class="be-comment-center" style="text-align: center">Bình Luận Sản Phẩm</h3>
        <h1 class="comments-title">Comments(4)</h1>
        <!-- HIỂN THI -->
        <div class="be-comment" id="box_ul_show_comment">

        </div>
        <form action="#" method="post" id="form_evaluate">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <h3 class="be-comment-center" style="text-align: center">Gửi bình Luận</h3>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <label class="">Đánh giá</label>
                        <div class="star-rating">
                            <span class="far fa-star" data-rating="1"></span>
                            <span class="far fa-star" data-rating="2"></span>
                            <span class="far fa-star" data-rating="3"></span>
                            <span class="far fa-star" data-rating="4"></span>
                            <span class="far fa-star" data-rating="5"></span>
                            <input type="hidden" name="whavalue_startever1" id="value_star_id" class="rating-value">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 fl_icon">
                        <label class="">Bình Luận</label>
                        <div class="form-group">
                            <textarea class="form-input" id="inputTextComment" required=""
                                placeholder="Your text"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary pull-right" type="submit" id="btnSendComment"
                style="margin-left: 120px;">Đăng</button>
    </div>
    </form>
</div>
</div>




@endsection

@section('main_javascript_page')
<script>
$(document).ready(function() {
    var $star_rating = $('.star-rating .far');
    var SetRatingStar = function() {
        return $star_rating.each(function() {
            if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this)
                    .data(
                        'rating'))) {
                return $(this).removeClass('far fa-star').addClass('fa fa-star');
            } else {
                return $(this).removeClass('fa fa-star').addClass('far fa-star');
            }
        });
    };

    $star_rating.on('click', function() {
        $star_rating.siblings('input.rating-value').val($(this).data('rating'));
        return SetRatingStar();
    });
})
</script>
<script>
$(document).ready(function() {
    //lấy giá trị đánh giá
    $('#form_evaluate').on('click', '.star-rating .fa-star', function(e) {
        let star = $(this).data('rating');
        $('#value_star_id').val(star);
        console.log(star);
    })

    // Gửi comment
    $('body').on('submit', '#form_evaluate', function(e) {
            e.preventDefault();
            // suawr
            let id_product = '{{$product->id}}';
            let id_user = '{{ Auth::guard("customer")->check() ? Auth::guard("customer")->user()->id : "" }}';
            let valueComment = $('#inputTextComment').val();
            let value_rating = $('#value_star_id').val();

            console.log(id_user);

            $.ajax({
                url: '{{route("comments.send")}}',
                type: 'POST',
                data: {
                    "_token": $('meta[name="csrf-token"]').attr("content"),
                    id_product: id_product,
                    id_user: id_user,
                    valueComment: valueComment,
                    value_rating: value_rating
                },
                success: function(data) {
                    if (data != null) {
                        showComment();
                    }
                }
            })

        })
    // show comment
    function showComment() {
        let id_product = '{{$product->id}}';
        // console.log("test show " + id_product);
        $.ajax({
            url: '{{route("comments.showall")}}',
            type: 'get',
            data: {
                "_token": $('meta[name="csrf-token"]').attr("content"),
                id_product: id_product
            },
            success: (data) => {
                $('#box_ul_show_comment').html(data);
            }
        })
    }
    showComment();
    // console.log("hello comment")
})
</script>
@endsection

