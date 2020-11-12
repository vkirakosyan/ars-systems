<nav class="navbar navbar-expand-md navbar-light site-navbar">
	<a class="navbar-brand navbar-logo-link" href="{{URL::to('/')}}"><img src="{{URL('images/Media/logo.png')}}" class="position-relative logo"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
 	</button>
	<div class="collapse navbar-collapse nav-container" id="navbarNav">
		<div class="navbar-nav nav-fill col-12 justify-content-end">
			<a href="{{URL::to('team')}}" class="nav-link nav-link-custom" id="team-link">Our Team</a>
			<a href="{{URL::to('services')}}" class="nav-link nav-link-custom" id="services-link">Services</a>
			<a href="{{URL::to('career')}}" class="nav-link nav-link-custom" id="career-link">Career</a>
			<a href="{{URL::to('outsourcing')}}" class="nav-link nav-link-custom" id="outsourcing-link">Outsourcing</a>
			<a href="{{URL::to('contact')}}" class="nav-link nav-link-custom" id="contact-link">Contact Us</a>			
		</div>
	</div>
</nav>