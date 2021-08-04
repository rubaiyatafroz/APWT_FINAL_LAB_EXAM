<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contact</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<h2>Contact</h2>
	<form class="form-control" method="post" enctype="multipart/form-data">
	@csrf
	<table>
	    <input type="hidden" name="_token" value="{{csrf_token()}}">
		<tr>
			<td>U_id</td>
			<td><input type="text" name="u_id" value="{{old('u_id')}}"></td>
		</tr>
		<tr>
			<td>Student_id</td>
			<td><input type="text" name="student_id" value="{{old('student_id')}}"></td>
		</tr>
		<tr>
			<td>message</td>
			<td><input type="text" name="message" value="{{old('message')}}"></td>
		</tr>
       <tr>
			<td></td>
			<td><input type="submit" value="submit"></td>
		</tr>
	</table>
	</form>
    @foreach($errors->all() as $err)
		{{$err}} <br>
	@endforeach
	<div class="container">
  <div class="row">
    @foreach($contracts as $contract)
    <div class="padding" style="padding: 10px">
	<div class="card" style="width: 18rem;" >
    <div class="card-body">
    <h5 class="card-title"><lebel>U_id: </lebel>{{$contract['u_id']}}</h5>
	<p class="card-text"><lebel>Student_id: </lebel>{{$contract['student_id']}}</p>
    <p class="card-text"><lebel>Message: </lebel>{{$contract['message']}}</p>
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