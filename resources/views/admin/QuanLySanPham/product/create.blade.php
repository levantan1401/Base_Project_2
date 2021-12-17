@extends('layout.admin')
@section('title', 'Thêm Sản Phẩm')
@section('main')
<div class="card">
    <div class="card-title text-center">
        <h3>
            @yield('title')
        </h3>
    </div>
    <div class="card-body">
        <form action="{{ route('product.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="">Tên Sản phẩm</label>
                                <input type="text" name="name" id="name" class="form-control" onkeyup="ChangeToSlug()" placeholder="Enter Category Name" aria-describedby="helpId">
                                <div class="error" style="color: red;">
                                    @if($errors->has('name'))
                                    {{$errors->first('name')}}
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="">Số Lượng:</label>
                                <input type="number" name="quantity" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Đường dẫn (SEO)</label>
                        <input type="text" name="slug" id="slug" class="form-control" placeholder="Enter Category Slug" aria-describedby="helpId" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Màu:</label>
                        <input type="radio" class="btn-check" name="color" id="red" value="red" checked>
                        <label class="btn btn-outline-danger" for="red">Đỏ</label>

                        <input type="radio" class="btn-check" name="color" id="black" value="black">
                        <label class="btn btn-outline-dark" for="black">Đen</label>

                        <input type="radio" class="btn-check" name="color" id="xanhcay" value="xanhcay">
                        <label class="btn btn-outline-success" for="xanhcay">Lục</label>

                        <input type="radio" class="btn-check" name="color" id="blue" value="blue">
                        <label class="btn btn-outline-primary" for="blue">Lam</label>

                        <input type="radio" class="btn-check" name="color" id="while" value="while">
                        <label class="btn btn-light" for="while">Trắng</label>
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả</label>
                        <textarea id="content" name="content" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Danh sách hình ảnh </label>
                        <input type="hidden" name="list_image" id="list_image">
                        <span class="input_group">
                            <a href="#modal-files" class="btn btn-primary" data-toggle="modal">Select</a>
                        </span>
                        <div class="row" id="show_list_image">

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Danh mục sản phẩm</label>
                        <select name="category_id" class="form-control">
                            <option value="">Chọn một</option>
                            @foreach($cats as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        <div class="error" style="color: red;">
                            @if($errors->has('category_id'))
                            {{$errors->first('category_id')}}
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Giá sản phẩm</label>
                        <input type="text" name="price" class="form-control" placeholder="Nhập giá">
                        <div class="error" style="color: red;">
                            @if($errors->has('price'))
                            {{$errors->first('price')}}
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Giá khuyến mãi</label>
                        <input type="text" name="sale_price" class="form-control" placeholder="Nhập khuyến mãi">
                        <div class="error" style="color: red;">
                            @if($errors->has('sale_price'))
                            {{$errors->first('sale_price')}}
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Trạng thái</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="status" id="" value="0" checked />
                                Ẩn
                            </label>
                            <label>
                                <input type="radio" name="status" id="" value="1" checked />
                                Hiện thị
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh sản phẩm</label>
                        <div class="input-group">
                            <input type="text" name="image" id="image" class="form-control">
                            <span class="input-group-btn">
                                <a href="#modal-file" class="btn btn-primary" data-toggle="modal">Select</a>
                            </span>
                        </div>
                        <img src="" alt="" id="show_img" style="width: 100%;">
                    </div>
                    <button type="submit" class="btn btn-primary w-50"> Submit</button>
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