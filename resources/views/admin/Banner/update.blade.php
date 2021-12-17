@extends('layout.admin')
@section('title', 'Banner')
@section('main')
<div class="card">
    <div class="card-title text-center">
        <h4>
            @yield('title')
        </h4>
    </div>
    <div class="card-body">
        <form action="{{ route('banner.update', $model->id) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Tiêu Đề: </label>
                <input type="text" name="title" class="form-control" placeholder="Nhập Tiêu Đề" value="{{ $model->title }}">
                <div class="error" style="color: red;">
                    @if($errors->has('name'))
                    {{$errors->first('name')}}
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="">Ảnh sản phẩm</label>
                <div class="input-group">
                    <input type="text" name="images" id="image" class="form-control">
                    <span class="input-group-btn">
                        <a href="#modal-file" class="btn btn-primary" data-toggle="modal">Select</a>
                    </span>
                </div>
                <img src="{{url('public/uploads')}}/{{$model->images}}" alt="{{ $model->title }}" id="show_img" style="width: 100%;">
            </div>
            <div class="form-group">
                <label for="">Nội Dung: </label>
                <textarea id="content" name="noi_dung" class="form-control">{{ $model->noi_dung }}</textarea>
            </div>
            <div class="form-group">
                <label for="">Trạng thái</label>
                <div class="radio">
                    <label>
                        <input type="radio" name="trangthai" id="" value="0" {{ $model->trangthai == 0 ? 'checked' : ''}} />
                        Ẩn
                    </label>
                    <label>
                        <input type="radio" name="trangthai" id="" value="1" {{ $model->trangthai == 1 ? 'checked' : ''}} />
                        Hiển thị
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100"> Submit</button>
        </form>
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