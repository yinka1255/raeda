<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<title>Yul | New course</title>
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
								<a href="{{url('admin/courses/'.$program->id.'/'.$category->id)}}">Courses</a>
							</li>
							<li class="active">
								<a href="#">Edit course</a>
							</li>
						</ol>
					</div>
					<div class="col-xs-4">
						
					</div>
				</div>
				<br/><br/>
				<h3>{{$program->name}} ({{$category->name}}) </h3>
				<form role="form" method="post" action="{{url('admin/update_course')}}" class="form-horizontal form-groups-bordered">
					{{ csrf_field() }}
					<input type="hidden" name="program_id" value="{{$program->id}}" />
					<input type="hidden" name="category_id" value="{{$category->id}}" />
					<input type="hidden" name="course_id" value="{{$course->id}}" />
					<div class="form-group">
						<label for="field-2" class="col-sm-2 control-label">Course Name</label>
						<div class="col-sm-5">
							<input type="text" name="name" value="{{$course->name}}" class="form-control" placeholder="Name">
						</div>
					</div>
					<div class="form-group">
						<label for="field-2" class="col-sm-2 control-label">Price(N)</label>
						<div class="col-sm-5">
							<input type="number" name="price" value="{{$course->price}}" class="form-control" placeholder="Price">
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-5">
							<button type="submit" class="btn btn-default">Create course</button>
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