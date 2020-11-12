@include('layouts.header')
<link rel="stylesheet" type="text/css" href="{{URL('css/navbar.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('css/info.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('css/footer.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('css/services.css')}}">
</head>
<body>
@include('layouts.info')
@include('layouts.navbar')
<div class="container-fluid services">
	<div class="container">
		<div class="row pt-5 pb-5">
			<div class="col-sm-12 mb-1">
				<h1 class="text-center service-header">
					Meet Our Services
				</h1>
				<p class="text-center service-text">
					We find bright solutions and get profitable results. We create online success for various business. <br> 
					You can build your business with the help of our services. <br>
					We offer the service you expect and the quality you deserve. <br>
					So, take a look!
				</p>
			</div>
			@forelse($service as $item)
				<div class="col-sm-12 pt-5">
					<h3 class="text-left">{{$item->title}}</h1>
					<div class="progress custom-progress">
						<div 
							class="progress-bar custom-bar"
							style="	
									animation-delay: 3.5s;
									animation: fillwidth 3.5s ease-in-out; 
									width: {{$item->percentage}}%;
									background:rgba(0, {{168 - $item->percentage}}, 12,0.75);
									" 
							role="progressbar" 
							aria-valuenow="{{$item->percentage}}" 
							aria-valuemin="0" 
							aria-valuemax="100">
							{{$item->percentage}}%
						</div>
					</div>
				</div>
				@empty
					<h1 class="text-center">Currently,the company has no services to offer.</h1>

			@endforelse
		</div>
	</div>
</div>
<script type="text/javascript" src="{{URL('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{URL('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{URL('js/scrollreveal.min.js')}}"></script>
<script type="text/javascript" src="{{URL('js/navbar.js')}}"></script>
<script type="text/javascript" src="{{URL('js/services.js')}}"></script>
@include('layouts.footer')