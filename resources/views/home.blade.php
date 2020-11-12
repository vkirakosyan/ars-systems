@include('layouts.header')
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{URL('css/jquery-carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('css/owl.carousel.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('css/owl.theme.default.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('css/navbar.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('css/footer.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('css/info.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('css/home.css')}}">
</head>
<body>
@include('layouts.info')
@include('layouts.navbar')
<div class="container-fluid mainpage p-0">
	<div class="container-fluid background-pic main-pic pt-5 pb-5">
		<div class="green-panel mx-auto">
			<span class="text-white text-center text-capitalize position-relative">We make technology work</span>	
		</div>
		<img src="{{URL('images/Media/arrow.png')}}" class="arrow" alt="arrow">
	</div>
	<div class="container-fluid content">
		<div class="row">
			<div class="col-md-8 col-sm-6 col-12">
				<p class="text-center mx-auto big-text animated">
					We are a web development and software solution company<br>
					located in Yerevan,Armenia. We provide high quality and professional services to our clients.<br>
					We are striving to create just the right website for each client<br>
					by designing and hosting websites. Besides,we undertake<br>
					graphic designing, logo designing, etc.<br>
					We work with customers all around the world. Our clients know<br>
					they can trust us for quality work and excellent support.<br>
					Just tell us what you need!<br>
					Our professional and talented team can help you every<br>
					interesting and unique idea come to life.We appreciate your<br>
					every order and wait for your support!<br>
					Interested?So, let's try!
				</p>
			</div>
			<div class="col-md-4 col-sm-6 col-12 background-pic first-row-pic"></div>									
		</div>
		<div class="row">
			<div class="col-md-4 col-sm-6 col-12 text-center pr-0 pl-0">
				<div class="grid">
					<figure class="anim">
						<img src="{{URL('images/Media/services-home.jpg')}}" alt="Services">
						<figcaption>
							<h2 class="background-pic link-icon services-icon"></h2>
							<h2 class="text-white">Services</h2>
							<a href="{{URL::to('services')}}">Services</a>
						</figcaption>
					</figure>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-12 text-center pr-0 pl-0">
				<div class="grid">
					<figure class="anim">
						<img src="{{URL('images/Media/team-home.jpg')}}" alt="Our Team">
						<figcaption>
							<h2 class="ourteam-h2 background-pic link-icon ourteam-icon"></h2>
							<h2 class="ourteam-h2 text-white">Our Team</h2>
							<a href="{{URL::to('team')}}">Our Team</a>
						</figcaption>
					</figure>				
				</div>
			</div>
			<div class="col-md-4 col-sm-12 col-12">
				<p class="text-center mx-auto small-text animated">
					We will work with you and bring your idea to life.<br>
					We are here to help you build your website. <br>
					We work with you and for you. <br>
					So let's start!
				</p>
			</div>			
		</div>
		<div class="row">
			<div class="col-md-4 col-sm-6 col-12 text-center pr-0 pl-0">
				<div class="grid">
					<figure class="anim">
						<img src="{{URL('images/Media/outsourcing-home.jpg')}}" alt="Outsourcing">
						<figcaption>
							<h2 class="outsourcing-h2 background-pic link-icon outsourcing-icon"></h2>
							<h2 class="outsourcing-h2-text text-white">Outsourcing</h2>
							<a href="{{URL::to('outsourcing')}}">Outsourcing</a>
						</figcaption>
					</figure>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-12 text-center pr-0 pl-0">
				<div class="grid">
					<figure class="anim">
						<img src="{{URL('images/Media/career.jpg')}}" alt="Career">
						<figcaption>
							<h2 class="career-h2 background-pic link-icon career-icon"></h2>
							<h2 class="career-h2-text text-white">Career</h2>
							<a href="{{URL::to('career')}}">Career</a>
						</figcaption>
					</figure>
				</div>
			</div>
			<div class="col-md-4 col-sm-12 col-12 text-center pr-0 pl-0">
				<div class="grid">
					<figure class="anim">
						<img src="{{URL('images/Media/contactus-home.jpg')}}" alt="Contact Us">
						<figcaption>
							<h2 class="contactus-h2 background-pic link-icon contactus-icon"></h2>
							<h2 class="contactus-h2-text text-white">Contact Us</h2>
							<a href="{{URL::to('contact')}}">Contact Us</a>
						</figcaption>
					</figure>
				</div>
			</div>			
		</div>
	</div>
	<h1 class="text-center pb-3 pt-5 underlined-text">Our Works</h1>
	<div class="container portfolio mt-5">
		<div class="w-100">
			<div class="mt-5 mx-auto carousel3d" data-carousel-3d>
				@forelse($portfolio as $item)
					<img class="img-adjusted" src='{{ URL("images/Portfolio/$item->img") }}' alt="{{ $item->title }}" data-client-url="{{ $item->url }}" />
					@empty
						<p>Nothing to show yet</p>
				@endforelse
			</div>
		</div>
	</div>
	<h1 class="text-center pt-5 pb-3 underlined-text meet-us">Meet us on YouTube</h1>
	<div class="container-fluid on-youtube text-white pt-5">
		<div class="row">
			<div class="col-sm-6 col-12">
				<div class="owl-carousel owl-theme">
					@forelse($videos as $video)
						<div class="item-video" data-merge={{ rand(1,3) }}>
							<a class="owl-video" href="https://www.youtube.com/watch?v={{ $video->youtube_id }}"></a>
						</div>
						@empty
							<h1 class="text-center pt-4 pb-2">We don't have YouTube content yet</h1>
					@endforelse
				</div>
			</div>
			<div class="col-sm-6 col-12">
				<p class="text-center youtube-text animated">
				You can find interesting and informative videos and news on our youtube channel.<br>
				Visit and learn more about our company.<br>
				Feel free to check out our videos.
				</p>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="{{URL('js/jquery-1.12.1.min.js')}}"></script>
<script type="text/javascript" src="{{URL('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{URL('js/scrollreveal.min.js')}}"></script>
<script type="text/javascript" src="{{URL('js/owl.carousel.js')}}"></script>
<script type="text/javascript" src="{{URL('js/jquery.resize.ex.js')}}"></script>
<script type="text/javascript" src="{{URL('js/waitforimages.js')}}"></script>
<script type="text/javascript" src="{{URL('js/modernizr.min.js')}}"></script>
<script type="text/javascript" src="{{URL('js/jquery.carousel-3d.min.js')}}"></script>
<script type="text/javascript" src="{{URL('js/navbar.js')}}"></script>
<script type="text/javascript" src="{{URL('js/home.js')}}"></script>
@include('layouts.footer')