@extends('layouts.app')

@section('title', 'Add User')

@section('content')
<div class="col-lg-12">
	<h1 class="page-header">Add user</h1>
</div>

<div class="row">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
				Create user<a href="{{ url('/applicant/view/users') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid">
					<section class="col-md-8 col-md-offset-2">
						{{-- <div class="container-page"> --}}
							{{-- <div class="col-md-8 col-md-offset-2"> --}}
								<form role="form"  action="{{ url('/applicant/view/users') }}" method="POST">
									{{ csrf_field() }} 
									<div class="col-lg-12 center-block">
										<h2 style="text-align: center;">User Information</h2>
										<div class="form-group">
											<label>First Name: </label>
											<input class="form-control" name="fname" required="required">
										</div>
										<div class="form-group">
											<label>Last Name</label>
											<input type="text" class="form-control" required="required"  name="lname">
										</div>

										<div class="form-group">
											<label>Phone Number</label>
											<input type="tel" class="form-control" required="required"  name="phonenumber">
										</div>

										<div class="form-group">
											<label>Privilege</label>
											<select class="form-control"  required="required" name="privilege">
												@foreach($roles as $role)
												<option value="{{ $role->slug }}">{{ $role->slug }}</option>
												@endforeach
											</select>
										</div>


										<div class="form-group">
											<button type="submit" class="btn btn-primary center-block">
												Save
											</button> 
										</div>
									</div>
								</form>
							{{-- </div> --}}
						{{-- </div> --}}
					</section>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection