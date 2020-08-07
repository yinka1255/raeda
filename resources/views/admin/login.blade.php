<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<link rel="icon" href="{{asset('public/admin/images/favicon.ico')}}">

	<title>AirTnd | Login</title>

	<link rel="stylesheet" href="{{asset('public/admin/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/admin/css/font-icons/entypo/css/entypo.css')}}">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="{{asset('public/admin/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('public/admin/css/neon-core.css')}}">
	<link rel="stylesheet" href="{{asset('public/admin/css/neon-theme.css')}}">
	<link rel="stylesheet" href="{{asset('public/admin/css/neon-forms.css')}}">
	<link rel="stylesheet" href="{{asset('public/admin/css/custom.css')}}">

	<script src="{{asset('public/admin/js/jquery-1.11.3.min.js')}}"></script>

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<body class="page-body login-page login-form-fall" data-url="http://neon.dev">


<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
</script>

<div class="login-container">
	
	
	
	<div class="login-progressbar">
		<div></div>
	</div>
	
	<div class="login-form" style="margin-top: 120px;">
		
		<div class="login-content">
		<a href="{{url('/')}}" class="logo" >
			<img src="{{asset('public/main/images/logo.png')}}" width="100px" style="padding: 15px;background: #fff;"/>
			</a>
			<br/><br/><br/>
			<div class="form-login-error">
				<h3>Invalid login</h3>
				<p>Enter <strong>demo</strong>/<strong>demo</strong> as login and password.</p>
			</div>
			
			<form method="post" role="form" action="{{url('authenticate')}}">
					{{ csrf_field() }}
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-user"></i>
						</div>
						<input type="email" class="form-control" name="email" id="username" placeholder="Email" autocomplete="off" />
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-key"></i>
						</div>
						<input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block btn-login ">
						<i class="entypo-login"></i>
						Login In
					</button>
				</div>
				<!-- Implemented in v1.1.4 -->
				
				{{--		
				<div class="form-group">
					<button type="button" class="btn btn-default btn-lg btn-block btn-icon icon-left google-button">
						Login with Google
						<i class="entypo-gplus"></i>
					</button>
				</div>
				--}}
			</form>
			<div class="login-bottom-links">
				<a href="{{url('admin/forgot_password')}}" class="link">Forgot your password?</a>
				
			</div>
		</div>
	</div>
</div>


	@if(Session::has('success'))
	<script type="text/javascript">
		jQuery(document).ready(function($)
		{
			// Sample Toastr Notification
			setTimeout(function()
			{
				var opts = {
					"closeButton": true,
					"debug": false,
					"positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? "toast-top-left" : "toast-top-right",
					"toastClass": "black",
					"onclick": null,
					"showDuration": "3000",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				};
		
				toastr.success("{{Session::get('success')}}", opts);
			}, 10);
		});
	</script>
	@endif

	@if(Session::has('error'))
	<script type="text/javascript">
		jQuery(document).ready(function($)
		{
			// Sample Toastr Notification
			setTimeout(function()
			{
				var opts = {
					"closeButton": true,
					"debug": false,
					"positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? "toast-top-left" : "toast-top-right",
					"toastClass": "black",
					"onclick": null,
					"showDuration": "3000",
					"hideDuration": "1000",
					"timeOut": "0",
					"extendedTimeOut": "0",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				};
		
				toastr.error("{{Session::get('error')}}", opts);
			}, 10);
		});
	</script>
	@endif
	<!-- Bottom scripts (common) -->
	<script src="{{asset('public/admin/js/gsap/TweenMax.min.js')}}"></script>
	<script src="{{asset('public/admin/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js')}}"></script>
	<script src="{{asset('public/admin/js/bootstrap.js')}}"></script>
	<script src="{{asset('public/admin/js/joinable.js')}}"></script>
	<script src="{{asset('public/admin/js/resizeable.js')}}"></script>
	<script src="{{asset('public/admin/js/neon-api.js')}}"></script>
	<script src="{{asset('public/admin/js/jquery.validate.min.js')}}"></script>
	<script src="{{asset('public/admin/js/neon-login.js')}}"></script>
	<script src="{{asset('public/admin/js/toastr.js')}}"></script>

	<!-- JavaScripts initializations and stuff -->
	<script src="{{asset('public/admin/js/neon-custom.js')}}"></script>


	<!-- Demo Settings -->
	<script src="{{asset('public/admin/js/neon-demo.js')}}"></script>

</body>
</html>