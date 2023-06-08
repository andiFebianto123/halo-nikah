<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="Ekka - Admin Dashboard HTML Template.">

		<title>{{ (isset($head_title)) ? $head_title : 'Admin - Login' }}</title>

		<!-- GOOGLE FONTS -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

		<link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />
		
		<!-- Ekka CSS -->
		<link id="ekka-css" rel="stylesheet" href="{{ URL::asset('assets/css/ekka.css') }}" />
		
		<!-- FAVICON -->
		<link href="{{ URL::asset('assets/img/favicon.png') }}" rel="shortcut icon" />
        <style>
            .msg-error {
                color: red;
                margin-top: 7px;
            }
        </style>
	</head>
	
	<body class="sign-inup" id="body">
		<div class="container d-flex align-items-center justify-content-center form-height-login pt-24px pb-24px">
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-10">
					<div class="card">
						<div class="card-header bg-primary">
							<div class="ec-brand">
								<a href="index.html" title="Ekka">
									<img class="ec-brand-icon" src="{{ URL::asset('assets/img/logo/logo-login.png') }}" alt="" />
								</a>
							</div>
						</div>
						<div class="card-body p-5">
							<h4 class="text-dark mb-5">Sign In</h4>
							
							<form action="{{ url('admin/login') }}" method="POST">
                                {!! csrf_field() !!}
								<div class="row">
									<div class="form-group col-md-12 mb-4">
										<input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                                        @error('email')
                                                <p class="msg-error">{{ $message }}</p>
                                        @enderror
									</div>
									
									<div class="form-group col-md-12 ">
										<input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                        @error('password')
                                                <p class="msg-error">{{ $message }}</p>
                                        @enderror
									</div>
									
									<div class="col-md-12">
										<button type="submit" class="btn btn-primary btn-block mb-4">Sign In</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	
		<!-- Javascript -->
		{{-- <script src="{{ URL::asset('assets/plugins/jquery/jquery-3.5.1.min.js') }}"></script>
		<script src="{{ URL::asset('assets/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ URL::asset('assets/plugins/jquery-zoom/jquery.zoom.min.js') }}"></script>
		<script src="{{ URL::asset('assets/plugins/slick/slick.min.js') }}"></script> --}}
	
		<!-- Ekka Custom -->	
		{{-- <script src="{{ URL::asset('assets/js/ekka.js') }}"></script> --}}
	</body>
</html>