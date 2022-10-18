@extends('layouts.app')

@section('title', 'User System Profile')

@section('content')
<div class="col-lg-12">
	<h1 class="page-header">User System Profile</h1>
</div>

<div class="row">
	<div class="col-lg-12">
		@include('msgs.success')
		<div class="panel panel-default">
			<div class="panel-heading">
				User System Profile<a href="{{ url('/home') }}" class="col-2 pull-right" style="text-decoration: none;"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
			</div>
			<div class="panel-body">
				<div class="container-fluid">
					<section class="col-md-8 col-md-offset-2">
                                @foreach ($systemUserProfiles as $systemUserProfile)
                                    
                                @endforeach
                                
                            <div class="panel-body">
                                    <form  class="form-horizontal " role="form">

                                        {{-- <div class="form-group">
                                            <span style="font-size:30px; color: white"; class="">
                                                <img src="{{ asset('storage/' .$userProfile->profile_photo_path) }}" alt="Profile Photo" style="border-radius:50%;width:200px">
                                            </span>
                                        </div> --}}


                                        <div class="form-group">
                                            <a href="{{ url('/user/auth/registration_user/'.$systemUserProfile->id.'/edit') }}" class="btn btn-primary" style="float: right">EDIT</a>
                                        </div>

                                        <div class="form-group">
                                            <label>Name:</label>
                                        <p>{{ $systemUserProfile->first_name }} {{ $systemUserProfile->last_name}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <p>{{ $systemUserProfile->email }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone Number:</label>
                                            <p>{{ $systemUserProfile->phone_number }}</p>
                                        </div>
                        
                                        <div class="form-group">
                                            <label>Role:</label>
                                            <p>{{ $systemUserProfile->slug }}</p>
                                        </div>
                        
                                        <div class="form-group">
                                            <label>Created at:</label>
                                            <p>{{date("F jS, Y", strtotime($systemUserProfile->created_at))}}</p>
                                        </div>
                                    </form>
                                </div>
                            </div>
					</section>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection