@extends('layout.admin')
@section('title', 'Bài Viết')
@section('main')

<div class="search mb-2">
    <form action="" class="form-inline">
        <div class="form-group">
            <input type="text" name="keyword" id="" class="form-control" placeholder="Search Category...">
        </div>
        <button type="submit" class="btn btn-primary mr-2">
            <i class="fas fa-search"></i>
        </button>
        <a href="{{route('post.create')}}" class="btn btn-success">Add New</a>
    </form>
</div>
<div class="card">
    <div class="card-title">TỔNG HỢP CÁC BÀI VIẾT</div>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Hình Ảnh</th>
                <th>Tiêu Đề</th>
                <!-- <th>Thể loại</th> -->
                <th>Views</th>
                <th>Ngày Đăng</th>
                <th>Trạng Thái</th>
                <th class="text-center">Tác vụ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($post as $item)
            <tr>
                <td>
                    <img src="{{ url('public/uploads') }}/{{ $item->image }}" alt="{{ $item->title }}" style="width: 100px; margin-right: 10px">
                </td>
                <td>{{ $item->title }}</td>
                <!-- <td>{{ $item->tags }}</td> -->
                <td>
                    @if($item->view_count ==0)
                    <span class="badge badge-warning">Chưa Ai Xem</span>
                    @else
                    <b>{{$item->view_count}}</b>
                    @endif
                </td>
                <td>{{ $item->created_at }}</td>
                <td>@if($item->status == 0)
                    <span class="badge badge-danger">Private</span>
                    @else
                    <span class="badge badge-success">Public</span>
                    @endif
                </td>
                <td class="text-center">
                    <form action="{{ route('post.destroy', $item->id ) }}" method="post">
                        @csrf 
                        <input type="hidden" name="_method" value="DELETE">
                        <a class="btn btn-outline-primary btn-sm" href="{{ route('post.edit',$item->id )}}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Bạn Có Chắc Muốn xóa tệp này không??')">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="paginition">
        <!-- SỬ DỤNG HÀM APPENDS(REQUEST()->ALL) : ĐỂ LƯU TÊN CỦA KEYWORD TRÊN ĐƯỜNG LINKS  -->
    </div>
</div>

@stop()