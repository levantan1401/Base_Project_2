@extends('layout.admin')
@section('title', 'Đơn Hàng')
@section('main')

<table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Sản Phẩm</th>
                <th>Tên KH</th>
                <th>Hình Thức TT</th>
                <th>Ngày Giao Dịch</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Trạng Thái </th>
            </tr>
        </thead>
        <tbody>
            <?php $key = 1 ?>
            @foreach($order_detail as $item)
            <tr>
                <td>{{$key}}</td>
                <td style="width: 330px">
                    <div class="media">
                        <a href="#" class="pull-left">
                            <img src="{{url('public/uploads')}}/{{$item->od_product->image}}" alt="" style="width: 100px; margin-right: 10px">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{ $item->od_product->name }} <span class="badge badge-info" style="font-size: 10px;">{{ $item->od_product->color }}</span></h4>
                            <p>{{$item->od_product->created_at->format('d-m-Y')}}</p>
                        </div>
                    </div>
                </td>
                <td>{{$item->order->User->name}}</td>

                <td>
                    @if($item->order->status == 0)
                    <span class="badge badge-success">Thanh toán khi nhận hàng</span>
                    @else
                    <span class="badge badge-primary"> Online</span>
                    @endif
                </td>
                <td>{{$item->order->created_at->format('d-m-Y / h:i:s A')}}</td>
                <td>{{number_format($item->price)}}</td>
                <td>{{$item->quantity}}</td>
                <td>
                    @if($item->order->tinhtrang == '0')
                    <span class="badge badge-warning">Đang Xử Lý</span>
                    @elseif($item->order->tinhtrang == '1')
                    <span class="badge badge-primary">Đang Giao Hàng</span>
                    @elseif($item->order->tinhtrang == '2')
                    <span class="badge badge-danger">Đã Hủy</span>
                    @endif
                </td>

                
            </tr>
            <?php $key++ ?>
            @endforeach
        </tbody>
    </table>

@stop()