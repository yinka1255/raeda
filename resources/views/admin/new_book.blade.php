<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<title>Yul | New book</title>
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
								<a href="{{url('admin/books')}}">Courses</a>
							</li>
							<li class="active">
								<a href="#">New book</a>
							</li>
						</ol>
					</div>
					<div class="col-xs-4">
						
					</div>
				</div>
				<br/><br/>
				<h3>New book </h3>
				<form role="form" method="post" enctype="multipart/form-data" action="{{url('admin/save_book')}}" class="form-horizontal form-groups-bordered">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="field-2" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-5">
							<input type="text" name="name" class="form-control" placeholder="Name">
						</div>
					</div>
					<div class="form-group">
						<label for="field-2" class="col-sm-2 control-label">Author</label>
						<div class="col-sm-5">
							<input type="text" name="author" class="form-control" placeholder="Author">
						</div>
					</div>
					<div class="form-group">
						<label for="field-2" class="col-sm-2 control-label">Price</label>
						<div class="col-sm-5">
							<input type="number" name="price" class="form-control" placeholder="Price">
						</div>
					</div>
					<div class="form-group">
						<label for="field-2" class="col-sm-2 control-label">Book (pdf only)</label>
						<div class="col-sm-5">
							<input type="file" name="book" accept="application/pdf" class="form-control" >
						</div>
					</div>
					<div class="form-group">
						<label for="field-2" class="col-sm-2 control-label">Book cover (jpg / png only)</label>
						<div class="col-sm-5">
							<input type="file" name="image" accept="image/png, image/jpg" class="form-control" >
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-5">
							<button type="submit" class="btn btn-default">Add book</button>
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