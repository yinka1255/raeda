<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Vendor Panel" />
	<meta name="author" content="" />

	<title>Yul | Program's Details</title>
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
							<a href="#">Program's Details</a>
						</li>
					</ol>
				</div>
				<div class="col-xs-4">
					<div class="pull-right">
							{{--<a href="{{url('admin/new_customer')}}" class="btn btn-primary"><i class="entypo-user"> </i> Add new</a>--}}
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<br/><h3>{{$program->name}}</h3>
						<table class="table table-bordered datatable" id="table-1">
							<thead>
								<tr>
									<th>S/N</th>
									<th>Class</th>
									<th>Method of delivery</th>
									<th>Days of lecture</th>
									<th>Sessions</th>
									<th>Registration fee</th>
									<th>Duration</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($categories as $key=>$category)
								<tr class="odd gradeX">
									<td>{{$key + 1}}</td>
									<td>{{$category->name}}</td>
									<td>{{$category->method_of_delivery}}</td>
									<td>{{$category->days_of_lecture}}</td>
									<td>{!! $category->sessions !!}</td>
									<td>N{{number_format($category->registration_fee)}}</td>
									<td>{{$category->duration}}</td>
									@if($category->status == 1)
									<td><span class="green">Active</span></td>
									@elseif($category->status == 2)
									<td><span class="brown">Deactivated</span></td>
									@endif
									<td>
									<a href="{{url('admin/edit_category/'.$program->id.'/'.$category->id)}}" class="btn btn-default btn-sm btn-icon icon-left">
										<i class="entypo-pencil"></i>
										Edit
									</a>
									<a href="{{url('admin/courses/'.$program->id.'/'.$category->id)}}" class="btn btn-default btn-sm btn-icon icon-left">
										<i class="entypo-cog"></i>
										Details
									</a>
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