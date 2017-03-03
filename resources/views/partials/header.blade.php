<div class="main" id="home">
<!-- banner -->
	<div class="banner">
			<!--Slider-->
			 @foreach ($profiles as $key => $profile)
			<img src="{{ asset($profile->photo)}}" alt=" " class="img-responsive" width="240px" height="240px">
					<h2>I'M {{ $profile->name }}</h2>
					<span>{{ $profile->job_title }}</span>
					@endforeach
				<div class="callbacks_container">
					<ul class="rslides callbacks callbacks1" id="slider3">
					 @foreach ($quotes as $key => $quote)
						<li class="" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 500ms ease-in-out;">
						
							<div class="slider-info">
								  <p>{{ $quote->quote }}</p>
							</div>
						</li>
						@endforeach
						<!-- <li  class="" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 500ms ease-in-out;">
							<div class="slider-info">
							   
								   <p>Itaque earum rerum hic tenetur a sapiente delectus</p>
						    </div>
						</li>
						<li class="callbacks1_on" style="display: block; float: left; position: relative; opacity: 1; z-index: 2; transition: opacity 500ms ease-in-out;">
							
							<div class="slider-info">
							<p>Lorem Ipsum is simply dummy text of the printing. </p>
							
							</div>
						</li> -->


					</ul><ul class="callbacks_tabs callbacks1_tabs"><li class="callbacks1_s1"><a href="#" class="callbacks1_s1">1</a></li><li class="callbacks1_s2"><a href="#" class="callbacks1_s2">2</a></li><li class="callbacks1_s3 callbacks_here"><a href="#" class="callbacks1_s3">3</a></li></ul>
					
			<div class="clearfix"></div>
		</div>
		<!--//Slider-->
					<ul class="top-links">
					@foreach($medsoss as $medsos)
									<li><a value="{{$medsos->id}}" href="{{$medsos->link}}" onclick="click(this)">{!!$medsos->tag_icon!!}</a></li>
									@endforeach
								</ul>
							<!-- 	<script type="text/javascript">
									function click(a){
										var id = a.getAttribute('value');
										var link = "/portofolio/public/";
										$.ajax({
									            type : 'POST',
									            url  : link+'/click/'+id,
									            
									            });
										return false;
									}
								</script> -->
	</div>
<!-- //banner -->
	</div>
	<div class="w3_navigation">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
					<div class="logo">
						<h1><a class="navbar-brand" href="{{route('home.index')}}"><span class="one">My</span> RESUME</a></h1>
					</div>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav class="cl-effect-1" id="cl-effect-1">
						<ul class="nav navbar-nav">
							<li class="active"><a class="scroll" href="index.html">Home</a></li>
							<li><a href="#about" class="scroll hvr-bounce-to-bottom">About</a></li>
							<li><a href="#services" class="scroll hvr-bounce-to-bottom">Services</a></li>
							<li><a href="#education" class="scroll hvr-bounce-to-bottom">Skills</a></li>
							<li><a href="#gallery" class="scroll hvr-bounce-to-bottom">Gallery</a></li>
							<li><a href="#mail" class="scroll hvr-bounce-to-bottom">Contact</a></li>
						</ul>
					</nav>
				</div>
				<!-- /.navbar-collapse -->
			</nav>
		</div>
	</div>