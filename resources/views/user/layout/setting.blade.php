@extends('user.site')
@section('title_user','Profile')
@section('main')
<style>
.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: #2340f6;
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #f00a4d;
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 15px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}
</style>
<div class="container rounded bg-white mt-5 mb-5">
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
    <form action="{{route('setting.update', $data->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img name="avatar" class="rounded-circle mt-5" id="show_img"  src="{{url('public/uploads/Avatar')}}/{{$data->avatar}}" width="150" height="150">
                    <span class="font-weight-bold">{{Auth::guard('customer')->user()->name }}</span>
                    <input id="avatar-1" name="avatar" type="file" required="">
                    <label class="font-weight-bold">Email:</label>
                    <span class="text-black-50">{{Auth::guard('customer')->user()->email }}</span>
                    <label class="font-weight-bold">Phone:</label>
                    <span class="text-black-50">{{Auth::guard('customer')->user()->phone }}</span>
                </div>
            </div>
            <div class="col-md-8 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="text-right">Edit your profile</h6>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label class="labels">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $data->name }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Email</label><input type="text" name="name"
                                class="form-control" value="{{ $data->email }}"></div>
                        <div class="col-md-12"><label class="labels">Phone</label><input type="text" name="phone"
                                class="form-control" value="{{ $data->phone }}"></div>
                        <div class="col-md-12"><label class="labels">Address</label><input type="text" name="address"
                                class="form-control" value="{{ $data->address }}"></div>
                    </div>

                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit">Save</button>
                        <a class="btn btn-primary profile-button" href="{{Route('home')}}" type="button">Back</a>
                    </div>
                </div>
            </div>

        </div>
    </form> <!-- /.end -->
</div>
@stop()
@section('js')
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
