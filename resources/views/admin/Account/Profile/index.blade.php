@extends('layout.admin')
@section('title', 'Profile')
@section('main')
<style>
    a {
    color: #e9ecef;
    text-decoration: none;
}
</style>
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
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Settings</h1>
        <div class="row">
            <div class="col-md-3 col-xl-2">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Profile Settings</h5>
                    </div>
                    <div class="list-group list-group-flush" role="tablist">
                        <a class="list-group-item list-group-item-action active" data-bs-toggle="list"  role="tab"> Account</a>
                        <a class="list-group-item list-group-item-action" href="{{route('resetmk.edit',$data->id)}}"> Password </a>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-xl-10">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="account" role="tabpanel">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Thông Tin Cá Nhân</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{route('profile.update', $data->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="mb-3">
                                                <label class="form-label" for="inputUsername">Username</label>
                                                <input type="text" name="name" class="form-control" id="inputUsername"
                                                    value="{{ $data->name }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="inputUsername">Phone</label>
                                                <input type="text" name="phone" class="form-control" id="inputUsername"
                                                    value="{{ $data->phone}}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="inputUsername">Email</label>
                                                <input type="text" name="email" class="form-control" id="inputUsername"
                                                    value="{{ $data->email}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="text-center">
                                                <img src="{{url('public/uploads/Avatar')}}/{{$data->avatar}}" alt="" id="show_img" style="width: 20%;" name="avatar">
                                                <div class="mt-2">
                                                    <span  class="btn btn-primary"><a href="#modal-file" name="avatar" data-toggle="modal"><i  class="fas fa-upload"></i>Upload</a></span>
                                                </div>
                                                <small><input type="label" name="avatar" id="image" class="form-control" value="{{$data->avatar}}"></small>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@stop()
@section('js')
<!-- SLUG -->
<script src="{{url('public/admin')}}/js/slug.js"></script>
<script src="{{ url('public/admin/tinymce/tinymce.min.js') }}"></script>
<script src="{{ url('public/admin/tinymce/config.js') }}"></script>
<script src="{{url('public/admin')}}/js/app.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function(event) {
    setTimeout(function() {
        if (localStorage.getItem('popState') !== 'shown') {
            window.notyf.open({
                type: "success",
                message: "Get access to all 500+ components and 45+ pages with AdminKit PRO. <u><a class=\"text-white\" href=\"https://adminkit.io/pricing\" target=\"_blank\">More info</a></u> 🚀",
                duration: 10000,
                ripple: true,
                dismissible: false,
                position: {
                    x: "left",
                    y: "bottom"
                }
            });

            localStorage.setItem('popState', 'shown');
        }
    }, 15000);
});
</script>
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
