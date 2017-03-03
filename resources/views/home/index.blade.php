@extends('layouts.master')

@section('title')
My Portofolio
@endsection
@section('content')

<div class="about" id="about">
		<div class="container">
					<h3 class="w3l_head">About Me</h3>
			<p class="w3ls_head_para">A few words about me</p>
		<div class="w3l-grids-about">
		@foreach ($profiles as $key => $profile)
				<div class="col-md-5 w3ls-ab-right">
					<div class="agile-about-right-img">
						<img src="{{ asset($profile->photo)}}" alt="">
					</div>
				</div>
				<div class="col-md-7 w3ls-agile-left">
					<div class="w3ls-agile-left-info">
						<h4>Job Title</h4>
						<p>{{ $profile->job_title }}</p>
					</div>
					<div class="w3ls-agile-left-info">
						<h4>Name</h4>
						<p>{{ $profile->name }}</p>
					</div>
					<div class="w3ls-agile-left-info">
						<h4>Sex</h4>
						<p>{{ $profile->sex }}</p>
					</div>
					<div class="w3ls-agile-left-info">
						<h4>Address</h4>
						<p>{{ $profile->address }}</p>
					</div>
					<div class="w3ls-agile-left-info">
						<h4>Email Address</h4>
						<p><a href="mailto:{{ $profile->email_address }}">{{ $profile->email_address }}</a></p>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			</div>
			@endforeach
		</div>
<!-- //about-bottom -->
<!-- services -->
<div class="service" id="services">
     <div class="container">
	 
	 		<h3 class="w3l_head two">WHAT I DO FOR YOU</h3>
			<p class="w3ls_head_para">See My Services</p>
    <div class="service-agileits">
			@foreach ($services as $key => $service)
			{!! $service->services !!}
			
			@endforeach
			<div class="clearfix"></div>			
		
	 </div>
  </div>
 </div>
<!-- //services -->
<!-- /education -->
 <div class="education" id="education">
	    <div class="col-md-6 education-w3l">
		     <h3 class="w3l_head three">My Education</h3>
			  <div class="education-agile-grids">
			  @foreach ($educations as $key => $education)
				  <div class="education-agile-w3l">
				     <div class="education-agile-w3l-year">
					       <h4>{{ $education->tahun }}</h4>
						   <h6>{{ $education->gelar }}</h6>
				     </div>
					 <div class="education-agile-w3l-info">
					       <h4>{{ $education->institusi }}</h4>
						   <p>{{ $education->deskripsi }}</p>
						  
				     </div>
				      <div class="clearfix"></div>
				  </div>
				 
				      <div class="clearfix"></div>
				  </div>
				 @endforeach
			  </div>
		</div>
		<div class="col-md-6 skills">
		<h3 class="w3l_head two">My Skills</h3>
	     <div class="skill-agile">
						<div class='bar_group'>
						 @foreach ($skills as $key => $skill)
						{!! $skill->skills !!}
						@endforeach
					</div>

						</div>
		 </div>
		 <div class="clearfix"> </div>
		</div>
 <!-- //education -->
 <!-- /experience -->
 <div class="education" id="education two">
 		<div class="col-md-6 skills two">
		<h3 class="w3l_head two">More Skills</h3>
	     <div class="skill-agile">
	      @foreach ($skills_more as $key => $skills_more)
						
			
		<div class="col-sm-4 abt-gd-left text-center">
			{!! $skills_more->skills !!}>
			
		</div>
		@endforeach
		
		<div class="clearfix"></div>
</div>
		 </div>
	    <div class="col-md-6 education-w3l">
		     <h3 class="w3l_head three">My Experience</h3>
			  <div class="education-agile-grids">
				  <div class="education-agile-w3l">
				   @foreach ($experiences as $key => $experience)
				     <div class="education-agile-w3l-year">
					       <h4>{{ $experience->tahun }}</h4>
						   <h6>{{ $experience->perusahaan }}</h6>
				     </div>
					 <div class="education-agile-w3l-info">
					       <h4>{{ $experience->profesi }}</h4>
						   <p>{{ $experience->deskripsi }}</p>
						  
				     </div>
				      <div class="clearfix"></div>
				      @endforeach
				  </div>
				  
				 
			  </div>
		</div>

		 <div class="clearfix"> </div>
		</div>
 <!-- //experience -->
 <!-- /gallery-->
	<div class="portfolio" id="gallery">
		<div class="container">
				<h3 class="w3l_head">My Gallery</h3>
			<p class="w3ls_head_para">See My Works</p>
				<div class="agileits_portfolio_grids">
				@foreach ($projects->chunk(2) as $projectChuck)
				<div class="col-md-4 agileits_portfolio_grid">
				@foreach ($projectChuck as $project)
					<div class="agileinfo_portfolio_grid hovereffect">
						<a class="cm-overlay" href="{{ asset($project->image)}}">
							<img src="{{ asset($project->image)}}" alt=" " class="img-responsive">
							<div class="overlay">
								<h4>{{ $project->name}}</h4>
								<a href="{{$project->link}}" target="_blank">{{$project->link}}</p>
								<p>{{$project->deskripsi}}</p>
							</div>
						</a>

					</div>
					 
					@endforeach
					
				</div>
				@endforeach
				<div class="clearfix"> </div>
			</div>

			
		</div>
	</div>
<!-- //gallery -->
<!--counter-->
<div id="counter" class="counter">
	<div class="container">
			<!--count-down -->
		<div class="count">
			<div class="col-md-3 agile_count_grid">
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
				
				<h5>CLIENTS</h5>
				
					<p class="counter">468</p> 
				
			</div>
			<div class="col-md-3 agile_count_grid">
				<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
				
				<h5>PROJECTS</h5>
				
					<p class="counter">{{$projects_count}}</p> 
				
			</div>
			<div class="col-md-3 agile_count_grid c3">
				<span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span>
				
				<h5>EXPERIENCE</h5>
					<p class="counter">{{$experiences_count}}</p> 
				
			</div>
			<div class="col-md-3 agile_count_grid c4">
				
					<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
				
				<h5>LINES OF CODE</h5>
				
					<p class="counter">5008</p> 
				
				
				
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--counter-->
<!-- mail -->
	<div class="mail" id="mail">
		<div class="container">
			<h3 class="w3l_head w3l_head1">Contact Me</h3>
			<p class="w3ls_head_para w3ls_head_para1">send Me a message</p>
			<div class="w3_mail_grids">
				<form action="{{ route('message.create')}}" method="post">
					<div class="col-md-6 w3_agile_mail_grid">
						<span class="input input--ichiro">
							<input class="input__field input__field--ichiro" type="text" id="input-25" name="name" placeholder=" " required="">
							<label class="input__label input__label--ichiro" for="input-25">
								<span class="input__label-content input__label-content--ichiro">Your Name</span>
							</label>
						</span>
						<span class="input input--ichiro">
							<input class="input__field input__field--ichiro" type="email" id="input-26" name="email" placeholder=" " required="">
							<label class="input__label input__label--ichiro" for="input-26">
								<span class="input__label-content input__label-content--ichiro">Your Email</span>
							</label>
						</span>
						<span class="input input--ichiro">
							<input class="input__field input__field--ichiro" type="text" id="input-27" name="phone" placeholder=" " required="">
							<label class="input__label input__label--ichiro" for="input-27">
								<span class="input__label-content input__label-content--ichiro">Your Phone Number</span>
							</label>
						</span>
						
					</div>
					<div class="col-md-6 w3_agile_mail_grid">
						<textarea placeholder="Your Message" name="message" required=""></textarea>
						<input type="submit" value="Submit">
					</div>
					{{ csrf_field() }}
					<div class="clearfix"> </div>
				</form>
			</div>
		</div>
	</div>
	

@endsection