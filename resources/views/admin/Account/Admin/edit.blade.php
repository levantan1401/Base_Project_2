@extends('layout.admin')
@section('title', 'Sửa Thông tin ')
@section('main')

<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<h2 class="text-center">@yield('title')</h2>
<a href="{{Route('account.index')}}" class="btn btn-primary" style="margin-left: 20px;height: 40px;width: 100px;">Quay Lại</a>
<div class="container">
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (session('messages'))
        <div class="alert alert-success" role="alert">
            {{ session('messages') }}
        </div>
        @endif
    </div>
    <form action="{{route('account.update', $data->id) }}" method="post">
        @csrf

        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="">Avatar</label>
            <div class="input-group">
                <input type="text" name="avatar" id="image" class="form-control" value="{{$data->avatar}}">
                <span class="input-group-btn">
                    <a href="#modal-file" class="btn btn-primary" data-toggle="modal">Select</a>
                </span>
            </div>
            <img src="{{url('public/uploads/Avatar')}}/{{$data->avatar}}" alt="" id="show_img" style="width: 20%;">
        </div>
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" id="name" value="{{ $data->name }}" class="form-control"
                aria-describedby="helpId">
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $data->email }}" id="inputEmail4"
                    placeholder="Email">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="">Số Điện Thoại</label>
                <input type="text" name="phone" id="phone" value="{{$data->phone}}" class="form-control"
                    aria-describedby="helpId">
            </div>
            <div class="form-group col-md-6">
                <label for="">Chức Vụ</label>
                <select class="form-select" aria-label="Default select example" style="height:30px" name="chucvu">
                    <option>Nhân Viên</option>
                    <option>Quản Lý</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-50"> Update</button>

    </form>
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
                    <iframe
                        src="{{ url('file') }}/dialog.php?akey=m3t0Fu6stueBmos1Uzoi002DhU9OcwdcqXQqW8OpY8&field_id=image"
                        frameborder="0" style="width: 100%; height: 600px; border: 0; overflow-y: auto;"></iframe>
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
                    <iframe
                        src="{{ url('file') }}/dialog.php?akey=m3t0Fu6stueBmos1Uzoi002DhU9OcwdcqXQqW8OpY8&field_id=list_image"
                        frameborder="0" style="width: 100%; height: 600px; border: 0; overflow-y: auto;"></iframe>
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
