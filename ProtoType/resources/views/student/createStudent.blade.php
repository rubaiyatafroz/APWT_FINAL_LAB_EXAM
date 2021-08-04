<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Project</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	 
	 	<div style="padding: 50px">
	 <h1>Create stduent:</h1> 
	 
	 <form method="post" enctype="multipart/form-data"> 
	  @csrf
	 <input type="hidden" name="_token" value="{{csrf_token()}}">
	  <table>
		<tr>
			<td>Username</td>
			<td><input type="text" name="username" value="{{old('username')}}"></td>
		</tr>
		<tr>
			<td>Full name </td>
			<td><input type="text" name="fullname" value="{{old('fullname')}}"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="text"  name="password" value="{{old('password')}}"></td>
		</tr>
		<tr>
			<td>email</td>
			<td><input type="text" name="email" value="{{old('email')}}"></td>
		</tr>
		<tr>
			<td>DOB</td>
			<td><input type="date" name="dob" value="{{old('dob')}}"></td>
		</tr>
        <tr>
			<td>Address</td>
			<td><input type="text" name="address" value="{{old('address')}}"></td>
		</tr>
        <tr>
			<td>Country</td>
			<td><input type="text" name="country" value="{{old('country')}}"></td>
		</tr>
        <tr>
			<td>P_num</td>
			<td><input type="text" name="p_num" value="{{old('p_num')}}"></td>
		</tr>
		<tr>
			<td>C_id</td>
			<td><input type="text" name="c_id" value="{{old('c_id')}}"></td>
		</tr>
		<tr>
			<td></td>
			<td>
			<input class="btn" type="submit" name="Submit" value="Insert Student">
			</td>
		</tr>
	</table>
	</form><hr>
	@foreach($errors->all() as $err)
		{{$err}} <br>
	@endforeach
</body>
</div>
</div>
<div class="container">
  <div class="row">
    @foreach($students as $student)
    <div class="padding" style="padding: 10px">
	<div class="card" style="width: 18rem;" >
    <div class="card-body">
    <h5 class="card-title">{{$student['username']}}</h5>
    <p class="card-text">{{$student['fullname']}}</p>
    <p class="card-text">{{$student['p_num']}}</p> 
    <a class="btn" href="/student/details/{{$student['id']}}">Details</a>
	<a class="btn" href="/student/edit/{{$student['id']}}">Edit</a>
    <a class="btn btn-danger" href="/student/delete/{{$student['id']}}">Delete</a> 
  </div>
</div>
</div>
 @endforeach
  </div>
</div>
 </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>