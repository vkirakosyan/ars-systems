@include('layouts.header')
<link rel="stylesheet" type="text/css" href="{{URL('css/navbar.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('css/footer.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('css/info.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('css/outsourcing.css')}}">
</head>
<body>
@include('layouts.info')
@include('layouts.navbar')
<div class="container-fluid outsourcing pb-5">
	<div class="container pb-5 sub-container">
		<div class="row">
			<div class="col-12 pt-5 pb-5">
				<h1 class="heading">Outsourcing</h1>
				<p class="font-weight-bold content pt-5">
					Outsourcing with Ars Systems is perfect for finding web developers,web and graphic designers, QAs, <br> project
					managers who will make your every wish come true. We do regular meetings(video/voice call) <br> with our clients
					to capture all necessary information and relevant data.<br>
					So, let's outsource together! <br>
				</p>
			</div>
			<div class="col-12 pt-5 pb-5 anim">
				<img id="ball" src="{{URL('images/Media/ball.gif')}}">
				<img class="logo-outsourcing mt-5" src="{{URL('images/Media/logogreen.png')}}">
				<div id="client-req" class="gray-circle"></div>
				<div id="project-planning" class="gray-circle"></div>
				<div id="design" class="gray-circle"></div>
				<div id="project-dev" class="gray-circle"></div>
				<span class="circle-text"id="client-req-text">Identify the client's requirements</span>
				<span class="circle-text"id="project-planning-text">Project Planning</span>
				<span class="circle-text"id="design-text">Design</span>
				<span class="circle-text"id="project-dev-text">Project Development</span>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="{{URL('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{URL('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{URL('js/scrollreveal.min.js')}}"></script>
<script type="text/javascript" src="{{URL('js/navbar.js')}}"></script>
<script type="text/javascript" src="{{URL('js/outsourcing.js')}}"></script>
@include('layouts.footer')