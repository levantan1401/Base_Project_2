@extends('layout.admin')
@section('title', 'Banner')
@section('main')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Danh Sách Banner</h5>
        <div class="search mb-2">
            <form action="" class="form-inline">
                <div class="form-group">
                    <input type="text" name="keyword" id="" class="form-control" placeholder="Search Category...">
                </div>
                <button type="submit" class="btn btn-primary mr-2">
                    <i class="fas fa-search"></i>
                </button>
                <a href="{{route('banner.create')}}" class="btn btn-success">Add New</a>
            </form>
        </div>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <td>Hình Ảnh</td>
                    <td>Tiêu Đề</td>
                    <td>Nội Dung<small>(link)</small></td>
                    <td>Trạng Thái</td>
                    <td class="text-center">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($banners as $item)
                <tr>
                    <td style="width: 330px">
                        <div class="media">
                            <img src="{{url('public/uploads')}}/{{$item->images}}" alt="{{ $item->title }}" style="width: 250px; margin-right: 10px">
                        </div>
                    </td>
                    <td>{{ $item->title }}</td>
                    <td>{!! $item->noi_dung !!}</td>
                    <td>
                        @if($item->trangthai == 0)
                        <span class="badge badge-danger">Private</span>
                        @else
                        <span class="badge badge-success">Public</span>
                        @endif
                    </td>
                    <td style="width:250px; text-align: center;">
                    <form action="{{ route('banner.destroy', $item->id ) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <a class="btn btn-primary" href="{{ route('banner.edit',$item->id )}}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button class="btn btn-danger" onclick="return confirm('Bạn Có Chắc Muốn xóa tệp này không??')">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@stop()