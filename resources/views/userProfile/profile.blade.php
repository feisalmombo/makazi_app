@extends('layouts.app')

@section('title', 'Customer Profile')

@section('content')
<div class="col-lg-12">
	<h1 class="page-header">Customer Profile</h1>
</div>

<div class="row">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
				My Profile<a href="{{ url('/home') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid">
					<section class="col-md-8 col-md-offset-2">
						
							
                                @foreach ($userProfiles as $userProfile)
                                    
                                @endforeach
                                
                            

                            <div class="container-fluid">
                                 
                                    <div class='panel-body' ><center><input type='image' src="{{ asset('storage/' .$userProfile->profile_photo_path) }}"  style='width:130px;height:180px;overflow:none;border-radius:50%' value=''></center></td></tr><td width = 100px;><center></center></td></tr></table>
                                    </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-success">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Personal Information</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name:</label>
                                                <p>{{ $userProfile->first_name }} {{ $userProfile->last_name}}</p>
                                            </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Date of Birth:</label>
                                                    <p>{{ $userProfile->date_of_birth }}</p>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>NIDA Number:</label>
                                                    <p>{{ $userProfile->national_identity_number }} </p>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>TIN Number:</label>
                                                    <p>{{ $userProfile->tin_number }} </p>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Sex:</label>
                                                    <p>{{ $userProfile->sex_name }} </p>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Marital Status:</label>
                                                    <p>{{ $userProfile->maritalstatus_name }} </p>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Number of Dependants:</label>
                                                    <p>{{ $userProfile->dependant_name }} </p>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Home Ownership Status:</label>
                                                    <p>{{ $userProfile->ownershipstatus_name }} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Physical Address</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Region:</label>
                                                    <p>{{ $userProfile->region_name }} </p>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>District:</label>
                                                    <p>{{ $userProfile->district_name}} </p>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Ward:</label>
                                                    <p>{{ $userProfile->ward_name }} </p>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Street:</label>
                                                    <p>{{ $userProfile->street }} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-danger">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">What type of business
                                                are you running?</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Industry:</label>
                                                    <p>{{ $userProfile->industry_name }} </p>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Enrollment Date:</label>
                                                    <p>{{ $userProfile->enrollment_date }} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            </div>
					</section>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection