<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Vendor Panel" />
	<meta name="author" content="" />

	<title>Yul | Program's Courses</title>
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
				<div class="col-xs-8">
					<ol class="breadcrumb bc-3">
						<li>
							<a href="{{url('admin/index')}}"><i class="fa-home"></i>Dashboard</a>
						</li>
						<li class="active">
							<a href="#">Program's courses</a>
						</li>
					</ol>
				</div>
				<div class="col-xs-4">
					<div class="pull-right">
							<a href="{{url('admin/new_course/'.$program->id.'/'.$category->id)}}" class="btn btn-primary"><i class="entypo-user"> </i> Add new course to this program and class</a>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<br/><h3>{{$program->name}} ({{$category->name}}) </h3>
						<table class="table table-bordered datatable" id="table-1">
							<thead>
								<tr>
									<th>S/N</th>
									<th>Name</th>
									<th>Price</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($courses as $key=>$course)
								<tr class="odd gradeX">
									<td>{{$key + 1}}</td>
									<td>{{$course->name}}</td>
									@if($course->price == 0)
									<td>Free</td>
									@else
									<td>N{{number_format($course->price)}}</td>
									@endif
									@if($course->status == 1)
									<td><span class="green">Active</span></td>
									@elseif($course->status == 2)
									<td><span class="brown">Deactivated</span></td>
									@endif
									<td>
									<a href="{{url('admin/edit_course/'.$program->id.'/'.$category->id.'/'.$course->id)}}" class="btn btn-default btn-sm btn-icon icon-left">
										<i class="entypo-pencil"></i>
										Edit
									</a>
									@if($course->status == 1)
									<a href="{{url('admin/deactivate_course/'.$course->id)}}" class="btn btn-danger btn-sm btn-icon icon-left">
										<i class="entypo-cancel"></i>
										Deactivate
									</a>
								@elseif($course->status == 2)
									<a href="{{url('admin/activate_course/'.$course->id)}}" class="btn btn-success btn-sm btn-icon icon-left">
										<i class="entypo-cancel"></i>
										Activate
									</a>
								@endif
							</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					
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
	<script type="text/javascript">
		jQuery( document ).ready( function( $ ) {
			var $table1 = jQuery( '#table-1' );
			
			// Initialize DataTable
			$table1.DataTable( {
				"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"bStateSave": true
			});
			var $table2 = jQuery( '#table-2' );
			
			// Initialize DataTable
			$table2.DataTable( {
				"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"bStateSave": true
			});
			
			
		} );
	</script>
</body>
</html>