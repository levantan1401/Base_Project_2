@extends('layout.admin')
@section('title', 'Quản Lý Lịch Trình')

@section('main')

<div class="card">
    <div class="card-body">
        <div class="card">
            <p class="card-title text-center" style="font-size: 32px; ">@yield('title')</p>
            <div class="search mb-2">
                <form action="" class="form-inline">
                    <div class="form-group">
                        <input type="text" name="keyword" id="" class="form-control" placeholder="Search Category...">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">
                        <i class="fas fa-search"></i>
                    </button>
                    <!-- Button trigger modal -->
                    <a href="{{route('calendar.create')}}" class="btn btn-success">Add New</a>
                </form>
            </div>
        </div>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Chủ Đề</th>
                    <th>Mô tả</th>
                    <th>Thời gian</th>
                    <th>Nhân Viên</th>
                    <th>Tình Trạng</th>
                    <th class="text-center">Tác vụ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listTask as $key=>$task)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$task->title}}</td>
                    <td>{{$task->note}}</td>
                    <td>{{$task->date}}</td>
                    <td>{{$task->id_staff}}</td>
                    <td>
                        @if($task->status == 0)
                        <span class="badge badge-danger">Chưa Xử Lý</span>
                        @else
                        <span class="badge badge-success">Đã Xử Lý</span>
                        @endif
                    </td>
                    <td style="width:250px; text-align: center;">
                        <form action="" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <a class="btn btn-outline-primary " href="">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button class="btn btn-outline-danger " onclick="return confirm('Bạn Có Chắc Muốn xóa tệp này không??')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="paginition">
        <!-- SỬ DỤNG HÀM APPENDS(REQUEST()->ALL) : ĐỂ LƯU TÊN CỦA KEYWORD TRÊN ĐƯỜNG LINKS  -->
    </div>
</div>

@stop()