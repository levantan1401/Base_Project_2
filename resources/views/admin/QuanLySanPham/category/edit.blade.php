@extends('layout.admin')
@section('title', 'Chỉnh sửa danh mục')
@section('main')
<div class="card">
    <div class="card-body">
    <p class="card-title text-center" style="font-size: 32px; " >@yield('title')</p>
        <form action="{{route('category.update' ,$data->id )}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="">Category Name</label>
                <input type="text" name="name" id="" class="form-control" placeholder="Enter Category Name" aria-describedby="helpId" value="{{$data->name}}">
            </div>
            <div class="form-group">
                <label for="">Category Slug</label>
                <input type="text" name="slug" id="" class="form-control" placeholder="Enter Category Name" aria-describedby="helpId" value="{{$data->slug}}" readonly>
            </div>
            <div class="form-group">
                <label for="">Category Status</label>
                <div class="form-check">
                    <label>
                        <input type="radio" name="status" id="" value="0" checked />
                        public
                    </label>
                    <label>
                        <input type="radio" name="status" id="" value="1" checked />
                        private
                    </label>
                </div>
            </div>
            <input type="submit" value="Submit" class="btn btn-primary  ">
        </form>
    </div>
</div>

@stop()