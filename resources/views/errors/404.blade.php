<!DOCTYPE html>
<html>
<head>
	<title>Page Not Found</title>
	<link href='https://fonts.googleapis.com/css?family=Assistant' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href='{{URL("css/app.css")}}'>
	<link rel="stylesheet" type="text/css" href='{{URL("css/error.css")}}'>
</head>
<body>
	<div class="container">
	<div class="row">
			<div class="col-6">
				<p>OOPS!</p>
				<h4>The page you're looking for is not found.</h4>
				<h5>Useful links</h5>
				<ul>
	                <li>
	                    <a href="{{URL::to('team')}}">Our team</a>
	                </li>
	                <li>
	                  <a href="{{URL::to('services')}}">Our services</a>
	                </li>
	                <li>
	                  <a href="{{URL::to('contact')}}">Contact Us</a>
	                </li>
	                <li>
	                    <a href="{{URL::to('outsourcing')}}">Outsourcing</a>
	                </li>
					<li>
	                    <a href="{{URL::to('career')}}">Career</a>
	                </li>
	            </ul>
			</div>
			<div class="col-6">
				<div class="logo">
					<img src="{{URL('images/Media/logo.png')}}" width="500" height="500">
				</div>
			</div>
		</div>
	</div>
</body>
</html>
