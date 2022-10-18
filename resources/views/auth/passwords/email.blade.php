
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html>
    
<head>
	<title>Reset Password</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/style-login.css')}}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>

<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">

				@include('msgs.success')
				@if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                @endif


				<div class="d-flex justify-content-center form_container">
					
					<form method="POST" action="{{ route('password.email') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="input-group mb-3">
							<div class="input-group-append {{ $errors->has('email') ? ' has-error' : '' }}">
								<span class="input-group-text"><i class="fas fa-envelope"></i></span>
							</div>
							<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Email">


						</div>
						<button type="submit" class="btn login_btn" style="border-radius: 90px;">
							Send Password Reset Link
						</button>
						<br>
						<br>
						<!-- <button class="btn login_btn" style="border-radius: 90px;">
						<a href="{{ url('/') }}" style="text-decoration: none; color:white;">Home</a></button> -->
						<div class="d-flex justify-content-center mt-3 login_container">
					</div>
					</form>
				</div>

			</div>
		</div>
	</div>
</body>
</html>