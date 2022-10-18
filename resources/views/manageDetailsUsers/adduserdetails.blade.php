@extends('layouts.app')

@section('title', 'Add Details')

@section('content')
<div class="col-lg-12">
	<h1 class="page-header">Add Details</h1>
</div>

{{-- <div class="row"> --}}
{{-- <div class="col-lg-12"> --}}
    @include('msgs.success')
    {{-- <div class="panel panel-default"> --}}
        {{-- <div class="panel-heading">
            Add details<a href="#" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
        </div> --}}
        {{-- <div class="panel-body"> --}}
            {{-- <div class="container"> --}}
                {{-- <section class="container"> --}}
                    {{-- <div class="container-page"> --}}
                        {{-- <div class="col-sm-6"> --}}
                            {{-- Form here --}}
                            <div class="container-fluid">
                                <div class="stepwizard">
                                    <div class="stepwizard-row setup-panel">
                                        <div class="stepwizard-step col-xs-3"> 
                                            <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                                            <p><small>Profile Photo</small></p>
                                        </div>
                                        <div class="stepwizard-step col-xs-3"> 
                                            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                            <p><small>Address</small></p>
                                        </div>
                                        <div class="stepwizard-step col-xs-3"> 
                                            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                            <p><small>Personal Information</small></p>
                                        </div>
                                        <div class="stepwizard-step col-xs-3"> 
                                            <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                                            <p><small>Terms & Conditions</small></p>
                                        </div>
                                    </div>
                                </div>
                                
                                <form role="form" action="{{ url('/add/user/details') }}"  method="POST" enctype="multipart/form-data">

                                    {{ csrf_field() }}

                                    <div class="panel panel-primary setup-content" id="step-1">
                                        <div class="panel-heading">
                                             <h3 class="panel-title">Profile Photo</h3>
                                        </div>
                                        <div class="panel-body">
                                            <h1 style="color:#BE2434;">Profile Photo</h1>
                                            <p>Upload a clear picture of yourself to help in
                                                identifying you.</p>
                                                <br>
                                            <div class="form-group">
                                                <input type="file" name="profilephoto" required="required" class="form-control" />
                                            </div>
                                            <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                                        </div>
                                    </div>
                                    
                                    <div class="panel panel-primary setup-content" id="step-2">
                                        <div class="panel-heading">
                                             <h3 class="panel-title">Address</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group col-sm-4">
                                                <label class="control-label">Region</label>
                                                <input type="text" name="region" id="region" required="required" class="form-control" placeholder="Enter Region" />
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label class="control-label">Ward</label>
                                                <input type="text" name="ward" id="ward" required="required" class="form-control" placeholder="Enter Ward" />
                                            </div>
                                        </div>

                                        <div class="panel-body">
                                            <div class="form-group col-sm-3">
                                                <label class="control-label">District</label>
                                                <input type="text" name="district" id="district" required="required" class="form-control" placeholder="Enter District" />
                                            </div>
                                            {{-- <button class="btn btn-primary nextBtn pull-right" type="button">Next</button> --}}
                                        </div>

                                        <div class="panel-body">
                                            <div class="form-group col-sm-6">
                                                <label class="control-label">Street</label>
                                                <input type="text" name="street" id="street" required="required" class="form-control" placeholder="Enter Street" />
                                            </div>
                                        </div>

                                        <h2 style="text-align: center;color:#BE2434;">What type of business are you running?</h2>
                                        <div class="panel-body">
                                            <div class="form-group col-sm-4">
                                                <label class="control-label">Industry</label>
                                                <select class="form-control"  required="required" name="industry" id="industry">
                                                    <option value="">-- Select Industry name --</option>
                                                    @foreach($industries as $industry)
                                                    <option value="{{ $industry->id }}">{{ $industry->industry_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            
                                            <div class="form-group col-sm-4">
                                                <label class="control-label">Enrollment Date</label>
                                                <input type="date" name="enrollmentDate" id="enrollmentDate" required="required" class="form-control" />
                                            </div>
                                            <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                                        </div>

                                        {{-- <div class="panel-body">
                                            <div class="form-group">
                                                <label class="control-label">a</label>
                                                <textarea name="" id="" cols="30" rows="10"></textarea>
                                            </div>
                                            <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
                                        </div> --}}
                                    </div>
                                    
                                    
                                    <div class="panel panel-primary setup-content" id="step-3">
                                        <div class="panel-heading">
                                             <h3 class="panel-title">Personal Information</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group col-sm-4">
                                                <label class="control-label">Date of Birth</label>
                                                <input type="date" name="dob" id="dob" required="required" class="form-control" />
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label class="control-label">Sex</label>
                                                <select class="form-control"  required="required" name="sex" id="sex">
                                                    <option value="">-- Select Sex --</option>
                                                    @foreach($sexes as $sex)
                                                    <option value="{{ $sex->id }}">{{ $sex->sex_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="panel-body">
                                            <div class="form-group col-sm-4">
                                                <label class="control-label">ID / Passport Number</label>
                                                <input type="text" name="idnumber" id="idnumber" required="required" class="form-control" placeholder="Enter ID" />
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label class="control-label">TIN</label>
                                                <input type="text" name="tinnumber" id="tinnumber" required="required" class="form-control" placeholder="Enter TIN" />
                                            </div>
                                        </div>

                                        <div class="panel-body">
                                            <div class="form-group col-sm-4">
                                                <label class="control-label">Marital Status</label>
                                                <select class="form-control"  required="required" name="maritalstatus" id="maritalstatus">
                                                    <option value="">-- Select Marital Status --</option>
                                                    @foreach($maritalstatuses as $maritalstatus)
                                                    <option value="{{ $maritalstatus->id }}">{{ $maritalstatus->maritalstatus_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="panel-body">
                                            <div class="form-group col-sm-4">
                                                <label class="control-label">Number of Dependants</label>
                                                <select class="form-control"  required="required" name="dependents" id="dependents">
                                                    <option value="">-- Select Dependents --</option>
                                                    @foreach($dependants as $dependant)
                                                    <option value="{{ $dependant->id }}">{{ $dependant->dependant_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label class="control-label">Home Ownership Status</label>
                                                <select class="form-control"  required="required" name="ownerstatus" id="ownerstatus">
                                                    <option value="">-- Select Ownership Status --</option>
                                                    @foreach($ownershipStatuses as $ownershipStatus)
                                                    <option value="{{ $ownershipStatus->id }}">{{ $ownershipStatus->ownershipstatus_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>

                                        </div>
                                    </div>
                                    
                                    <div class="panel panel-primary setup-content" id="step-4">
                                        <div class="panel-heading">
                                             <h3 class="panel-title">Terms & Conditions</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="control-label" style="color:#BE2434">Terms and Conditions</label>
                                                <p>Read the terms and conditions below and sign accordingly.</p>
                                                <br>
                                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                                                    At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor
                                                    sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et
                                                    accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                                                    At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor
                                                    sit amet, consetetur sadipscing.
                                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                                                    At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor</p>
                                            </div>
                                           
                                            <div class="form-group col-sm-4">
                                                <input type="checkbox" name="terms" id="terms" value="check" required="required" style="color: black;" /> I agree to the terms and conditions set above</p>
                                            </div>
                                             <button class="btn btn-success pull-right" type="submit">Finish!</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        {{-- </div> --}}
                    {{-- </div> --}}
                {{-- </section> --}}
            {{-- </div> --}}
        {{-- </div> --}}
    {{-- </div> --}}
{{-- </div> --}}
{{-- </div> --}}


@endsection
