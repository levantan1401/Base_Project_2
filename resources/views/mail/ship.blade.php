<h2>Xin Chào {{ $c_name }}</h2>

<p>
    <b>ĐƠN HÀNG CỦA BẠN ĐANG ĐƯỢC SHIPPER ĐẸP TRAI GIAO HÀNH</b>
    <s>BẠN NHỚ KIỂM TRA ĐIỆN THOẠI THƯỜNG XUYÊN NHÉ</s>
</p>
<h3>Thông tin đơn hàng của bạn</h3>
<h4>MÃ Đơn Hàng: {{ $order->id }}</h4>
<h4>Ngày Đặt: {{ $order->created_at->format('d-m-Y') }}</h4>
<h4>CHI TIẾT SẢN PHẨM</h4>
<table border="1" cellspacing="0" cellpadding="10" width="400">
    <thead>
        <tr>
            <td>STT</td>
            <td>Tên Sản Phẩm</td>
            <td>Giá</td>
            <td>Số Lượng</td>
            <td>Thành Tiền</td>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $key=>$item)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $item['name'] }}</td>
            <td>{{ number_format($item['price']) }}</td>
            <td>{{ $item['quantity'] }}</td>
            <td>{{ $item['price']*$item['quantity'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<h3>Cảm ơn Bạn Đã Đặt Hàng. <br> Hy Vọng bạn kiểm tra kĩ</h3>
<p>Thân gửi</p>
