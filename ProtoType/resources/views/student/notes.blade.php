<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   Student Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="/demo/demo.css" rel="stylesheet" />
</head>
<body>

<form method="post" enctype="multipart/form-data"> 
	 @csrf
	 <input type="hidden" name="_token" value="{{csrf_token()}}">
	<table>
	
		<tr>
			<td>Notes</td>
			<td><input type="file" name="filename" value="{{old('filename')}}"></td>
		</tr>
	
			<td>
			<input class="btn btn-outline-success" type="submit" name="Submit" value="Upload">
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
    @foreach($notes as $note)
    <div class="padding" style="padding: 10px">
	<div class="card" style="width: 18rem;" >
  <iframe  class="card-img-top" src="{{('/protfolio_img/'.$note['filename'])}}" height="150px" width="30px;" alt="Card image cap">
  </iframe>
</div>
</div>
@endforeach
  </div>
</div>
 </div>

</div>
</div>
</body>
</html>