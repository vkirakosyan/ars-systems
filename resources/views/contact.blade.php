@include('layouts.header')
<link rel="stylesheet" type="text/css" href="{{URL('css/fontawesome-all.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('css/navbar.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('css/footer.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('css/info.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('css/contact.css')}}">
</head>
<body>
@include('layouts.info')
@include('layouts.navbar')
<div class="container-fluid contact">
	<div class="container">
		@if(isset($success) && !is_null($success))
			<div class="alert alert-success alert-dismissable alert-margin-top">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			Your message was sent <strong>successfully!</strong>.
			</div>
		@endif
		<header>
			<h1>Contact Us</h1>
			<p class="light-text">We provide the service to everyone personally that we would like to experience ourselves.
			So choose the best way for you to get in touch with us. We'd <img src="{{URL('images/Media/sirtik.png')}}" class="heart-icon"/> to help.</p>
		</header>
		<div class="contact-info-card pt-5 pb-5">
			<div class="col-sm-12 pl-5">
				<div class="col-sm-6 animated text-column mx-auto">
					<p>
						<i class="fa-icon-animated fas fa-map-marker-alt map-icon"></i>
						Amiryan 4/6<br>
						0010, Yerevan, Armenia
					</p>				
				</div>
				<div class="col-sm-6 animated text-column mx-auto mt-5">
					<p><i class="fa-icon-animated distance fas fa-phone reverse"></i>+374 93 50 00 16<br>
					<i class="fa-icon-animated distance fas fa-envelope"></i>info@arssystems.am<br>
					<i class="fa-icon-animated distance fas fa-clock"></i>09:00 - 19:00</p>
				</div>
			</div>
		</div>
		<div class="contact-form-map pt-5 pb-5">
			<div class="row">
				<div class="col-sm-6 col-12 contact-form">
					<form action="contact" method="POST">
						<div class="form-group row">
							<div class="col-sm-6 col-12">
								<input type="text" class="form-control" name="name" placeholder="Name" required>
							</div>
							<div class="col-sm-6 col-12">
								<input type="email" class="form-control" name="email" placeholder="E-mail" required>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								<input type="text" class="form-control" name="subject" placeholder="Subject" required>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								<textarea rows="8" class="form-control" name="text" placeholder="Text" required ></textarea>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-lg-9 col-md-8"></div>
							<div class="col-lg-3 col-md-4 col-sm-12">
								<button class="form-control send-button" type="submit">Send</button>
							</div>
						</div>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">						
					</form>
				</div>
				<div class="col-sm-6 col-12 map-social-media">
					<div id="map"></div>
					<div class="social-media-icons">
						<div class="diamond">
							<img src="{{URL('images/Media/facebook.svg')}}" data-link="https://www.facebook.com/ars.systems5/" class="icon facebook">
						</div>
						<div class="diamond">
							<img src="{{URL('images/Media/youtube.png')}}" data-link="https://www.youtube.com/channel/UCiSO71HSRBTlGhPsSHeSB9Q/videos?view_as=subscriber" class="icon youtube">							
						</div>
						<div class="diamond">
							<img src="{{URL('images/Media/twitter.png')}}" data-link="https://twitter.com/arssystemsit" class="icon twitter">							
						</div>
						<div class="diamond">
							<img src="{{URL('images/Media/linkedin.png')}}" data-link="https://www.linkedin.com/in/ars-systems-270461124/" class="icon linkedin">
						</div>
						<div class="diamond">
							<img src="{{URL('images/Media/googleplus.png')}}" data-link="https://www.plus.google.com/" class="icon google">
						</div>
					</div>
				</div>
			</div>				
		</div>			
	</div>
</div>
<script type="text/javascript" src="{{URL('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{URL('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{URL('js/scrollreveal.min.js')}}"></script>
<script type="text/javascript" src="{{URL('js/navbar.js')}}"></script>
<script type="text/javascript" src="{{URL('js/contact.js')}}"></script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoxO7xzcP7R1W1fGxp2ysJ-DXpDH1wLhk&callback=initMap">
</script>
@include('layouts.footer')