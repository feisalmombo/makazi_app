@extends('layouts.app')

@section('title', 'Users')

@section('content')


<div class="col-lg-12">
	<h1 class="page-header">All Permissions</h1>
</div>
<div class="row">
	<div class="col-lg-12"> 
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
				List of All Permission<a href="{{ url('/home') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				@if(!empty($permissions))
				<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
					<thead>
						<tr>
							<th>S/N</th>
							<th>Name</th>
							<th>Descriptions</th>
							<th>Created Day</th>
						</tr>
					</thead>
					<tbody>

						@foreach($permissions as $key=>$permission)
						<tr class="odd gradeX">
							<td>{{ ++$counts }}</td>
							<td>{{ $permission->name }}</td>
							<td class="center">{{ $permission->slug }}</td>
							<td>{{ ($permission->created_at)->diffForHumans() }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
						<div class="row">
					<div class="pull-left col-lg-8">
						<div class="col-lg-2">
							<form action="{{url('/view-users/report/pdf/downloadPdf')}}" method="POST"> 
										{{ csrf_field() }}
							<input type="text" hidden="hidden" value="<?php print base64_encode(serialize($permissions)); ?>" name="tad">
							<div class="col-lg-9">
								<button class="btn btn-info" type="submit" name="submit">
									<span class="fa fa-file-pdf-o" aria-hidden="true"> Download PDF</span>
								</button>
							</div>
							</form>
							<!-- <a type="button" class="btn btn-info" href="{{-- rl('/view-users/report/pdf/downloadPdf')--}}"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF</a>	 -->
						</div>	
						<div class="col-lg-1"></div>
						<div class="col-lg-2">

							<form action="{{url('/view-users/report/excel/downloadExcel')}}" method="POST"> 
										{{ csrf_field() }}
							<input type="text" hidden="hidden" value="<?php print base64_encode(serialize($permissions)); ?>" name="tadas">
							<div class="col-lg-9">
								<button class="btn btn-success" type="submit" name="submit">
									<span class="fa fa-file-excel-o" aria-hidden="true"> Download Excel</span>
								</button>
							</div>
							</form>
							<!-- <a type="button" class="btn btn-success" href="{{-- url('/view-users/report/excel/downloadExcel') --}}"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Download Excel</a> -->
						</div>
					</div>
				</div>
				@else
				<div class="alert alert-info">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>No Permission found</strong> 
				</div>
				@endif
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>


<!-- /.row -->

@endsection