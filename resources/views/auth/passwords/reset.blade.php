
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

				<div class="d-flex justify-content-center form_container">
					<form method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">
						<br>

						<div class="input-group mb-3">
							<div class="input-group-append {{ $errors->has('email') ? ' has-error' : '' }}">
								<span class="input-group-text"><i class="fas fa-envelope"></i></span>
							</div>
                            <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus placeholder="Old Email">
								
						</div>
						<div class="input-group mb-2" id="show_hide_password">
							<div class="input-group-append {{ $errors->has('password') ? ' has-error' : '' }}">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
                            <input id="inputPassword" type="password" class="form-control" name="password" required placeholder="New Password">
							
							<div class="input-group-append" id="show_hide_password">
								<span class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
							</div>
                        </div>
                        <div class="input-group mb-2" id="show_hide_confirm_password">
							<div class="input-group-append {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
                            
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm New Password">
							
							<div class="input-group-append" id="show_hide_confirm_password">
								<span class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
							</div>
                        </div>
                        <br>
						<button type="submit" name="button" class="btn login_btn" style="border-radius: 90px;">Reset Password</button>
						<br>
						
					</div>
					</form>
                </div>
                
			</div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">	
    $(document).ready(function() {
        $("#show_hide_password span").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_password input').attr("type") == "text"){
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass( "fa-eye-slash" );
                $('#show_hide_password i').removeClass( "fa-eye" );
            }else if($('#show_hide_password input').attr("type") == "password"){
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass( "fa-eye-slash" );
                $('#show_hide_password i').addClass( "fa-eye" );
            }
        });

        $("#show_hide_confirm_password span").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_confirm_password input').attr("type") == "text"){
                $('#show_hide_confirm_password input').attr('type', 'password');
                $('#show_hide_confirm_password i').addClass( "fa-eye-slash" );
                $('#show_hide_confirm_password i').removeClass( "fa-eye" );
            }else if($('#show_hide_confirm_password input').attr("type") == "password"){
                $('#show_hide_confirm_password input').attr('type', 'text');
                $('#show_hide_confirm_password i').removeClass( "fa-eye-slash" );
                $('#show_hide_confirm_password i').addClass( "fa-eye" );
            }
        });
    });
</script>