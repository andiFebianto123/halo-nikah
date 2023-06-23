<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Ekka - Admin Dashboard eCommerce HTML Template.">
	<meta name="csrf-token" content="{{ csrf_token() }}" />

	<title>Admin - {{ $crud->title }}</title>

	<!-- GOOGLE FONTS -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet"> 

	<link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />

	<!-- PLUGINS CSS STYLE -->
	<link href="{{ URL::asset('assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('assets/plugins/simplebar/simplebar.css') }}" rel="stylesheet" />

	{{-- Pace --}}
	<script src="{{ URL::asset('assets/plugins/pace/pace.min.js') }}"></script>
	<link href="{{ URL::asset('assets/plugins/pace/pace-theme-default.min.css') }}" rel="stylesheet" />

	{{-- Sweet alert --}}
	<script src="{{ URL::asset('assets/plugins/sweet-alert/dist/sweetalert2.min.js') }}"></script>
	<link rel="stylesheet" href="{{ URL::asset('assets/plugins/sweet-alert/dist/sweetalert2.min.css') }}">

	<!-- Ekka CSS -->
	<link id="ekka-css" href="{{ URL::asset('assets/css/ekka.css') }}" rel="stylesheet" />
	<link rel="stylesheet" href="{{ URL::asset('assets/css/custom-ckeditor.css') }}" />
	<!-- FAVICON -->
	<link href="{{ URL::asset('assets/img/favicon.png') }}" rel="shortcut icon" />

	@stack('styles')
	<style>
		.pace .pace-progress {
			background: var(--bs-blue) !important;
		}
		#crud-control div.dataTables_length, #crud-control div.dataTables_filter {
			-webkit-box-flex: 0;
			-ms-flex: 0 0 auto;
			flex: 0 0 auto;
			width: 50%;
		}
		#crud-control div.dataTables_filter {
			text-align: right;
		}
		#crud-control div.dataTables_length label, #crud-control div.dataTables_filter label {
			font-weight: normal;
			text-align: left;
			white-space: nowrap;
		}
		#crud-control div.dataTables_length select {
			margin: 0 5px;
			border-color: #f3f3f3;
			border-radius: 10px;
		}

		#crud-control div.dataTables_length select {
			width: auto;
			display: inline-block;
		}

		#crud-control div.dataTables_filter input {
			border-color: #f3f3f3;
			border-radius: 10px;
		}

		#crud-control div.dataTables_filter input {
			margin-left: 0.5em;
			display: inline-block;
			width: auto;
		}

		@media screen and (max-width: 767px){
			#crud-control div.dataTables_length, 
			#crud-control div.dataTables_filter, 
			#crud-control div.dataTables_info, 
			#crud-control div.dataTables_paginate {
				text-align: center;
			}
		}


	@media (max-width: 575.98px){
		.dataTables_length {
			width: 100% !important;
			margin-bottom: 15px;
		}
	}


		#crud-pagination-control {
			padding-left: 8px;
			padding-right: 8px;
		}

		#crud-pagination-control div.dataTables_info, #crud-pagination-control div.dataTables_paginate {
			width: auto !important;
			padding: 0 !important;
		}
	</style>

</head>

<body class="compact-spacing ec-sidebar-fixed ec-header-static ec-header-light ec-sidebar-dark" id="body">

	<!--  WRAPPER  -->
	<div class="wrapper">
		
		<!-- LEFT MAIN SIDEBAR -->
        @include('backend.inc.sidebar')

		<!--  PAGE WRAPPER -->
		<div class="ec-page-wrapper">

			<!-- Header -->
			@include('backend.inc.header')

			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				@yield('content')
			</div> <!-- End Content Wrapper -->

			<!-- Footer -->
			<footer class="footer mt-auto">
				<div class="copyright bg-white">
					<p>
						Copyright &copy; <span id="ec-year"></span><a class="text-primary"
						href="https://themeforest.net/user/ashishmaraviya" target="_blank"> Ekka Admin Dashboard</a>. All Rights Reserved.
					  </p>
				</div>
			</footer>

		</div> <!-- End Page Wrapper -->
	</div> <!-- End Wrapper -->

    <!-- Common Javascript -->
	<script src="{{ URL::asset('assets/plugins/jquery/jquery-3.5.1.min.js') }}"></script>
	<script src="{{ URL::asset('assets/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ URL::asset('assets/plugins/simplebar/simplebar.min.js') }}"></script>
	<script src="{{ URL::asset('assets/plugins/jquery-zoom/jquery.zoom.min.js') }}"></script>
	<script src="{{ URL::asset('assets/plugins/slick/slick.min.js') }}"></script>

    @stack('scripts')
	<script>
		$(document).ajaxStart(function() { Pace.restart(); });
	</script>
	<script type="text/javascript">
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		</script>
</body>

</html>