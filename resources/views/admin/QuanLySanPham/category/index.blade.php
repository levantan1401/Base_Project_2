@extends('layout.admin')
@section('title', 'Quản Lý Thể Loại')
@section('main')
<div class="card">
    <p class="card-title text-center" style="font-size: 32px; ">@yield('title')</p>
    <div class="search mb-2">
        <form action="" class="form-inline">
            <div class="form-group">
                <input type="text" name="keyword" id="" class="form-control" placeholder="Search Category..." aria-describedby="helpId">
            </div>

            <button type="submit" class="btn btn-primary mr-2">
                <i class="fas fa-search"></i>
            </button>
            <!-- Button trigger modal -->
            <a href="{{route('category.create')}}" class="btn btn-success">Add New</a>
        </form>
    </div>
</div>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Status</th>
            <th>Create at</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <!-- /TEST -->
    <tbody>
        @foreach($data as $key=>$cat)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $cat->name }}</td>
            <!-- PRODUCT LÀ 1 HÀM ĐC ĐỊNH NGHĨA TRONG FILE MODEL/CATEGORY.PHP -->
            <td>{{ $cat->slug }}</td>
            <td>
                @if($cat->status == 0)
                <span class="badge badge-danger">Private</span>
                @else
                <span class="badge badge-success">Public</span>
                @endif
            </td>
            <td>{{ $cat->created_at->format('m-d-Y') }}</td>
            <td class="text-center">
                <form action="{{ route('category.destroy', $cat->id ) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <a href="{{ route('category.edit',$cat->id )}}">
                        <input type="button" value="Edit" class="btn btn-primary">
                    </a>
                    <button class="btn btn-danger" onclick="return confirm('Bạn Có Chắc Muốn xóa tệp này không??')">
                        Delete
                    </button>
                </form>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
<div class="paginition">
    <!-- SỬ DỤNG HÀM APPENDS(REQUEST()->ALL) : ĐỂ LƯU TÊN CỦA KEYWORD TRÊN ĐƯỜNG LINKS  -->
    {{$data->appends(request()->all())->links()}}
</div>
@stop()