@extends('layout.admin')
@section('title', 'Thiết Lập')
<!-- Phần này để chỉnh sửa tên menu sản phẩm hiển thị trên thanh menu. -->
@section('main')
<div class="card">
    <p class="card-title text-center" style="font-size: 32px; ">@yield('title')</p>
</div>
<div class="card">
    <div class="card-body">
        <div class="container">
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
            </div>
            <form action="" method="post">
                @csrf
                <div class="form-group">
                    <label for=""><b>Tên Thiết Lập (SEO Title)</b></label>
                    <input type="text" name="name" id="name" class="form-control" onkeyup="ChangeToSlug()" placeholder="Enter Product Name" aria-describedby="helpId">
                    <div class="error" style="color: red;">
                        @if($errors->has('name'))
                        {{$errors->first('name')}}
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for=""><b>Đường Dẫn (SEO URL)</b></label>
                    <input type="" name="slug" id="slug" class="form-control" placeholder="Enter Product Slug" aria-describedby="helpId" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Product Status</label>
                    <select name="status" class="custom-select">
                        <option value="0">Private</option>
                        <option value="1">Publish</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for=""><b>Từ khóa tìm kiếm (SEO Keyword)</b></label>
                    <input type="text" name="name" id="name" class="form-control" onkeyup="ChangeToSlug()" placeholder="Enter Product Name" aria-describedby="helpId">
                    <div class="error" style="color: red;">
                        @if($errors->has('name'))
                        {{$errors->first('name')}}
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for=""><b>Mô tả tóm tắt (SEO Description)</b></label>
                    <input type="text" name="name" id="name" class="form-control" onkeyup="ChangeToSlug()" placeholder="Enter Product Name" aria-describedby="helpId">
                    <div class="error" style="color: red;">
                        @if($errors->has('name'))
                        {{$errors->first('name')}}
                        @endif
                    </div>
                </div>
                
                <div class="submit text-right">
                    <input type="submit" name="them" value="Lưu Dữ liệu" class="btn btn-primary ">
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ url('public/admin/js/slug.js') }}"></script>
@stop()