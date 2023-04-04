<!DOCTYPE html>
<html lang="en" data-kit-theme="dark">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<base href="{{ asset('') }}">
	
	<title>City Tours CMS</title>
	
	<!-- Favicon & Logo -->
	<link rel="icon" type="image/png" href="components/kit/core/img/logo.svg"/>
	
	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
	
	<!-- Vendors -->
	<link rel="stylesheet" type="text/css" href="vendors/bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="vendors/perfect-scrollbar/css/perfect-scrollbar.css">
	<link rel="stylesheet" type="text/css" href="vendors/ladda/dist/ladda-themeless.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/bootstrap-select/dist/css/bootstrap-select.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/select2/dist/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/tempus-dominus-bs4/build/css/tempusdominus-bootstrap-4.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/bootstrap-sweetalert/dist/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="vendors/font-feathericons/dist/feather.css">
	<link rel="stylesheet" type="text/css" href="vendors/font-linearicons/style.css">
	<link rel="stylesheet" type="text/css" href="vendors/font-icomoon/style.css">
	<link rel="stylesheet" type="text/css" href="vendors/font-awesome/css/font-awesome.min.css">
	
	<!-- components -->
	<link rel="stylesheet" type="text/css" href="components/kit/vendors/style.css">
	<link rel="stylesheet" type="text/css" href="components/kit/core/style.css">
	<link rel="stylesheet" type="text/css" href="components/kit/apps/style.css">
	<link rel="stylesheet" type="text/css" href="components/cleanui/styles/style.css">
	<link rel="stylesheet" type="text/css" href="components/cleanui/system/auth/style.css">
	<link rel="stylesheet" type="text/css" href="components/cleanui/layout/sidebar/style.css">
	
	<!-- Common -->
	<link rel="stylesheet" type="text/css" href="common/css/custom.css">
	<link rel="stylesheet" type="text/css" href="common/css/preloader.css">
	
	@stack('css')
</head>
<body class="cui__layout--cardsShadow cui__layout--grayBackground cui__layout--squaredBorders cui__menuLeft--dark cui__menuTop--dark">
	<div class="initial__loading"></div>
	
	<div class="cui__utils__content">
		<div class="cui__auth__authContainer">
			@include('auth.layout.components.top-bar')
			
			@stack('content')
			
			@include('auth.layout.components.footer')
		</div>
	</div>
	
	<!-- Modals -->
	@include('modals.error')
	@include('modals.success')
	
	<!-- JS -->
	<script src="vendors/jquery/dist/jquery.min.js"></script>
	<script src="vendors/popper.js/dist/umd/popper.js"></script>
	<script src="vendors/jquery-ui/jquery-ui.min.js"></script>
	<script src="vendors/bootstrap/dist/js/bootstrap.js"></script>
	<script src="vendors/jquery-mousewheel/jquery.mousewheel.min.js"></script>
	<script src="vendors/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
	<script src="vendors/spin.js/spin.js"></script>
	<script src="vendors/ladda/dist/ladda.min.js"></script>
	<script src="vendors/bootstrap-sweetalert/dist/sweetalert.min.js"></script>
	<script src="vendors/bootstrap-show-password/dist/bootstrap-show-password.min.js"></script>
	<script src="vendors/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
	<script src="vendors/html5-form-validation/dist/jquery.validation.min.js"></script>
	<script src="components/kit/core/index.js"></script>
	<script src="components/cleanui/layout/sidebar/index.js"></script>
	<script src="common/js/preloader.js"></script>
	<script src="common/js/custom.js"></script>
	
	<script>
	@if (Session::has('error'))
		$('#alert-error').find('#alert-error-message').html("{{ Session::get('error') }}");
		$('#alert-error').find('#button-error-confirm').text("{{ trans('button.retry') }}");
		$('#alert-error').modal();
	@endif
	@if (Session::has('success'))
		$('#alert-success').find('#alert-success-message').html("{{ Session::get('success') }}");
		$('#alert-success').find('#button-success-confirm').text("{{ trans('button.ok') }}");
		$('#alert-success').modal();
	@endif
	
	</script>
	@stack('js')
</body>