<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Users Report</title>
	<style type="text/css" media="screen">
	table{
		border: 1px solid;
		border-collapse: collapse;
		width: 100%;
		margin: 0 auto;
		text-align: left;
	}
	tr th{
		background: #eee;
		border: 1px solid;
		padding-left: 10px;

	}
	tr td{
		border: 1px solid;
		padding-left: 10px;
	}
	caption{
		text-align: center;
	}
</style>
</head>
<body>
	<div style="text-align: center;">
		<img class="img-responsive"  src="" alt="sorry" width="200" >

		<p style="text-align: center;"><b>GETPESA PLC</b></p>

		<div class="text-center" style="text-align: center">
			<caption>USERS REPORT</caption>
		</div>
	</div>
	<br>
	<div class="panel-body">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>S/N</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Phone Number</th>
					<th>Privilege</th>
				</tr>
			</thead>
			<tbody>
				@foreach($userData as $key=>$userDatas)
				<tr>
					<td>{{ $key + 1 }}</td>
					<td>{{ $userDatas->first_name }}</td>
					<td>{{ $userDatas->last_name }}</td>
					<td>{{ $userDatas->email }}</td>
					<td>{{ $userDatas->phone_number }}</td>
					<td>{{ $userDatas->slug  }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>
</body>
</html>
