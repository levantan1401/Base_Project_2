@extends('user.site')
@section('main')
<!------ Breadcrumbs Start ------>
<div class="impl_bread_wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<h1>404 page</h1>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">404 page</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<!------ Error Page Wrapper Start ------>
	<div class="impl_error_wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="error_text">
						<div class="error_text_inner">
							<span class="err_1">4</span>
							<span class="err_2">0</span>
							<span class="err_3">4</span>
						</div>
						<h1>ooopps....</h1>
						<p>The Page you were looking for, couldn't be found. </p>
						<a href="index.html" class="impl_btn">home page</a>
					</div>
				</div>
			</div>
		</div>
	</div>

@stop()
