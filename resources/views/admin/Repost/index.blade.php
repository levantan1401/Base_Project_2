@extends('layout.admin')
@section('title', 'Quản lý báo hỏng')
@section('main')
<div class="search mb-2">
<p class="card-title text-center" style="font-size: 32px; ">@yield('title')</p>
    <form action="" class="form-inline">
        <div class="form-group">
            <input type="text" name="keyword" id="" class="form-control" placeholder="Search Category...">
        </div>
        <button type="submit" class="btn btn-primary mr-2">
            <i class="fas fa-search"></i>
        </button>
    </form>
</div>
<div class="card">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên KH</th>
                <th>Địa Chỉ</th>
                <th>Tên Xe</th>
                <th>Một số hình ảnh</th>
                <th>Ghi Chú</th>
                <th>Trạng Thái</th>
                <th class="text-center">Tác vụ</th>
            </tr>
        </thead>
        <tbody>

            @foreach($baohong as $key=>$baohong)
            <?php
                 $images = json_decode($baohong->image)
            ?>
            <tr>
                <td> {{$key+1}}</td>
                <td> {{$baohong->getuser->name}} </td>
                <td> {{$baohong->getuser->address}}</td>
                <td>{{$baohong->product->name}}</td>
                <td style="width:200px" id="show_list_image">
                            @if(is_array($images))
                            <div class="row">
                                @foreach($images as $image)
                                <div class="col-md-4">
                                    <img src="{{url('public/uploads')}}/{{$image}}" alt="Anh_con" width="100%">
                                </div>
                                @endforeach
                            </div>
                            @endif
                </td>
                <td>
                    {{$baohong->tinhtrang}}
                </td>
                <td>
                    @if($baohong->status==0)
                        <span class="badge badge-danger">Báo hỏng</span>
                    @else
                    <span class="badge badge-success">Đã Kiểm Tra</span>
                    @endif
                </td>
                <td class="text-center">
                            <a href="{{route('qlbaohong.edit',$baohong->id)}}" >
                                <i class="fa fa-paper-plane"></i>
                            </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
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
