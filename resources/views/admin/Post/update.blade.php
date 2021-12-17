@extends('layout.admin')
@section('title', 'Thêm Bài Viết')
@section('main')
<div class="card">
    <div class="card-title text-center">
        <h3>
            @yield('title')
        </h3>
    </div>
    <div class="card-body">
        <form action="{{ route('post.update', $model->id) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="">Tiêu Đề: </label>
                        <input type="text" name="title" id="name" class="form-control" onkeyup="ChangeToSlug()" placeholder="Nhập Tiêu Đề Của Bài Viết" value="{{ $model->title }}">
                        <div class="error" style="color: red;">
                            @if($errors->has('name'))
                            {{$errors->first('name')}}
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Đường dẫn (SEO): </label>
                        <input type="text" name="slug" id="slug" class="form-control" placeholder="URL SEO POST" value="{{ $model->slug }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Giới thiệu Ngắn gọn: </label>
                        <textarea id="brief" name="briefInfo" class="form-control" rows="3">{{ $model->briefInfo }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Nội Dung: </label>
                        <textarea id="content" name="content" class="form-control">{{ $model->content }}</textarea>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Tags: </label>
                        <select name="tags" class="form-control">
                            <option value="hihi">Chọn một</option>
                        </select>
                        <div class="error" style="color: red;">
                            @if($errors->has('category_id'))
                            {{$errors->first('category_id')}}
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Thứ Tự Hiện Thị:</label>
                        <input type="number" name="thutuhienthi" class="form-control"  value="{{ $model->thutuhienthi }}">
                        <div class="error" style="color: red;">
                            @if($errors->has('price'))
                            {{$errors->first('price')}}
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Vị Trí Hiện Thị: </label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="vitrihienthi" value="Thanh Menu" {{ $model->vitrihienthi == 'Thanh Menu' ? 'checked' : ''}} >
                                Thanh Menu
                            </label>
                        </div>
                        <div class="form-check">

                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="vitrihienthi" value="Dưới Footer" {{ $model->vitrihienthi == 'Dưới Footer' ? 'checked' : ''}} >
                                Dưới Footer
                            </label>
                        </div>
                        <div class="form-check">

                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="vitrihienthi" value="Trong Trang Tin Tức" {{ $model->vitrihienthi == 'Trong Trang Tin Tức' ? 'checked' : ''}} >
                                Trong Trang Tin Tức
                            </label>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Trạng thái</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="status" id="" value="0" {{ $model->status == 0 ? 'checked' : ''}} />
                                Ẩn
                            </label>
                            <label>
                                <input type="radio" name="status" id="" value="1" {{ $model->status == 1 ? 'checked' : ''}} />
                                Hiển thị
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh sản phẩm</label>
                        <div class="input-group">
                            <input type="text" name="image" id="image" class="form-control" value="{{$model->image}}">
                            <span class="input-group-btn">
                                <a href="#modal-file" class="btn btn-primary" data-toggle="modal">Select</a>
                            </span>
                        </div>
                        <img src="{{url('public/uploads')}}/{{$model->image}}" alt="{{ $model->name }}" id="show_img" style="width: 100%;">
                    </div>
                    <button type="submit" class="btn btn-primary w-50"> Update</button>
                </div>
            </div>
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