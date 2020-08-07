<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<title>AirTnd | Dashboard</title>
	@include('admin.includes.head')

</head>
<body class="page-body  page-fade" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	@include('admin.includes.sidemenu')
	<div class="main-content">
		@include('admin.includes.header')
		<hr />
		
		<div class="row">
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-red">
					<div class="icon"><i class="entypo-chart-bar"></i></div>
					<div class="num" data-start="0" data-end="{{$customers_count}}" data-postfix="" data-duration="1500" data-delay="0">0</div>
		
					<h3>Customers</h3>
					<p>Number of customers</p>
				</div>
		
			</div>
		
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-green">
					<div class="icon"><i class="entypo-chart-bar"></i></div>
					<div class="num" data-start="0" data-end="{{$transactions_count}}" data-postfix="" data-duration="1500" data-delay="600">0</div>
		
					<h3>Transactions</h3>
					<p>Number of transactions</p>
				</div>
		
			</div>
			
			<div class="clear visible-xs"></div>
		
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-aqua">
					<div class="icon"><i class="entypo-chart-bar"></i></div>
					<div class="num" data-start="0" data-end="{{$customers_count_year}}" data-postfix="" data-duration="1500" data-delay="1200">0</div>
		
					<h3>Customers</h3>
					<p>No. customers this year</p>
				</div>
		
			</div>
		
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-blue">
					<div class="icon"><i class="entypo-chart-bar"></i></div>
					<div class="num" data-start="0" data-end="{{$transactions_count}}" data-postfix="" data-duration="1500" data-delay="1800">0</div>
		
					<h3>Transactions</h3>
					<p>No. transactions this year</p>
				</div>
		
			</div>
		</div>
		
		<br />
		
		<br />
		
	</div>




	<!-- Imported styles on this page -->
	<link rel="stylesheet" href="{{asset('public/admin/js/jvectormap/jquery-jvectormap-1.2.2.css')}}">
	<link rel="stylesheet" href="{{asset('public/admin/js/rickshaw/rickshaw.min.css')}}">
	@include('admin.includes.script')

</body>
</html>