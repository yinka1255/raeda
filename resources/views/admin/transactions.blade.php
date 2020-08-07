<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<title>AirTnd || Transactions</title>
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
							<a href="#">Transactions</a>
						</li>
					</ol>
				</div>
				{{--
				<div class="col-xs-4">
					<div class="pull-right">
							<a href="{{url('admin/new_admin')}}" class="btn btn-primary"><i class="entypo-user"> </i> Add new</a>
					</div>
				</div>
				--}}
				<table class="table table-bordered datatable" id="table-1">
					<thead>
						<tr>
							<th width="20px">S/N</th>
							<th>Customer</th>
							<th>Amount paid</th>
							<th>Type</th>
							<th>Description</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						@foreach($transactions as $key=>$transaction)
						<tr class="odd gradeX">
							<td>{{$key + 1}}</td>
							<td><a href="{{url('admin/customer/'.$transaction->customer_id)}}"> {{$transaction->customer_name}}</a> </td>
							<td>N{{number_format($transaction->amount)}}</td>
							<td>{{$transaction->type}}</td>
							<td>{{$transaction->description}}</td>
							@if($transaction->status == 1)
							<td><span class="green">Success</span></td>
							@elseif($transaction->status == 2)
							<td><span class="brown">Failed</span></td>
							@endif
							
						</tr>
						@endforeach
					</tbody>
				</table>
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
			
			
		} );
	</script>
</body>
</html>