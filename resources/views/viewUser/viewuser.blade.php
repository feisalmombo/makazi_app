@extends('layouts.app')

@section('title', 'Users')

@section('content')


<div class="col-lg-12">
<h1 class="page-header">All Users</h1>
</div>
<div class="row">
<div class="col-lg-12"> 
@include('msgs.success')
<div class="panel panel-default">
<div class="panel-heading">
List of system users <a href="{{ url('/applicant/view/users/create') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-plus"></i>&nbsp;Add User</a>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
@if(!empty($userData))
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
	<th>S/N</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Email</th>
	<th>Phone Number</th>
	<th>Privilege</th>
	<th>Show</th>
	<th>Edit</th>
	<th>Delete</th>
	<th>Reset Pass</th>
</tr>
</thead>
<tbody>

@foreach($userData as $key=>$userDatas)
<tr class="odd gradeX">
	<td>{{ $key + 1 }}</td>
	<td>{{ $userDatas->first_name }}</td>
	<td class="center">{{ $userDatas->last_name }}</td>
	<td class="center">{{ $userDatas->email }}</td>
	<td class="center">{{ $userDatas->phone_number }}</td>
	<td class="center">{{ $userDatas->slug  }}</td>
	<td>
		<a class="btn btn-info" data-toggle="modal" href='#{{ $userDatas->id."show" }}'><i class="fa fa-bullseye" arial-hidden="true"></i></a>
		<div class="modal fade" id="{{ $userDatas->id."show" }}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">User Details</h4>
					</div>
					<div class="modal-body">
					<div class="row">
					    <div class="col-sm-3">
					     <div class="center-block">
							<div class="form-group">
								<label>First Name: </label>
							</div>
						</div>
					    </div>
					    <div class="col-sm-9">
					       <div class="center-block">
							<div class="form-group">
								{{ $userDatas->first_name }}
							</div>
						</div>
					    </div>
					  </div>
					  <hr/>

					  <div class="row">
					    <div class="col-sm-3">
					     <div class="center-block">
							<div class="form-group">
								<label>Last Name: </label>
							</div>
						</div>
					    </div>
					    <div class="col-sm-9">
					       <div class="center-block">
							<div class="form-group">
								{{ $userDatas->last_name }}
							</div>
						</div>
					    </div>
					  </div>
					  <hr/>

					  <div class="row">
					    <div class="col-sm-3">
					     <div class="center-block">
							<div class="form-group">
								<label>Email: </label>
							</div>
						</div>
					    </div>
					    <div class="col-sm-9">
					       <div class="center-block">
							<div class="form-group">
								{{ $userDatas->email }}
							</div>
						</div>
					    </div>
					  </div>
					  <hr/>

					  <div class="row">
					    <div class="col-sm-3">
					     <div class="center-block">
							<div class="form-group">
								<label>Phone Number: </label>
							</div>
						</div>
					    </div>
					    <div class="col-sm-9">
					       <div class="center-block">
							<div class="form-group">
								{{ $userDatas->phone_number }}
							</div>
						</div>
					    </div>
					  </div>
					  <hr/>

					  <div class="row">
					    <div class="col-sm-3">
					     <div class="center-block">
							<div class="form-group">
								<label>Privilege: </label>
							</div>
						</div>
					    </div>
					    <div class="col-sm-9">
					       <div class="center-block">
							<div class="form-group">
								{{ $userDatas->slug }}
							</div>
						</div>
					    </div>
					  </div>
					  </div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</td>
	<td>
		<a href="{{ url('/applicant/view/users/'.$userDatas->id.'/edit') }}" type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" arial-hidden="true"></i></a>
	</td>
	<td>
		<a href='#{{ $userDatas->id }}' data-toggle="modal" type="button" class="btn btn-danger"><i class="fa fa-trash" arial-hidden="true"></i></a>
		<div class="modal fade" id="{{ $userDatas->id }}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title"><strong>Delete</strong></h4>
					</div>
					<div class="modal-body">
						Are you sure you want to delete User? <h9 style="color: blue;">{{ $userDatas->first_name." ".$userDatas->last_name}}</h9>
					</div>
					<form action="/applicant/view/users/{{ $userDatas->id  }}" method="POST" role="form">

						{{ csrf_field() }}
						{{ method_field('DELETE') }}

						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">NO</button>

							<button type="submit" class="btn btn-danger">Yes</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</td>
	<td><a href="/reset/{{$userDatas->id}}" >
		<span class="fa-passwd-reset fa-stack">
		  <i class="fa fa-undo fa-stack-2x"></i>
		  <i class="fa fa-lock fa-stack-1x"></i>
		</span></a>
	</td>
</tr>
@endforeach
</tbody>
</table>
<div class="row">
<div class="pull-left col-lg-8">
<div class="col-lg-2">
	<form action="{{url('/applicant/view/users/report/pdf/downloadPdf')}}" method="POST"> 
				{{ csrf_field() }}
	<input type="text" hidden="hidden" value="<?php print base64_encode(serialize($userData)); ?>" name="tad">
	<div class="col-lg-9">
		<button class="btn btn-info" type="submit" name="submit">
			<span class="fa fa-file-pdf-o" aria-hidden="true"> Download PDF</span>
		</button>
	</div>
	</form>
	<!-- <a type="button" class="btn btn-info" href="{{-- url('/applicant/view/users/report/pdf/downloadPdf')--}}"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF</a>	 -->
</div>	
<div class="col-lg-1"></div>
<div class="col-lg-2">

	<form action="{{url('/applicant/view/users/report/excel/downloadExcel')}}" method="POST"> 
				{{ csrf_field() }}
	<input type="text" hidden="hidden" value="<?php print base64_encode(serialize($userData)); ?>" name="tadas">
	<div class="col-lg-9">
		<button class="btn btn-success" type="submit" name="submit">
			<span class="fa fa-file-excel-o" aria-hidden="true"> Download Excel</span>
		</button>
	</div>
	</form>
	<!-- <a type="button" class="btn btn-success" href="{{-- url('/applicant/view/users/report/excel/downloadExcel') --}}"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Download Excel</a> -->
</div>
</div>
</div>
@else
<div class="alert alert-info">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<strong>No user found</strong> 
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