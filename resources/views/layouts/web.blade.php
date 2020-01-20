<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title')</title>

	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('/web/css/open-iconic-bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/web/css/animate.css') }}">

	<link rel="stylesheet" href="{{ asset('/web/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/web/css/owl.theme.default.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/web/css/magnific-popup.css') }}">

	<link rel="stylesheet" href="{{ asset('/web/css/aos.css') }}">

	<link rel="stylesheet" href="{{ asset('/web/css/ionicons.min.css') }}">

	{{-- <link rel="stylesheet" href="{{ asset('/web/css/bootstrap-datepicker.css') }}"> --}}
	{{-- <link rel="stylesheet" href="{{ asset('/web/css/jquery.timepicker.css') }}"> --}}


	<link rel="stylesheet" href="{{ asset('/web/css/flaticon.css') }}">
	<link rel="stylesheet" href="{{ asset('/web/css/icomoon.css') }}">
	<link rel="stylesheet" href="{{ asset('/web/css/style.css') }}">

	@yield('links')
</head>
<body class="goto-here">	

	@include('web.partials.navbar')

	@yield('content')

	@include('web.partials.footer')
	@include('web.partials.loader')

	<script src="{{ asset('/web/js/jquery.min.js') }}"></script>
	<script src="{{ asset('/web/js/jquery-migrate-3.0.1.min.js') }}"></script>
	<script src="{{ asset('/web/js/popper.min.js') }}"></script>
	<script src="{{ asset('/web/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/web/js/jquery.easing.1.3.js') }}"></script>
	<script src="{{ asset('/web/js/jquery.waypoints.min.js') }}"></script>
	<script src="{{ asset('/web/js/jquery.stellar.min.js') }}"></script>
	<script src="{{ asset('/web/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('/web/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('/web/js/aos.js') }}"></script>
	{{-- <script src="{{ asset('/web/js/jquery.animateNumber.min.js') }}"></script> --}}
	{{-- <script src="{{ asset('/web/js/bootstrap-datepicker.js') }}"></script> --}}
	<script src="{{ asset('/web/js/scrollax.min.js') }}"></script>
	@yield('script')
	<script src="{{ asset('/web/js/main.js') }}"></script>
	@include('admin.partials.notifications')
</body>
</html>