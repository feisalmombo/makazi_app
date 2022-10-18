<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    
    <title>Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="../temp/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../temp/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../temp/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../temp/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../temp/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="margin-top: 10%;">
                <div class="panel panel-default"><!-- 
                    <div class="panel-heading text-center"><strong>Login</strong></div> -->
                    <div class="panel-body">
                       <img class="img-responsive center-block"  src="../temp/images/logo.png" alt="sorry" style="margin-bottom: 6%; margin-top: 2%;">
                       <form class="form-horizontal" method="POST" action="{{ url('/change_password') }}">
                        {{ csrf_field() }}
                        
							<h6 style="text-align: center;">@include('msgs.success')</h6>
                            <div class="form-group">
                                    <label class="col-md-4 control-label">Current Password</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="password" name="old_password" required="required">
                                </div>
                            </div>
							<div class="form-group">
								<label class="col-md-4 control-label">New Password</label>
                                <div class="col-md-6">
								    <input class="form-control" type="password" name="new_password" required="required">
								</div>
                            </div>
							<div class="form-group">
								<label class="col-md-4 control-label">Confirm New Password</label>
                                <div class="col-md-6">
									<input class="form-control" type="password" name="conf_password" required="required">
								</div>
                            </div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary center-block" value="Login">
									Change Password
								</button> 
							</div>
								
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
