<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Vendor Panel" />
	<meta name="author" content="" />

	<title>Yul | Student's Details</title>
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
							<a href="#">Student's Details</a>
						</li>
					</ol>
				</div>
				<div class="col-xs-4">
					<div class="pull-right">
							{{--<a href="{{url('admin/new_customer')}}" class="btn btn-primary"><i class="entypo-user"> </i> Add new</a>--}}
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<table style="width: 100%;">
							<tr>
								<td class="grey">
									Name
								</td>
							
								<td class="light">
										{{$student->name}}
								</td>
							</tr>
							<tr>
								<td class="grey">
									Phone
								</td>
								
								<td class="light">
								{{$student->phone}}
								</td>
							</tr>
							
							<tr>
								<td class="grey">
									Email
								</td>
								
								<td class="light">
									{{$student->email}}
								</td>
							</tr>
							<tr>
								<td class="grey">
									Sex
								</td>
								<td class="light">
								{{$student->sex}}
								</td>
							</tr>
							<tr>
								<td class="grey">
									Marital status
								</td>
							    <td class="light">
									{{$student->marital_status}}
								</td>
							</tr>
							<tr>
								<td class="grey">
									Country
								</td>
							    <td class="light">
									{{$student->country}}
								</td>
							</tr>
							
						</table>
					</div>
					
				</div>
				<div class="row">
					<div class="col-md-6">
						<br/><h3>Registrations</h3>
						<table class="table table-bordered datatable" id="table-1">
							<thead>
								<tr>
									<th>S/N</th>
									<th>Program</th>
									<th>Amount</th>
									<th>Date</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								@foreach($my_programs as $key=>$subscription)
								<tr class="odd gradeX">
									<td>{{$key + 1}}</td>
									<td>{{$subscription->name}} ({{$subscription->category_name}})</td>
									<td>N{{number_format($subscription->category_student_price)}}</td>
									<td>{{$subscription->created_at}}</td>
									@if($subscription->status == 1)
									<td><span class="green">Success</span></td>
									@elseif($subscription->status == 2)
									<td><span class="brown">Failed</span></td>
									@endif
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="col-md-6">
					<br/><h3>Orders</h3>
						<table class="table table-bordered datatable" id="table-2">
							<thead>
								<tr>
									<th>S/N</th>
									<th>Book</th>
									<th>Amount</th>
									<th>Date</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								@foreach($sales as $key=>$sale)
								<tr class="odd gradeX">
									<td>{{$key + 1}}</td>
									<td>{{$sale->book_name}}</td>
									<td>N{{number_format($sale->price)}}</td>
									<td>{{$sale->created_at}}</td>
									@if($sale->status == 1)
									<td><span class="green">Success</span></td>
									@elseif($sale->status == 2)
									<td><span class="brown">Failed</span></td>
									@endif
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