<!doctype html>
<html class="no-js" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>@yield('page-title')</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	{{-- <link rel="icon" href="{{$pre_url}}{{$pre_folder}}favicon.png" type="image/png" /> --}}

	<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

	<link rel="stylesheet" href="{{$pre_url}}{{$pre_folder}}master/plugins/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{$pre_url}}{{$pre_folder}}master/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="{{$pre_url}}{{$pre_folder}}master/plugins/icon-kit/dist/css/iconkit.min.css">
	<link rel="stylesheet" href="{{$pre_url}}{{$pre_folder}}master/plugins/ionicons/dist/css/ionicons.min.css">
	<link rel="stylesheet" href="{{$pre_url}}{{$pre_folder}}master/plugins/perfect-scrollbar/css/perfect-scrollbar.css">

	<link rel="stylesheet" href="{{$pre_url}}{{$pre_folder}}master/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
	{{-- @*
	<link rel="stylesheet" href="{{$pre_url}}{{$pre_folder}}master/plugins/jvectormap/jquery-jvectormap.css">*@
	@*
	<link rel="stylesheet"
		href="{{$pre_url}}{{$pre_folder}}master/plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css">*@
	@*
	<link rel="stylesheet" href="{{$pre_url}}{{$pre_folder}}master/plugins/weather-icons/css/weather-icons.min.css">*@
	@*
	<link rel="stylesheet" href="{{$pre_url}}{{$pre_folder}}master/plugins/c3/c3.min.css">*@
	@*
	<link rel="stylesheet" href="{{$pre_url}}{{$pre_folder}}master/plugins/owl.carousel/dist/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="{{$pre_url}}{{$pre_folder}}master/plugins/owl.carousel/dist/assets/owl.theme.default.min.css">*@ --}}
	<link rel="stylesheet" href="{{$pre_url}}{{$pre_folder}}master/plugins/fullcalendar/dist/fullcalendar.min.css">
	<link rel="stylesheet" href="{{$pre_url}}{{$pre_folder}}master/plugins/jquery-toast-plugin/dist/jquery.toast.min.css">
	<link rel="stylesheet" href="{{$pre_url}}{{$pre_folder}}master/plugins/select2/dist/css/select2.min.css">
	<link rel="stylesheet" href="{{$pre_url}}{{$pre_folder}}master/plugins/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" href="{{$pre_url}}{{$pre_folder}}master/dist/css/theme.min.css">

	<link rel="stylesheet" href="{{$pre_url}}{{$pre_folder}}css/app.css">
	{{-- @*<script src="{{$pre_url}}{{$pre_folder}}master/src/js/vendor/modernizr-2.8.3.min.js"></script>*@ --}}
</head>

<body>
	<!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

	<div class="wrapper">
		<header class="header-top" header-theme="light">
			<div class="container-fluid">
				<div class="d-flex justify-content-between">
					<div class="top-menu d-flex align-items-center">
						<button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
						{{-- <div class="header-search">
							<form method="get" action="/">
								<div class="input-group">
									<span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
									<input type="text" class="form-control" name="key">
									<span class="input-group-addon search-btn"><i class="ik ik-search"></i></span>
								</div>
							</form>
						</div>
						<a class="nav-link mr-2 text-white bg-primary" id="btnNew">
							<span title="Đặt lịch" data-toggle="tooltip"><i class="ik ik-plus"></i></span>
						</a> --}}
						<button type="button" id="navbar-fullscreen" class="nav-link"><i
								class="ik ik-maximize"></i></button>
					</div>
					<div class="top-menu d-flex align-items-center">
						
						@include('include._login')

					</div>
				</div>
			</div>
		</header>

		<div class="page-wrap">
			<div class="app-sidebar colored">
				<div class="sidebar-header">
					<a class="header-brand" href="/">
						<div class="logo-img">
							{{-- <img src="{{$pre_url}}{{$pre_folder}}logo1.png" class="header-brand-img" alt="lavalite"> --}}
						</div>
					<span class="text">{{env('APP_NAME')}}</span>
					</a>
					<button type="button" class="nav-toggle"><i data-toggle="expanded"
							class="ik ik-toggle-right toggle-icon"></i></button>
					<button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
				</div>

				<div class="sidebar-content">
					<div class="nav-container">
						<nav id="main-menu-navigation" class="navigation-main">
							<div class="nav-lavel">Bảng điều khiển</div>
							<div class="nav-item @yield('tong-quan')">
								<a href="/"><i class="ik ik-bar-chart-2"></i><span> Tổng quan</span></a>
							</div>
							<div class="nav-item @yield('dat-lich')">
							<a href="{{$pre_url}}dat-lich"><i class="ik ik-file-text"></i><span> Đặt lịch</span></a>
							</div>
							<div class="nav-item @yield('phong-hop')">
								<a href="{{$pre_url}}phong-hop"><i class="ik ik-layers"></i><span> Phòng họp</span></a>
							</div>
							<div class="nav-item @yield('co-so')">
								<a href="{{$pre_url}}co-so"><i class="ik ik-copy"></i><span> Cơ sở</span></a>
							</div>
							<div class="nav-item @yield('thiet-bi')">
								<a href="{{$pre_url}}thiet-bi"><i class="ik ik-copy"></i><span> Thiết Bị</span></a>
							</div>

							<div class="nav-lavel">Khu quản trị</div>
							<div class="nav-item @yield('nguoi-dung')">
							<a href="{{$pre_url}}nguoi-dung"><i class="ik ik-users"></i><span> Thành viên</span></a>
							</div>
							<div class="nav-item @yield('cai-dat')">
								<a href="{{$pre_url}}cai-dat"><i class="ik ik-settings"></i><span> Cài đặt</span></a>
							</div>
						</nav>
					</div>
				</div>
			</div>

			<div class="main-content">
				<div class="container-fluid">

					@section('content')
					@show

				</div>
			</div>


			<footer class="footer">
				<div class="w-100 clearfix">
					<span class="text-center text-sm-left d-md-inline-block">Copyright © 2019 v2.0. All Rights
						Reserved.</span>
					<span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Crafted with <i class="fa fa-heart text-danger"></i> by N</span>
				</div>
			</footer>

		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script>
		window.jQuery || document.write('<script src="{{$pre_url}}{{$pre_folder}}master/src/js/vendor/jquery-3.3.1.min.js"><\/script>')
	</script>
	<script src="{{$pre_url}}{{$pre_folder}}master/plugins/popper.js/dist/umd/popper.min.js"></script>
	<script src="{{$pre_url}}{{$pre_folder}}master/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="{{$pre_url}}{{$pre_folder}}master/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
	<script src="{{$pre_url}}{{$pre_folder}}master/plugins/select2/dist/js/select2.min.js"></script>
	<script src="{{$pre_url}}{{$pre_folder}}master/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="{{$pre_url}}{{$pre_folder}}master/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="{{$pre_url}}{{$pre_folder}}master/plugins/moment/moment-with-locales.min.js"></script>
	{{-- @*<script src="{{$pre_url}}{{$pre_folder}}master/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>*@
	@*<script src="{{$pre_url}}{{$pre_folder}}master/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>*@
	@*<script src="{{$pre_url}}{{$pre_folder}}master/plugins/jvectormap/jquery-jvectormap.min.js"></script>*@ --}}
	<script src="{{$pre_url}}{{$pre_folder}}master/plugins/ckeditor/ckeditor.js" charset="utf-8"></script>
	<script src="{{$pre_url}}{{$pre_folder}}master/plugins/daterangepicker/daterangepicker.js" charset="utf-8"></script>
	{{-- @*<script src="{{$pre_url}}{{$pre_folder}}master/plugins/jvectormap/tests/assets/jquery-jvectormap-world-mill-en.js"></script>*@ --}}
	{{-- @*<script src="{{$pre_url}}{{$pre_folder}}master/plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js">
	</script>*@
	@*<script src="{{$pre_url}}{{$pre_folder}}master/plugins/d3/dist/d3.min.js"></script>
	<script src="{{$pre_url}}{{$pre_folder}}master/plugins/c3/c3.min.js"></script>*@
	@*<script src="{{$pre_url}}{{$pre_folder}}master/js/tables.js"></script>*@
	@*<script src="{{$pre_url}}{{$pre_folder}}master/js/widgets.js"></script>*@
	@*<script src="{{$pre_url}}{{$pre_folder}}master/js/charts.js"></script>*@ --}}
	<script src="{{$pre_url}}{{$pre_folder}}master/plugins/screenfull/dist/screenfull.js"></script>
	<script src="{{$pre_url}}{{$pre_folder}}master/dist/js/theme.min.js"></script>
	<script src="{{$pre_url}}{{$pre_folder}}js/app.js"></script>

	@section('script1')
	@show
</body>

</html>