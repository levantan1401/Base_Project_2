@extends('layout.admin')
@section('title', 'Quản Lý Sản Phẩm')
@section('main')
<div class="card">
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
                <a href="{{route('product.create')}}" class="btn btn-success">Add New</a>
            </form>
        </div>
    </div>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Thể loại</th>
                <th>Trạng thái</th>
                <th>Giá sản phẩm</th>
                <th>Giá KM</th>
                <th>Số Lượng</th>
                <th class="text-center">Tác vụ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key=>$item)
            <tr>
                <td scope="row" style="width: 50px;">{{$key+1}}</td>
                <td style="width: 330px">
                    <div class="media">
                        <a href="#" class="pull-left">
                            <img src="{{url('public/uploads')}}/{{$item->image}}" alt="" style="width: 100px; margin-right: 10px">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{ $item->name }} <span class="badge badge-info" style="font-size: 10px;">{{ $item->color }}</span></h4>
                            <p>{{$item->created_at->format('d-m-Y')}}</p>
                        </div>
                    </div>

                </td>
                <td>{{$item->cat->name}}</td>
                <td>
                    @if($item->status == 0)
                    <span class="badge badge-danger">Private</span>
                    @else
                    <span class="badge badge-success">Public</span>
                    @endif
                </td>
                <td>{{$item->price}}</td>
                <td>{{$item->sale_price}}</td>
                <td class="text-center ">
                    @if($item->quantity == 0)
                        <span class="badge badge-danger" style="font-size: 10px;">Hết Hàng</span>
                    @elseif($item->quantity <= 10) 
                        <b class="media-heading">{{ $item->quantity }} <span class="badge badge-danger" style="font-size: 12px;background: #ff0000;color: #fff;padding: 0 4px;vertical-align: top;position: absolute;">Sắp Hết</span></b>
                    @else
                        <b> {{$item->quantity}} </b>
                    @endif

                </td>
                <td style="width:250px; text-align: center;">
                    <form action="{{ route('product.destroy', $item->id ) }}" method="post">
                        @csrf
                        <a class="btn btn-success" href="{{ route('thongso',$item->id) }}">
                            <i class="fa fa-car" aria-hidden="true"></i>
                        </a>
                        <input type="hidden" name="_method" value="DELETE">
                        <a class="btn btn-primary" href="{{ route('product.edit',$item->id )}}">
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
<div class="paginition">
    <!-- SỬ DỤNG HÀM APPENDS(REQUEST()->ALL) : ĐỂ LƯU TÊN CỦA KEYWORD TRÊN ĐƯỜNG LINKS  -->
    {{$data->appends(request()->all())->links()}}
</div>
@stop()