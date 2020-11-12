@include('layouts.header')
<link rel="stylesheet" type="text/css" href="{{URL('css/fontawesome-all.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('css/navbar.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('css/info.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('css/footer.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL('css/career.css')}}">
</head>
<body>
@include('layouts.info')
@include('layouts.navbar')
<div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="emailModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="emailModalLabel">Send your Resume</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="career" method="POST" enctype="multipart/form-data">
        	<div class="form-group row">
        		<label for="sender-name" class="col-sm-2 col-form-label">Name: </label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sender-name" name="name" placeholder="Name" required>
						</div>
        	</div>
        	<div class="form-group row">
        		<label for="sender-email" class="col-sm-2 col-form-label">Email: </label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="sender-email" name="email" placeholder="your@email.com" required>
						</div>
        	</div>
        	<div class="form-group row">
        		<label for="sender-subject" class="col-sm-2 col-form-label">Subject: </label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sender-subject" name="subject" placeholder="Subject" required>
						</div>
        	</div>
        	<div class="form-group row">
        		<label for="sender-file" class="col-sm-2 col-form-label">Attach Resume: </label>
						<div class="col-sm-10">
							<div class="hide-file-div">
								Upload Resume
								<input type="file" class="hide-file" id="sender-file" name="attachment" title="Must be less than 2MB" required>
							</div>
						</div>
        	</div>
        	<div class="form-group row">
        		<label for="sender-message" class="col-sm-2 col-form-label">Message: </label>
						<div class="col-sm-10">
							<textarea class="form-control" id="sender-message" name="message" placeholder="Your message..."></textarea>
						</div>
        	</div>
        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
        	<div class="form-group row">
						<div class="col-sm-9"></div>
						<div class="col-sm-3">
							<button type="submit" disabled class="btn btn-sm send-resume-email" id="send-mail">Send Mail</button>
						</div>
        	</div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid career">
	@if(isset($success) && !is_null($success))
	<div class="alert alert-success alert-dismissable alert-margin-top">
	   <button type="button" class="close" data-dismiss="alert">&times;</button>
	   Your Resume was sent <strong>successfully!</strong>
	</div>
	@endif
	<div class="row pt-5 pb-5">
		<div class="container">
			<h1 class="pt-5 pb-3 text-center current_job">Current Jobs</h1>
			<p class="text-center pt-5 pb-5 current_job_text">Apply today and become part of our friendly team. If you are a diligent, purposeful, creative and advanced person then you can try to join our team and work with us. Working here is so much fun. Here you can demonstrate your abilities, work on technologically challenging projects, continue career growth.
			So, let’s grow together!</p>
			@forelse($career as $item)
					<div class="col-12 career-item hvr-sweep-to-top">
						<div class="first-line">
							<i class="fas fa-4x fa-arrow-down"></i>
							<h1 class="text-center vacancy-text">{{ $item->vacancy }}</h1>
						</div>
						<div class="detailed-description">
							<p class="text-center description-text">{!! $item->description !!}</p>
							<button class="btn font-weight-bold send-resume send-resume-btn" data-toggle="modal" data-target="#emailModal">Send Resume</button>
						</div>
					</div>
				@empty
					<p class="text-center no-jobs">There are currently no job postings</p>
			@endforelse
		</div>
	</div>
</div>
<script type="text/javascript" src="{{URL('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{URL('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{URL('js/navbar.js')}}"></script>
<script type="text/javascript" src="{{URL('js/career.js')}}"></script>
@include('layouts.footer')

