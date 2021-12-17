@extends('user.site')
@section('main')

<!------ Breadcrumbs Start ------>
<div class="impl_bread_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h1>Báo hỏng</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{Route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Báo Hỏng</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!------ Sell wrapper  Start ------>
<div class="impl_sell_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
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
                <div class="impl_heading">
                    <h1>Thông tin</h1>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <form id="impl_sform" action="{{route('report.store')}}" method="post">
                    @csrf

                    <div class="impl_steps_wrapper">
                        <h3><span class="step_number">1</span></h3>
                        <section>
                            <div class="impl_step">
                                <h2 class="step-title">Thông tin khách hàng</h2>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input id="userName" name="name" type="text" class="form-control required" value="{{ Auth::guard('customer')->user()->name }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input id="step_mobile" type="text" name="phone" class="form-control required number" placeholder="YOUR MOBILE*" value="{{ Auth::guard('customer')->user()->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input id="step_mail" type="text" name="email" class="form-control required email" placeholder="YOUR EMAIL" data-valid="email" value="{{ Auth::guard('customer')->user()->email }}" data-error="Email should be valid.">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input id="step_city" type="text" name="address" class="form-control required" placeholder="CITY" value="{{ Auth::guard('customer')->user()->address}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <h3><span class="step_number">2</span></h3>
                        <section>
                            <!--second step-->
                            <div class="impl_step">
                                <h2 class="step-title">Trạng Thái Xe</h2>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <input id="step_brand" type="text" name="id_product" value class="form-control required" placeholder="Nhập mã xe Của bạn">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                        <textarea name="tinhtrang" rows="4" value="{{old('content')}}" class="form-control" placeholder="Tin nhắn"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="form-group">
                            <label for="">Danh sách hình ảnh </label>
                            <input type="hidden" name="image" id="list_image">
                            <span class="input_group">
                                <a href="#modal-files" class="btn btn-primary" data-toggle="modal">Select</a>
                            </span>
                            <div class="row" id="show_list_image">

                            </div>
                    </div>
                     <button type="submit" class="btn btn-primary" style="margin-bottom: 20px;" >Báo hổng</button>
                </form>
            </div>
        </div>
    </div>
</div>

@stop()
@section('js')
<!-- Modal -->
<div class="modal fade" id="modal-file" style="width: 100%;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Quản Lý File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <iframe src="{{ url('file') }}/dialog.php?akey=m3t0Fu6stueBmos1Uzoi002DhU9OcwdcqXQqW8OpY8&field_id=image" frameborder="0" style="width: 100%; height: 600px; border: 0; overflow-y: auto;"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-files" style="width: 100%;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Quản Lý File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <iframe src="{{ url('file') }}/dialog.php?akey=m3t0Fu6stueBmos1Uzoi002DhU9OcwdcqXQqW8OpY8&field_id=list_image" frameborder="0" style="width: 100%; height: 600px; border: 0; overflow-y: auto;"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- SLUG -->
<script src="{{url('public/admin')}}/js/slug.js"></script>
<script src="{{ url('public/admin/tinymce/tinymce.min.js') }}"></script>
<script src="{{ url('public/admin/tinymce/config.js') }}"></script>

<!-- SELECT 2 -->
<script>
    $('#modal-file').on('hidden.bs.modal', function() {
        var _img = $('input#image').val();
        $('img#show_img').attr('src', _img);
    });

    $('#modal-files').on('hidden.bs.modal', function() {
        var _img = $('input#list_image').val();
        var _imgList = $.parseJSON(_img);
        var _html = '';
        for (let index = 0; index < _imgList.length; index++) {
            _html += '<div class="col-md-3" class="thumbnail">';
            _html += '<img src="' + _imgList[index] + '" alt="" style="width: 100%;">';
            _html += '</div>';
        }
        $('#show_list_image').html(_html);
    })
</script>

@stop()
