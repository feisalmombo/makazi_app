@extends('layouts.app')

@section('title', 'Add Region, District, Ward')

@section('content')
<div class="col-lg-12">
	<h1 class="page-header">Add Region, District, Ward</h1>
</div>

<div class="row">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
				Create RDW<a href="{{ url('/dropdownlist') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid">
					<section class="col-md-8 col-md-offset-2">
								<form role="form"  action="{{ url('/dropdownlist') }}" method="POST">
									{{ csrf_field() }} 
									<div class="col-lg-12 center-block">
										<h2 style="text-align: center;">Add RDW</h2>

										<div class="form-group">
											<label>Region</label>
											<select class="form-control" name="region_id" id="region" required="required" >
												<option value="" selected disabled>Select Region</option>
                                                    @foreach($regions as $key => $region)
                                                    <option value="{{$key}}"> {{$region}}</option>
                                                    @endforeach
											</select>
                                        </div>
                                        
                                        <div class="form-group">
											<label>District</label>
                                            
                                            <select name="district" id="district" class="form-control" required="required" >
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
											<label>Ward</label>
                                            
                                            <select name="ward" id="ward" class="form-control" required="required" >
                                            </select>
										</div>


										<div class="form-group">
											<button type="submit" class="btn btn-primary center-block" disabled>
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