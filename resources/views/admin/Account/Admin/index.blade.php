@extends('layout.admin')
@section('title', 'Quản Lý Admin')
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
            <a href="{{route('account.create')}}" class="btn btn-success">Thêm Nhân Viên</a>
        </form>
    </div>
</div>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>STT</th>
            <th>Avatar</th>
            <th>Name</th>
            <th>Email</th>
            <th>Số Điện Thoại</th>
            <th>Create at</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <!-- /TEST -->
    <tbody>
        @foreach($data as $key=>$account)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>
                <div style="width: 200px;">
                        <a href="#" class="pull-left">
                            <img src="{{url('public/uploads/Avatar')}}/{{$account->avatar}}" alt="" style="width: 100px; margin-right: 10px;height:100px">
                        </a>
                </div>
            </td>
            <td style="width: 330px">
                    <div class="media">
                        <div class="media-body">
                            <h4 class="media-heading">{{ $account->name }} <span class="badge badge-info" style="font-size: 10px;">{{ $account->chucvu}}</span></h4>
                        </div>
                    </div>
                </td>
            <td>{{ $account->email }}</td>
            <td>{{ $account->phone }}</td>
            <td>{{ $account->created_at->format('m-d-Y') }}</td>
            <td class="text-center">
            <form action="{{ route('account.destroy', $account->id ) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <a href="{{ route('account.edit',$account->id )}}">
                        <input type="button" value="Edit" class="btn btn-primary">
                    </a>
                    <button class="btn btn-danger" onclick="return confirm('Bạn Có Chắc Muốn xóa Account này không??')">
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
