<!DOCTYPE html>
<html lang="en">
<head>
	<title>Coming Soon 2</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{asset('public/404/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/404/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/404/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/404/vendor/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/404/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/404/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/404/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>
	
	<!--  -->
	<div class="simpleslide100">
		<div class="simpleslide100-item bg-img1" style="background-image: url({{asset('public/404/images/bg01.jpg')}});"></div>
		<div class="simpleslide100-item bg-img1" style="background-image: url({{asset('public/404/images/bg02.jpg')}});"></div>
		<div class="simpleslide100-item bg-img1" style="background-image: url({{asset('public/404/images/bg03.jpg')}});"></div>
	</div>

	<div class="size1 overlay1">
		<!--  -->
		<div class="size1 flex-col-c-m p-l-15 p-r-15 p-t-50 p-b-50">
			<h3 class="l1-txt1 txt-center p-b-25">
				Check back later!
			</h3>

			<p class="m2-txt1 txt-center p-b-48">
				Our website is currently under maintainance
			</p>

			<div class="flex-w flex-c-m cd100 p-b-33">
				
				
		</div>
	</div>



	

<!--===============================================================================================-->	
	<script src="{{asset('public/404/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('public/404/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('public/404/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('public/404/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('public/404/vendor/countdowntime/moment.min.js')}}"></script>
	<script src="{{asset('public/404/vendor/countdowntime/moment-timezone.min.js')}}"></script>
	<script src="{{asset('public/404/vendor/countdowntime/moment-timezone-with-data.min.js')}}"></script>
	<script src="{{asset('public/404/vendor/countdowntime/countdowntime.js')}}"></script>
	<script>
		$('.cd100').countdown100({
			/*Set Endtime here*/
			/*Endtime must be > current time*/
			endtimeYear: 0,
			endtimeMonth: 0,
			endtimeDate: 35,
			endtimeHours: 18,
			endtimeMinutes: 0,
			endtimeSeconds: 0,
			timeZone: "" 
			// ex:  timeZone: "America/New_York"
			//go to " http://momentjs.com/timezone/ " to get timezone
		});
	</script>
<!--===============================================================================================-->
	<script src="{{asset('public/404/vendor/tilt/tilt.jquery.min.js')}}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{asset('public/404/js/main.js')}}"></script>

</body>
</html>