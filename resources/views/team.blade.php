@include('layouts.header')
<link rel="stylesheet" type="text/css" href="{{URL('css/navbar.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('css/info.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('css/footer.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('css/team.css')}}">
</head>
<body>
@include('layouts.info')
@include('layouts.navbar')
<div class="container-fluid teampage">
	<div class="container-fluid team pb-5">
		<div class="row pt-5 pb-5">
			<div class="container">
				<div class="col-sm-12 text-center">
					<h1 class="text-center heading">Our Team</h1>
					<p class="text-team">We are a team who has a dream. We are sure that working together will lead us to great success. <br>
					As teamwork divides the work and multiplies the success! We believe in each other. <br>
					United we play. United we win. WE better than ME. <br>
					So, get to know us a little better!</p>
				</div>
			</div>
			<div class="container">
				<div class="row">
				@forelse($team as $item)
					<div class="col-lg-4 col-md-4 col-sm-6 col-12 p-0 team-col">
						<div class="info-card text-center">
							<h1 class="text-white">{{$item->first_name . ' ' . $item->last_name}}</h1>
							<h3 class="text-white">{{$item->position}}</h3>
						</div>
						<img class="team-img" src='{{URL("images/Team/$item->image")}}'>
						@php 
							$link = str_replace(strstr($item->image,'.'),'_hover'.strstr($item->image,'.'),$item->image);
						@endphp
						<img class="team-hover" src='{{URL("images/Team/$link")}}'>
					</div>
					@empty
						<h1 class="text-center font-weight-bold text-white">Team currently has no members.</h1>
				@endforelse
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="{{URL('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{URL('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{URL('js/scrollreveal.min.js')}}"></script>
<script type="text/javascript" src="{{URL('js/navbar.js')}}"></script>
<script type="text/javascript" src="{{URL('js/team.js')}}"></script>
@include('layouts.footer')