<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<title>Team YUL | New Admin user</title>
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
								<a href="{{url('admin/members')}}">Subscriber's</a>
							</li>
							<li class="active">
								<a href="#">New subscriber</a>
							</li>
						</ol>
					</div>
					<div class="col-xs-4">
					<div class="pull-right">
							<a href="{{url('admin/new_member')}}" class="btn btn-primary"><i class="entypo-user"> </i> Add new</a>
					</div>
				</div>
					
				</div>
				<br/><br/>
				<form role="form" method="post" action="{{url('admin/save_member')}}" class="form-horizontal form-groups-bordered">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="field-2" class="col-sm-2 control-label">First name</label>
						<div class="col-sm-5">
							<input type="text" name="first_name" class="form-control" placeholder="First name">
						</div>
					</div>
					<div class="form-group">
						<label for="field-2" class="col-sm-2 control-label">Last name</label>
						<div class="col-sm-5">
							<input type="text" name="last_name" class="form-control" placeholder="Last name">
						</div>
					</div>
					<div class="form-group">
						<label for="field-2" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-5">
							<input type="email" name="email" class="form-control" placeholder="Email">
						</div>
					</div>
					<div class="form-group">
						<label for="field-2" class="col-sm-2 control-label">Phone</label>
						<div class="col-sm-5">
							<input type="text" name="phone" class="form-control" placeholder="Phone">
						</div>
					</div>
					<div class="form-group">
						<label for="field-2" class="col-sm-2 control-label">Team id</label>
						<div class="col-sm-5">
							<input type="text" name="team_id" class="form-control" placeholder="Team id">
						</div>
					</div>
					<div class="form-group">
						<label for="field-2" class="col-sm-2 control-label">ID number</label>
						<div class="col-sm-5">
							<input type="text" name="id_number" class="form-control" placeholder="ID number">
						</div>
					</div>
					<div class="form-group">
						<label for="field-2" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-5">
							<input type="text" name="password" class="form-control"  placeholder="Password" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-5">
							<button type="submit" class="btn btn-default">Create new user</button>
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