<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Vendor Panel" />
	<meta name="author" content="" />

	<title>AirTnd | Bonus's Details</title>
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
							<a href="#">Bonus's Details</a>
						</li>
					</ol>
				</div>
				<div class="col-xs-4">
					<div class="pull-right">
							<a href="javascript:void(0)" data-toggle="modal" data-target="#wallet-modal" class="btn btn-primary"><i class="entypo-folder"> </i> Add fund to wallet</a>
							<a href="javascript:void(0)" data-toggle="modal" data-target="#settings-modal" class="btn btn-danger"><i class="entypo-tag"> </i> Update bonus settings</a>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<table style="width: 100%;">
							<tr>
								<td class="grey">
									Balance
								</td>
							
								<td class="light">
								N{{number_format($balance)}}
								</td>
							</tr>
							<tr>
								<td class="grey">
									Current percentage
								</td>
								
								<td class="light">
								{{$bonus_setting->percentage}}%
								</td>
							</tr>
							<tr>
								<td class="grey">
									Minimum amount to qualify
								</td>
								
								<td class="light">
									{{$bonus_setting->minimum_amount_to_qualify}}
								</td>
							</tr>
							<tr>
								<td class="grey">
									No. of correct boxes
								</td>
								<td class="light">
								{{$bonus_setting->no_of_correct_boxes}}
								</td>
							</tr>
						</table>
					</div>
					
				</div>
				<div class="row">
					
					<div class="col-md-12">
					<br/><h3>Bonus history</h3>
						<table class="table table-bordered datatable" id="table-2">
							<thead>
								<tr>
									<th>S/N</th>
									<th>Amount</th>
									<th>Date</th>
								</tr>
							</thead>
							<tbody>
								@foreach($bonuses as $key=>$bonus)
								<tr class="odd gradeX">
									<td>{{$key + 1}}</td>
									<td>N{{number_format($bonus->amount)}}</td>
									<td>{{$bonus->created_at}}</td>
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

<div class="modal fade" id="wallet-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="{{url('admin/add_bonus')}}">
			{{ csrf_field() }}
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Add bonus to wallet</h4>
				</div>
				
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group no-margin">
								<label for="field-7" class="control-label">Amount (N)</label>
								<input type="number" class="form-control" name="amount" />
							</div>	
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-info">Add to wallet</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="settings-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="{{url('admin/update_bonus_setting')}}">
			{{ csrf_field() }}
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Update bonus settings</h4>
				</div>
				
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group no-margin">
								<label for="field-7" class="control-label">Percentage (%)</label>
								<input type="number" class="form-control" value="{{$bonus_setting->percentage}}" name="percentage" />
							</div>	
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group no-margin">
								<label for="field-7" class="control-label">Number of correct boxes</label>
								<input type="number" class="form-control" value="{{$bonus_setting->no_of_correct_boxes}}" name="no_of_correct_boxes" />
							</div>	
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group no-margin">
								<label for="field-7" class="control-label">Minimum amount to qualify for bonus</label>
								<input type="number" class="form-control" value="{{$bonus_setting->minimum_amount_to_qualify}}" name="minimum_amount_to_qualify" />
							</div>	
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-info">Update settings</button>
				</div>
			</form>
		</div>
	</div>
</div>
</html>