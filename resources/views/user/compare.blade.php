@extends('user.site')
@section('main')

<!------ Breadcrumbs Start ------>
<div class="impl_bread_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>compare</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">compare</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!------ Compare Wrapper Start ------>
    <div class="impl_compare_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="impl_heading">
                        <h1>Lựa chọn xe</h1>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="impl_cmpr_box">
                        <h2 class="impl_cmpr_title">{{ $product->name }}</h2>
                        <div class="compare_img">
                            <img src="{{ url('public/uploads') }}/{{$product->image}}" alt="" class="img-fluid" />
                            <span class="cmpr_rmv_icon"><i class="fa fa-times" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="impl_cmpr_box">
                        <h2 class="impl_cmpr_title">select car 2</h2>
                        <div class="compare_select_box custom_select">
                         <select>
						  <option data-display="Select Brand">Select Brand</option>
						  <option value="1">Brand 1</option>
						  <option value="2">Brand 1</option>
						  <option value="3">Brand 1</option>
						  <option value="4">Brand 1</option>
						</select>
                        </div>
                        <div class="compare_select_box custom_select">
                            <select>
						  <option data-display="Select Model">Select Model</option>
						  <option value="1">Model 1</option>
						  <option value="2">Model 2</option>
						  <option value="3">Model 3</option>
						  <option value="4">Model 4</option>
						</select>
                        </div>
                        <div class="compare_select_box custom_select">
                            <select>
						  <option data-display="Select Version">Select Version</option>
						  <option value="1">Version 1</option>
						  <option value="2">Version 2</option>
						  <option value="3">Version 3</option>
						  <option value="4">Version 4</option>
						</select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="impl_cmpr_box">
                        <h2 class="impl_cmpr_title">select car 3</h2>
                        <div class="compare_select_box custom_select">
                          <select>
						  <option data-display="Select Brand">Select Brand</option>
						  <option value="1">Brand 1</option>
						  <option value="2">Brand 1</option>
						  <option value="3">Brand 1</option>
						  <option value="4">Brand 1</option>
						</select>
                        </div>
                        <div class="compare_select_box custom_select">
                            <select>
						  <option data-display="Select Model">Select Model</option>
						  <option value="1">Model 1</option>
						  <option value="2">Model 2</option>
						  <option value="3">Model 3</option>
						  <option value="4">Model 4</option>
						</select>
                        </div>
                        <div class="compare_select_box custom_select">
                           <select>
						  <option data-display="Select Version">Select Version</option>
						  <option value="1">Version 1</option>
						  <option value="2">Version 2</option>
						  <option value="3">Version 3</option>
						  <option value="4">Version 4</option>
						</select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="impl_cmpr_box">
                        <h2 class="impl_cmpr_title">select car 4</h2>
                        <div class="compare_select_box custom_select">
                          <select>
						  <option data-display="Select Brand">Select Brand</option>
						  <option value="1">Brand 1</option>
						  <option value="2">Brand 1</option>
						  <option value="3">Brand 1</option>
						  <option value="4">Brand 1</option>
						</select>
                        </div>
                        <div class="compare_select_box custom_select">
                           <select>
						  <option data-display="Select Model">Select Model</option>
						  <option value="1">Model 1</option>
						  <option value="2">Model 2</option>
						  <option value="3">Model 3</option>
						  <option value="4">Model 4</option>
						</select>
                        </div>
                        <div class="compare_select_box custom_select">
                             <select>
						  <option data-display="Select Version">Select Version</option>
						  <option value="1">Version 1</option>
						  <option value="2">Version 2</option>
						  <option value="3">Version 3</option>
						  <option value="4">Version 4</option>
						</select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="compare_btn">
                        <button class="impl_btn">compare</button>
                        <button class="impl_btn">reset all</button>
                    </div>
                </div>
                <div class="col-lg-12 col-md-">
                    <div class="compare_table_wrapper">
                        <div class="compare_list_option">
                            <label class="compare_check_label">
							Hide Common Features
							<input type="checkbox" name="check"> 
							<span class="label-text"></span>
						</label>
                            <label class="compare_check_label">
							Highlight Differences
							<input type="checkbox" name="check"> 
							<span class="label-text"></span>
						</label>
                        </div>
                        <div class="compare_table">
                            <table class="table table-bordered table-responsive table-hover">
								<thead>
									<tr>
										<th>Tổng quát</th>
										<th> Xe {{ $product->name }}</th>
										<th> Xe {{ $product->name }}</th>
										<th> Xe {{ $product->name }}</th>
									</tr>
								</thead>
								<tr>
									<td>Thể loại</td>
									<td>Automatic</td>
									<td>Automatic</td>
									<td></td>
								</tr>
								<tr>
									<td>Màu sắc</td>
									<td>7</td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>Mức giá</td>
									<td>Automatic Climate Control</td>
									<td>Automatic Climate Control</td>
									<td></td>
								</tr>
								<tr>
									<td>Chế độ ưu đãi</td>
									<td>Front & Rear</td>
									<td>Front & Rear</td>
									<td></td>
								</tr>
								<tr >
									<td>Bảo hành </td>
									<td>Remote</td>
									<td>Remote With Boot Opener</td>
									<td></td>
								</tr>
								<tr>
									<td>Anti-Lock Braking System </td>
									<td><i class="fa fa-check" aria-hidden="true"></i></td>
									<td><i class="fa fa-check" aria-hidden="true"></i></td>
									<td></td>
								</tr>
								<tr >
									<td>Airbags</td>
									<td>4 (Driver, Co-Driver & <br> Rear Passengers)</td>
									<td>8 Airbags</td>
									<td></td>
								</tr>
								<tr>
									<td>Seat Upholstery</td>
									<td>Leather</td>
									<td>Leather</td>
									<td></td>
								</tr>
								<tr >
									<td>Dài x Rộng x Cao (mm)</td>
									<td>{!! $thongso->dai_rong_cao !!}</td>
									<td>4462</td>
									<td></td>
								</tr>
								<tr >
									<td>Động Cơ (mm)</td>
									<td>{!! $thongso->dai_rong_cao !!}</td>
									<td>1998</td>
									<td></td>
								</tr>
								<tr >
									<td>Chiều dài cơ sở (mm)</td>
									<td>{!! $thongso->dai_rong_cao !!}</td>
									<td>1204</td>
									<td></td>
								</tr>
								<tr>
									<td>Khoảng Sáng Gầm (Person)</td>
									<td>{!! $thongso->dai_rong_cao !!}</td>
									<td>4</td>
									<td></td>
								</tr>
								<tr >
									<td>Dung tích Nhiên liệu (cc)</td>
									<td>{!! $thongso->dai_rong_cao !!}</td>
									<td>7993</td>
									<td></td>
								</tr>
								<tr>
									<td>Mức tiêu thụ Nhiên Liệu</td>
									<td>{!! $thongso->dai_rong_cao !!}</td>
									<td>petrol</td>
									<td></td>
								</tr>
								<tr >
									<td>Công suất max (bhp@rpm)</td>
									<td>{!! $thongso->dai_rong_cao !!}</td>
									<td>987 @ 6000</td>
									<td></td>
								</tr>
								<tr >
									<td>Momem Xoắn cực đại (Nm@rpm)</td>
									<td>{!! $thongso->dai_rong_cao !!}</td>
									<td>1250 @ 2200</td>
									<td></td>
								</tr>
								<tr >
									<td>Hộp số (ARAI) (kmpl)</td>
									<td>{!! $thongso->dai_rong_cao !!}</td>
									<td>4</td>
									<td></td>
								</tr>
								<tr>
									<td>Dẫn động</td>
									<td>{!! $thongso->dai_rong_cao !!}</td>
									<td>Not Applicable</td>
									<td></td>
								</tr>
								
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop()