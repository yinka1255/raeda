<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<title>Team YUL | Edit Plan</title>
	@include('admin.includes.head')

</head>
<body class="page-body  page-fade" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	@include('admin.includes.sidemenu')
	<div class="main-content">
		@include('admin.includes.header')
		<hr />
		
		<div class="row">
			<div class="col-xs-12">
				<div class="row">
					<div class="col-xs-8">
						<ol class="breadcrumb bc-3">
							<li>
								<a href="{{url('admin/index')}}"><i class="fa-home"></i>Dashboard</a>
							</li>
							<li>
								<a href="{{url('admin/plans')}}">Plans</a>
							</li>
							<li class="active">
								<a href="#">Edit Plan</a>
							</li>
						</ol>
					</div>
					
				</div>
				<br/><br/>
				<form role="form" method="post" action="{{url('admin/update_plan')}}" class="form-horizontal form-groups-bordered">
					{{ csrf_field() }}
					<input type="hidden" name="id" class="form-control"  value="{{$plan->id}}" />
					<div class="form-group">
						<label for="field-2" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-5">
							<input type="text" name="name" class="form-control"  value="{{$plan->name}}" @if($plan->id == 1 || $plan->id == 6) readonly @endif placeholder="Name">
						</div>
					</div>
					<div class="form-group">
						<label for="field-2" class="col-sm-2 control-label">Amount(N)</label>
						<div class="col-sm-5">
							<input type="number" name="amount" class="form-control" value="{{$plan->amount}}" placeholder="Amount(N)">
						</div>
					</div>
					<div class="form-group">
						<label for="field-2" class="col-sm-2 control-label">Validity(days)</label>
						<div class="col-sm-5">
							<input type="number" name="days" class="form-control"value="{{$plan->days}}"  placeholder="ex: 30 days">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-5">
							<button type="submit" class="btn btn-default">Update plan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		
		<br />
		
		<br />
		
	</div>




	<!-- Imported styles on this page -->
	<link rel="stylesheet" href="{{asset('public/admin/js/jvectormap/jquery-jvectormap-1.2.2.css')}}">
	<link rel="stylesheet" href="{{asset('public/admin/js/rickshaw/rickshaw.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/admin/js/datatables/datatables.css')}}">
	<script src="{{asset('public/admin/js/datatables/datatables.js')}}"></script>
	@include('admin.includes.script')
	
</body>
</html>