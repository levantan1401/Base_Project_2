@extends('user.site')
@section('main')
<!------ Breadcrumbs Start ------>
<div class="impl_bread_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h1>blog</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">blog left sidebar</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!------ Blog section Start ------>
<div class="impl_blog_wrapper impl_blog_page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="impl_blog_inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <div class="impl_sidebar">
                                <div class="impl_product_search widget woocommerce">
                                    <h2 class="widget-title">looking for</h2>
                                    <div class="impl_footer_subs">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <button class="foo_subs_btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                                <!--Categories-->
                                <div class="widget widget_categories">
                                    <h2 class="widget-title">Thể Loại</h2>
                                    <ul>
                                        <li><a href="#"> Changing Oil</a></li>
                                        <li><a href="#"> Saving Fuel</a></li>
                                        <li><a href="#"> Antilock Brakes</a></li>
                                        <li><a href="#"> Battery</a></li>
                                        <li><a href="#"> Tips On Long Car Trips</a></li>
                                        <li><a href="#"> Air Pressure</a></li>
                                        <li><a href="#"> Tire Replacement</a></li>
                                    </ul>
                                </div>
                                <!--Recent Post-->
                                <div class="widget widget_recent_entries">
                                    <h2 class="widget-title">Bài Đăng Gần Đây</h2>
                                    <ul>
                                        @foreach($gannhat as $post)
                                        <li>
                                            <div class="recent_cmnt_img">
                                                <img src="{{ url('public/uploads') }}/{{ $post->image }}" alt="">
                                            </div>
                                            <div class="recent_cmnt_data">
                                                <h4><a href="#">{{ Str::limit($post->title, 50)}}</a></h4>
                                                <span>{{ $post->created_at->format('d-m-Y ') }}</span>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!--Tag Cloud-->
                                <div class="widget widget_tag_cloud">
                                    <h2>Tags</h2>
                                    <ul>
                                        @foreach($gannhat as $post)
                                        <a href="">
                                            <span class="badge badge-danger p-2">{{ $post->tags }}</span>
                                        </a>
                                        @endforeach
                                    </ul>
                                </div>
                                <!--Instagram-->
                                <div class="widget widget_instagram_feed">
                                    <h2 class="widget-title">Hình Ảnh Liên Quan</h2>
                                    <ul>
                                        @foreach($gannhat as $post)
                                        <li><a href="#"><img src="{{ url('public/uploads') }}/{{ $post->image }}" alt="" style="width: 70px;"></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--sidebar end-->
                        <div class="col-lg-9 col-md-9 impl_blog_section">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <!--blog1-->
                                    @foreach($posts as $post)
                                    <div class="impl_blog_box">
                                        <div class="impl_post_img">
                                            <img src="{{ url('public/uploads') }}/{{ $post->image }}" alt="{{ $post->slug }}" class="img-fluid" />
                                            <span class="impl_pst_date">
                                                {{ $post->created_at->format('M d') }}
                                            </span>
                                            <div class="impl_pst_img_icon"><a href="{{ route('tin-tuc',['slug' => $post->slug, 'id' => $post->id])}}"><i class="fa fa-link" aria-hidden="true"></i></a></div>
                                        </div>
                                        <div class="impl_post_data">
                                            <h2><a href="{{ route('tin-tuc',['slug' => $post->slug, 'id' => $post->id])}}">{{ $post->title }}</a></h2>
                                            <p>{{ $post->briefInfo }}</p>
                                            <div class="impl_pst_info">
                                                <div class="impl_pst_admin">
                                                    <span><a href="#">admin</a></span>
                                                    <span>{{ $post->created_at->format('d-m-Y') }}</span>
                                                </div>
                                                <ul class="impl_pst_views">
                                                    <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i>{{ $post->view_count }}</a></li>
                                                    <li><a href="#"><i class="fa fa-comments" aria-hidden="true"></i>0</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <!--pagination start-->
                                <div class="col-lg-12 col-md-12">
                                    <div class="pagination justify-content-end">
                                        {{$posts->appends(request()->all())->links()}}
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
@stop()