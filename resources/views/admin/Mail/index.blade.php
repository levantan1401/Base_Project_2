@extends('layout.admin')
@section('title', 'Quản Lý Liên Hệ')
@section('main')
<div class="card">
    <p class="card-title text-center" style="font-size: 32px; ">@yield('title')</p>
    <div class="search mb-2">
        <form action="" class="form-inline">
            <div class="form-group">
                <input type="text" name="keyword" id="" class="form-control" placeholder="Search Category..."
                    aria-describedby="helpId">
            </div>

            <button type="submit" class="btn btn-primary mr-2">
                <i class="fas fa-search"></i>
            </button>
            <a href="{{route('qlthu.create')}}" class="btn btn-success">Trả Lời</a>
        </form>
    </div>
</div>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Nội Dung</th>
            <th>Yêu Cầu</th>
            <th>Create at</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $key=>$data)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->email }}</td>
            <td>{{ $data->phone }}</td>
            <td>{{ $data->content }}</td>
            <td>
                @if($data->status == 0)
                <span class="badge badge-danger" width="40px">Chưa trả lời</span>
                @else
                <span class="badge badge-success">Đã Gửi</span>
                @endif
            </td>
            <td>{{ $data->created_at }}</td>
            <td class="text-center">
                        <a href="">
                            <a class="btn btn-sm btn-outline-success" type="submit" href="{{route('qlthu.edit',$data->id)}}" >
                                <i class="fa fa-paper-plane"></i>
                            </a>
                        </a>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
@stop()
