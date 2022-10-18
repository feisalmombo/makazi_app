<!DOCTYPE html>
<html lang="en">
<head>
  <title>Step Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('register/maincss/main.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('register/js/steps.js') }}"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		@include('msgs.success')

		<hr>
		<div class="stepwizard col-md-offset-3">
			<div class="stepwizard-row setup-panel">
			  <div class="stepwizard-step">
				<a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
				<p>Registration</p>
			  </div>
			  <div class="stepwizard-step">
				<a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
				<p>Profile Photo</p>
			  </div>
			  <div class="stepwizard-step">
				<a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
				<p>Address</p>
			  </div>
			  <div class="stepwizard-step">
				<a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
				<p>Personal Information</p>
			  </div>
			  <div class="stepwizard-step">
				<a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
				<p>Membership</p>
			  </div>
			  <div class="stepwizard-step">
				<a href="#step-6" type="button" class="btn btn-default btn-circle" disabled="disabled">6</a>
				<p>Tems & Conditions</p>
			  </div>
			</div>
		</div>
		  
		<form role="form" action="" action="{{ url('/user/auth/registration_user') }}"  method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="row setup-content" id="step-1">
			  <div class="col-xs-6 col-md-offset-3">
				<div class="col-md-12">
				  <h3 style="color:#BE2434;"> Register Here</h3>
				  <br>
				  <div class="form-group ">
					<label class="control-label">First Name</label>
					<input maxlength="100" type="text" name="firstname" id="firstname" required="required" class="form-control" placeholder="E.g: Kianga">
				  </div>
				  <div class="form-group">
					<label class="control-label">Last Name</label>
					<input maxlength="100" type="text" name="lastname" id="lastname" required="required" class="form-control" placeholder="E.g: Ally">
				  </div>
				  <div class="form-group">
					<label class="control-label">Email</label>
					<input type="email" name="email" id="email" class="form-control" placeholder="E.g: kianga@gmail.com" required>
				  </div>
				  <div class="form-group">
					<label class="control-label">Phone Number</label>
					<input type="tel" name="phonenumber" id="phonenumber" class="form-control" placeholder="E.g: +255684901247" required>
				  </div>
				  <div class="form-group">
					<label class="control-label">Password</label>
					<input type="password" name="password" id="password" class="form-control" placeholder="E.g: ********" required>
				  </div>
				  <div class="form-group">
					<label class="control-label">Confirm Password</label>
					<input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="E.g: ********" required>
				  </div>
				  <button class="btn btn-primary nextBtn btn-xs pull-right" type="button">Next</button>
				  <br>
				</div>
			  </div>
			</div>
			<div class="row setup-content" id="step-2">
			  <div class="col-xs-6 col-md-offset-3">
				<div class="col-md-12">
				  <h3 style="color:#BE2434;"> Profile Photo</h3>
				  <br>
				  <div class="form-group">
					<label class="control-label">Upload photo</label>
					<input type="file" name="profilephoto" id="profilephoto" class="form-control" placeholder="Enter profile photo" required="required">
				  </div>
				  <button class="btn btn-primary prevBtn btn-xs pull-left" type="button">Previous</button>
				  <button class="btn btn-primary nextBtn btn-xs pull-right" type="button">Next</button>
				</div>
			  </div>
			</div>
			<div class="row setup-content" id="step-3">
				<div class="col-xs-6 col-md-offset-3">
				  <div class="col-md-12">
					<h3 style="color:#BE2434;"> Physical Address</h3>
					<br>
					<div class="form-group">
					   <label class="control-label">Region</label>
					    <select class="form-control" name="region_id" id="region" required="required" >
						<option value="" selected disabled>Select Region</option>
							@foreach($regions as $key => $region)
							<option value="{{$key}}"> {{$region}}</option>
							@endforeach
					    </select>
					</div>
					<div class="form-group">
					  <label class="control-label">District</label>
					  <select name="district" id="district" class="form-control" required="required" >
					  </select>
					</div>
					<div class="form-group">
					  <label class="control-label">Ward</label>
					  <select name="ward" id="ward" class="form-control" required="required" >
					  </select>
					</div>
					<div class="form-group">
					  <label class="control-label">Street</label>
					  <input maxlength="200" type="text" name="street" id="street" required="required" class="form-control" placeholder="E.g: Mzimuni">
					</div>
					<h4 style="text-align: center;color:#BE2434;">What type of business are you running?</h4>
					<div class="form-group">
					  <label class="control-label">Industry</label>
					  <select class="form-control"  required="required" name="industry" id="industry">
						<option value="">-- Select Industry name --</option>
						@foreach($industries as $industry)
						<option value="{{ $industry->id }}">{{ $industry->industry_name }}</option>
						@endforeach
					  </select>
					</div>
					<div class="form-group">
					  <label class="control-label">Enrollment Date</label>
					  <input maxlength="200" type="date" name="enrollmentDate" id="enrollmentDate" required="required" class="form-control">
					</div>
					<button class="btn btn-primary prevBtn btn-xs pull-left" type="button">Previous</button>
					<button class="btn btn-primary nextBtn btn-xs pull-right" type="button">Next</button>
				  </div>
				</div>
			  </div>
			  <div class="row setup-content" id="step-4">
				<div class="col-xs-6 col-md-offset-3">
				  <div class="col-md-12">
					<h3 style="color:#BE2434;"> Personal Information</h3>
					<div class="form-group">
					  <label class="control-label">Date of Birth</label>
					  <input maxlength="200" type="date" name="dob" id="dob" required="required" class="form-control" placeholder="Date of Birth">
					</div>
					<div class="form-group">
					  <label class="control-label">Sex</label>
					  <select class="form-control"  required="required" name="sex" id="sex">
						<option value="">-- Select Sex --</option>
							@foreach($sexes as $sex)
							<option value="{{ $sex->id }}">{{ $sex->sex_name }}</option>
							@endforeach
					  </select>
					</div>
					<div class="form-group">
					  <label class="control-label">ID / Passport Number</label>
					  <input maxlength="200" type="text" name="idnumber" id="idnumber" required="required" class="form-control" placeholder="E.g: 19038449089092">
					</div>
					<div class="form-group">
					  <label class="control-label">TIN</label>
					  <input maxlength="200" type="text" name="tinnumber" id="tinnumber" required="required" class="form-control" placeholder="E.g: 909234002">
					</div>
					<div class="form-group">
					  <label class="control-label">Marital Status</label>
					  <select class="form-control"  required="required" name="maritalstatus" id="maritalstatus">
						<option value="">-- Select Marital Status --</option>
						@foreach($maritalstatuses as $maritalstatus)
						<option value="{{ $maritalstatus->id }}">{{ $maritalstatus->maritalstatus_name }}</option>
						@endforeach
					  </select>
					</div>
					<div class="form-group">
					  <label class="control-label">Number of Dependants</label>
					  <select class="form-control"  required="required" name="dependents" id="dependents">
						<option value="">-- Select Dependents --</option>
						@foreach($dependants as $dependant)
						<option value="{{ $dependant->id }}">{{ $dependant->dependant_name }}</option>
						@endforeach
					  </select>
					</div>
					<div class="form-group">
					  <label class="control-label">Home Ownership Status</label>
					  <select class="form-control"  required="required" name="ownerstatus" id="ownerstatus">
						<option value="">-- Select Ownership Status --</option>
							@foreach($ownershipStatuses as $ownershipStatus)
							<option value="{{ $ownershipStatus->id }}">{{ $ownershipStatus->ownershipstatus_name }}</option>
							@endforeach
					  </select>
					</div>
					<button class="btn btn-primary prevBtn btn-xs pull-left" type="button">Previous</button>
					<button class="btn btn-primary nextBtn btn-xs pull-right" type="button">Next</button>
				  </div>
				</div>
			  </div>
			  <div class="row setup-content" id="step-5">
				<div class="col-xs-6 col-md-offset-3">
				  <div class="col-md-12">
					<h3 style="color:#BE2434;"> Membership</h3>
					<br>
					<div class="form-group">
					  <select class="form-control"  required name="membership" id="membership">
						<option value="">-- Select Membership Type --</option>
						@foreach($memberships as $membership)
						<option value="{{ $membership->id }}">{{ $membership->membership_name }}</option>
						@endforeach
					  </select>
					</div>
					<button class="btn btn-primary prevBtn btn-xs pull-left" type="button">Previous</button>
					<button class="btn btn-primary nextBtn btn-xs pull-right" type="button">Next</button>
				  </div>
				</div>
			  </div>
			<div class="row setup-content" id="step-6">
			  <div class="col-xs-6 col-md-offset-3">
				<div class="col-md-12">
				  <h3 style="color:#BE2434;"> Terms & Conditions</h3>
				  <br>
				  <div class="form-group">
					<!-- <div class="container-fluid"> -->
					  <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
						At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor
						sit amet, consetetur sadipscing elitr, sed diam.
					  </p>
					<!-- </div> -->
					<div class="form-group">
					  <input type="checkbox" name="terms" id="terms" value="check" required="required" style="color: black;" /> I agree to the terms and conditions set above</p>
					</div>
				  </div>
				  <button class="btn btn-primary prevBtn btn-xs pull-left" type="button">Previous</button>
				  <button class="btn btn-success btn-xs pull-right" type="submit">Submit</button>
				</div>
			  </div>
			</div>
		</form>
		<hr>
		<div class="" style="text-align: center">
			Have an account? <a href="{{ route('login') }}" class="ml-2" style="color:#BE2434">Login here</a>
		</div>
		<br>
		<br>
	</div>
</body>


<script src="{{ asset('register/js/dropdown.js') }}"></script>
</html>
