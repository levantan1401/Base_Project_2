@extends('layout.admin')
@section('title','Admin-Dashboard')
@section('main')
<main class="content">
	<div class="container-fluid p-0">

		<div class="row mb-2 mb-xl-3">
			<div class="col-auto d-none d-sm-block">
				<h3><strong>Trang tổng quan</strong>Phân tích</h3>
			</div>

			<div class="col-auto ms-auto text-end mt-n1">
				<a href="#" class="btn btn-light bg-white me-2">Invite a Friend</a>
				<a href="#" class="btn btn-primary">New Project</a>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12 d-flex">
				<div class="w-100">
					<div class="row">
						<div class="col-sm-3">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Sản Phẩm</h5>
										</div>

										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="truck"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3">{{ $countProduct }}</h1>
									<div class="mb-0">
										<span class="badge badge-primary-light"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
										<span class="text-muted">Since last week</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Người dùng</h5>
										</div>

										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="users"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3">{{ $countUser }}</h1>
									<div class="mb-0">
										<span class="badge badge-success-light"> <i class="mdi mdi-arrow-bottom-right"></i> 5.25% </span>
										<span class="text-muted">Since last week</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Doanh Thu</h5>
										</div>

										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="dollar-sign"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3">
										<?php
										$tongtien = 0;
										$tiensp = 0;
										?>
										@foreach($countPrice as $item )
										<?php $tiensp = $item->price * $item->quantity; ?>
										<?php $tongtien += $tiensp; ?>
										@endforeach
										{{number_format($tongtien) }}
									</h1>
									<div class="mb-0">
										<span class="badge badge-success-light"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
										<span class="text-muted">Since last week</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Đơn Hàng</h5>
										</div>

										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="shopping-cart"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3">{{ $countorder }}</h1>
									<div class="mb-0">
										<span class="badge badge-danger-light"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
										<span class="text-muted">Since last week</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- BIỂU ĐÒ -->
			<!-- <div class="col-xl-6 col-xxl-7">
				<div class="card flex-fill w-100">
					<div class="card-header">
						<div class="float-end">
							<form class="row g-2">
								<div class="col-auto">
									<select class="form-select form-select-sm bg-light border-0">
										<option>Jan</option>
										<option value="1">Feb</option>
										<option value="2">Mar</option>
										<option value="3">Apr</option>
									</select>
								</div>
								<div class="col-auto">
									<input type="text" class="form-control form-control-sm bg-light rounded-2 border-0" style="width: 100px;" placeholder="Search..">
								</div>
							</form>
						</div>
						<h5 class="card-title mb-0">Recent Movement</h5>
					</div>
					<div class="card-body pt-2 pb-3">
						<div class="chart chart-sm">
							<canvas id="chartjs-dashboard-line"></canvas>
						</div>
					</div>
				</div>
			</div> -->
		</div>
		<!-- BIỂU ĐỒ THỐNG KÊ -->
		<div class="row">
			<p class="title_thnogke" style="text-align: center; font-size: 20px; font-weight:bold">Thống kê đơn hàng theo doanh số</p>
			<form action="" autocomplete="off">
				@csrf
				<div class="row">
					<div class="col-md-2">
						<p>Từ Ngày: <input type="text" id="datepicker" class="form-control"></p>
						<input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả">
					</div>
					<div class="col-md-2">
						<p>Đến ngày Ngày: <input type="text" id="datepicker2" class="form-control"></p>
					</div>

					<div class="col-md-2">
						<p>Lọc Theo: </p>
						<div class="form-group">
							<select id="my-select" class="dashboard-filter form-control" name="">
								<option>--Chọn--</option>
								<option value="7ngay">7 Ngày Qua</option>
								<option value="thangtruoc">Tháng trước</option>
								<option value="thangnay">Tháng này</option>
								<option value="365ngayqua">365 Ngày qua</option>
							</select>
						</div>
					</div>
				</div>

			</form>
			<div class="col-12 col-md-12">
				<div id="myfirstchart" style="height: 250px;"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-md-12 col-xxl-9 d-flex order-3 order-xxl-2">
				<div class="card flex-fill">
					<div class="card-title text-center">ĐƠN HÀNG ĐANG CHỜ XỬ LÝ</div>
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
			</div>
			<div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-1">
				<div class="card flex-fill">
					<div class="card-header">
						<div class="card-actions float-end">
							<div class="dropdown show">
								<a href="#" data-bs-toggle="dropdown" data-bs-display="static">
									<i class="align-middle" data-feather="more-horizontal"></i>
								</a>

								<div class="dropdown-menu dropdown-menu-end">
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<a class="dropdown-item" href="#">Something else here</a>
								</div>
							</div>
						</div>
						<h5 class="card-title mb-0">Calendar</h5>
					</div>
					<div class="card-body d-flex">
						<div class="align-self-center w-100">
							<div class="chart">
								<div id="datetimepicker-dashboard"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</main>

@stop()