@extends('layout.admin')
@section('title', 'Đơn Hàng')
@section('main')

<div class="search mb-2">
    <form action="" class="form-inline">
        <div class="form-group">
            <input type="text" name="keyword" id="" class="form-control" placeholder="Search Category...">
        </div>
        <button type="submit" class="btn btn-primary mr-2">
            <i class="fas fa-search"></i>
        </button>
    </form>
</div>
<div class="card">
    <div class="card-title">ĐƠN HÀNG ĐANG CHỜ XỬ LÝ</div>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>MÃ KH</th>
                <th>Tên KH</th>
                <th>Hình Thức TT</th>
                <th>Ngày Giao Dịch</th>
                <th>Địa chỉ</th>
                <th>Trạng Thái</th>
                <th class="text-center">Tác vụ</th>
                <th class="text-center">XÓA</th>
            </tr>
        </thead>
        <tbody>
            <?php $key = 1 ?>
            @foreach($order as $item)
            <tr>
                <td>{{$key}}</td>
                <td>{{$item->userID}}</td>
                <td>{{ $item->User->name }}</td>
                <td>
                    @if($item->status == 0)
                    <span class="badge badge-success">Thanh toán khi nhận hàng</span>
                    @else
                    <span class="badge badge-primary"> Online</span>
                    @endif
                </td>
                <td>{{ $item->created_at->format('d-m-Y')}}</td>
                <td>{{ $item->User->address }}</td>
                <td>
                    @if($item->tinhtrang == '0')
                    <span class="badge badge-warning">Đang Xử Lý</span>
                    @elseif($item->tinhtrang == '1')
                    <span class="badge badge-primary">Đang Giao Hàng</span>
                    @elseif($item->tinhtrang == '2')
                    <span class="badge badge-danger">Đã Hủy</span>
                    @endif
                </td>
                <td class="text-center">
                    <a href="{{route('cart_detail',['id' => $item['id']])}}">
                        <button class="btn btn-sm btn-outline-success" type="submit" value="">
                            <i class="fa fa-eye"></i>
                        </button>
                    </a>
                    <a href="{{route('cart_success',['id' => $item['id']])}}">
                        <button class="btn btn-sm btn-outline-primary" type="submit" value="">
                            <i class="fa fa-check"></i>
                        </button>
                    </a>
                    <a href="{{route('cart_cancel',['id' => $item['id']])}}" onclick="return confirm('Bạn Có Chắc Muốn HỦY đơn hàng này không??')">
                        <button class="btn btn-sm btn-outline-warning" type="submit" value="">
                            <i class="fa fa-close"></i>
                        </button>
                    </a>
                </td>
                <td>
                    <form action="{{ route('cart.destroy', $item->id) }}" method="post">
                        @csrf
                        <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Bạn Có Chắc Muốn XÓA đơn hàng này không??')">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            <?php $key++ ?>
            @endforeach
        </tbody>
    </table>
    <div class="paginition">
        <!-- SỬ DỤNG HÀM APPENDS(REQUEST()->ALL) : ĐỂ LƯU TÊN CỦA KEYWORD TRÊN ĐƯỜNG LINKS  -->
        {{$order->links()}}
    </div>
</div>
<!-- <div class="card">
    <div class="card-title">ĐƠN HÀNG THÀNH CÔNG</div>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>ID KH</th>
                <th>Ảnh SP</th>
                <th>Tên SP</th>
                <th>Số Lượng</th>
                <th>Giá</th>
                <th class="text-center">Tác vụ</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-center">
                    <button class="btn btn-sm btn-outline-success" type="submit" value="">
                        <i class="fa fa-eye"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-primary" type="submit" value="">
                        <i class="fa fa-check"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-danger" type="submit" value="">
                        <i class="fa fa-close"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="card">
    <div class="card-title">ĐƠN HÀNG ĐÃ HỦY</div>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>ID KH</th>
                <th>Ảnh SP</th>
                <th>Tên SP</th>
                <th>Số Lượng</th>
                <th>Giá</th>
                <th class="text-center">Tác vụ</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-center">
                    <button class="btn btn-sm btn-outline-success" type="submit" value="">
                        <i class="fa fa-eye"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-primary" type="submit" value="">
                        <i class="fa fa-check"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-danger" type="submit" value="">
                        <i class="fa fa-close"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div> -->
@stop()