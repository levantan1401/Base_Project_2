@extends('user.site')
@section('title_user','Sản Phẩm')
@section('main')
<?php
$mess = '';
?>
<!------ Breadcrumbs Start ------>
<div class="impl_bread_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h1>purchase</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">purchase</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!------ Purchase new section Start ------>
<div class="impl_purchase_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="impl_sorting_text custom_select">
                    <span class="impl_show"> Showing 9 of 68 Results</span>
                    <div class="impl_select_wrapper">
                        <span>sort by</span>
                        <select>
                            <option value="1">Newest</option>
                            <option value="2">New</option>
                            <option value="3">Old</option>
                            <option value="4">Oldest</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="impl_category_type">
                    <a href="purchase_new.html" class="impl_btn active">new car</a>
                    <a href="purchase_used.html" class="impl_btn impl_used_car" style="color:black">used car</a>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="impl_purchase_inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <div class="impl_sidebar">
                                <div class="impl_product_search widget woocommerce">
                                    <div class="impl_footer_subs">
                                        <form action="" class="form-inline">
                                            <div class="form-group">
                                                <input type="text" name="keyword" id="" class="form-control" placeholder="Search Category...">
                                            </div>
                                            <button type="submit" class="foo_subs_btn btn-primary">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <!--Brands-->
                                <div class="impl_product_brand widget woocommerce">
                                    <h2 class="widget-title">thể loại</h2>
                                    <ul>
                                        @foreach($categories as $cat)
                                        <li>
                                            <label class="brnds_check_label">
                                                {{$cat->name}}
                                                <input type="checkbox" name="check">
                                                <span class="label-text"></span>
                                            </label>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!--Colors-->
                                <div class="impl_product_color widget woocommerce">
                                    <h2 class="widget-title">color</h2>
                                    <ul>
                                        @foreach($product as $pro)
                                        <li>
                                            <label class="brnds_check_label">
                                                {{ $pro->color }}
                                                <input type="checkbox" name="check">
                                                <span class="label-text"></span>
                                            </label>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!--Price Range-->
                                <div class="impl_product_price widget woocommerce">
                                    <h2 class="widget-title">price range</h2>
                                    <div class="price_range">
                                        <input type="text" id="range_24" name="ionRangeSlider" value="" />
                                    </div>
                                </div>
                                <!--Car Type-->
                                <div class="impl_product_type widget woocommerce">
                                    <h2 class="widget-title">car type</h2>
                                    <ul>
                                        @foreach($categories as $cat)
                                        <li><a href="{{($cat->slug) }}">{{ $cat->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8">
                            <div class="row">
                                @if($product == 'null')
                                <div class="alert alert-danger " role="alert">
                                    CHƯA CÓ SẢN PHẨM NÀO
                                </div>
                                @else
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
                                <!--pagination start-->
                                <div class="col-lg-12 col-md-12">
                                    <div class="pagination justify-content-end">
                                        {{$product->links()}}
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop()