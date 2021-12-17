@extends('user.site')
@section('main')
<!------ Breadcrumbs Start ------>
<div class="impl_bread_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h1>contact</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">contact</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!------ Contact Wrapper Start ------>
<div class="impl_contact_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-12 offset-lg-1">
                <div class="impl_con_form">
                    <div class="contact_map">
                        <div id="contact_map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3835.7388104523366!2d108.25104871465!3d15.975010588939204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142108997dc971f%3A0x1295cb3d313469c9!2sKorea%20-%20Vietnam%20Friendship%20Information%20Technology%20College!5e0!3m2!1sfr!2s!4v1637414103564!5m2!1sfr!2s" width="369" height="515" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div style="background-color:#999;color:red">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <h1>BẠN MUỐN TƯ VẤN GÌ??</h1>
                        <h4>Hãy liên lạc với chúng tôi</h4>
                    </div>
                    <form action="{{ Route('contact.store') }}" method="POST">
                        @csrf
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <input type="text" name="name" value="{{old('name')}}" class="form-control require"
                                    placeholder="Nhập tên của bạn">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <input type="email" name="email" value="{{old('email')}}" class="form-control require"
                                    placeholder="Nhập email" data-valid="email">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <input type="text" name="phone" value="{{old('phone')}}" class="form-control require"
                                    placeholder="Nhập SDT">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <textarea name="content" rows="4" value="{{old('content')}}" class="form-control"
                                    placeholder="Tin nhắn"></textarea>
                            </div>
                        </div>
                        <div class="response"></div>
                        <button type="submit" class="impl_btn submitForm">Gửi</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="impl_contact_info">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="impl_contact_box">
                                <div class="impl_con_data">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <h2>phone</h2>
                                    <p>+1-202-555-0137</p>
                                    <p>+1-202-555-0189</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="impl_contact_box">
                                <div class="impl_con_data">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    <h2>address</h2>
                                    <p>514 S. Magnolia St.<br>Orlando , US</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="impl_contact_box">
                                <div class="impl_con_data">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <h2>E - mail</h2>
                                    <p><a href="#">dummymail@mail.com</a></p>
                                    <p><a href="#">yourmail@mail.com</a></p>
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
