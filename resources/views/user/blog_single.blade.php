@extends('user.site')
@section('main')

<!------ Breadcrumbs Start ------>
<div class="impl_bread_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h1>Tin tức</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang Chủ</a></li>
                    <li class="breadcrumb-item active">{{ $slug->title }}</li>
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
                                    <h2 class="widget-title">Thể loại</h2>
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
                                    <div class="title" style="margin-bottom: 36px;">
                                        <h2>{{ $post->title }}</h2>
                                        <small style="color:#bbb; margin: 8px;">
                                            <span><i class="fa fa-clock-o"></i> {{ $post->created_at->format('d-m-Y') }}</span>
                                        </small>
                                    </div>
                                    <hr>
                                    <div class="gioithieu" style="margin: 6px 0px 32px;">
                                        <h5>{{$post->briefInfo}}</h5>
                                    </div>
                                    <div class="impl_blog_box single_blog">
                                        {!! $slug->content !!}
                                    </div>
                                    <!--comments area start-->
                                    <div class="comments-area">
                                        <div class="comments-area-title">
                                            <h3 class="comments-title"> Comments (251)</h3>
                                        </div>
                                        <ol class="commentlist">
                                            <li class="comment">
                                                <div class="impl_comments">
                                                    <div class="comment_img">
                                                        <img src="http://via.placeholder.com/100x100" alt="">
                                                    </div>
                                                    <div class="comment_data">
                                                        <div class="comment_data_info">
                                                            <h3><a href="#">Joseph Hartley</a></h3>
                                                            <p class="cmnt_date">16 September 2017 | 21:00</p>
                                                        </div>
                                                        <p class="comment_para">
                                                            "But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings."
                                                        </p>
                                                        <span class="comment-reply"><a href="#"> <i class="fa fa-reply" aria-hidden="true"></i></a></span>
                                                    </div>
                                                </div>
                                                <ul class="children">
                                                    <li class="comment">
                                                        <div class="impl_comments">
                                                            <div class="comment_img">
                                                                <img src="http://via.placeholder.com/100x100" alt="">
                                                            </div>
                                                            <div class="comment_data">
                                                                <div class="comment_data_info">
                                                                    <h3><a href="#">peter nevil</a></h3>
                                                                    <p class="cmnt_date">16 September 2017 | 21:00</p>
                                                                </div>
                                                                <p class="comment_para">
                                                                    "But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings."
                                                                </p>
                                                                <a href="" class="comment-reply">
                                                                    <span><i class="fa fa-reply" aria-hidden="true"></i></span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="comment">
                                                <div class="impl_comments">
                                                    <div class="comment_img">
                                                        <img src="http://via.placeholder.com/100x100" alt="">
                                                    </div>
                                                    <div class="comment_data">
                                                        <div class="comment_data_info">
                                                            <h3><a href="#">lena adms</a></h3>
                                                            <p class="cmnt_date">16 September 2017 | 21:00</p>
                                                        </div>
                                                        <p class="comment_para">
                                                            "But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings."
                                                        </p>
                                                        <span class="comment-reply"><a href="#"> <i class="fa fa-reply" aria-hidden="true"></i></a></span>
                                                    </div>
                                                </div>
                                        </ol>
                                    </div>
                                    <!--comments area end-->
                                    <div class="comment-respond">
                                        <h3 id="reply-title" class="comments-title">leave a comment</h3>
                                        <form>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="comment_input_wrapper">
                                                        <input name="name" value="" type="text" class="cmnt_field" placeholder="YOUR NAME">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="comment_input_wrapper">
                                                        <input name="email" value="" type="email" class="cmnt_field" placeholder="YOUR EMAIL">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="comment_input_wrapper">
                                                        <textarea id="comment" name="comment" class="cmnt_field" placeholder="YOUR COMMENT"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="comment-form-submit">
                                                        <input name="submit" type="submit" id="comment-submit" class="submit impl_btn" value="Post Comment">
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
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