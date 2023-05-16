	@extends('mdd.front_master')
	@section('content')

<section class="breadcrumbs__content" style="background-image: url(https://placehold.co/1920x455)">
			<div class="homec-overlay"></div>
			<div class="container">
				<div class="row">
					<!-- Breadcrumb-Content -->
					<div class="col-12">
						<div class="breadcrumb-content">
							<ul class="breadcrumb__menu list-none">
								<li><a href="index.html">Home</a></li>
								<li class="active"><a href="404.html">Error pages</a></li>
							</ul>
							<h2 class="breadcrumb__title m-0">404 Page</h2>
						</div>	
					</div>
				</div>
			</div>
		</section>
		<!-- End breadcrumbs -->
		
        <!-- Error Page -->
		<section class="homec-error section-padding">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-12">
						<div class="homec-error-inner">	
							<!-- Eror Content Image -->
							<div class="homec-error-inner__img">
								<img src="https://placehold.co/1000x565" alt="#">
							</div>
                            <h1 class="homec-error-inner__title">Oops! Page Not Found.</h1>
							<div class="homec-error-inner__button">
								<a href="index.html" class="homec-btn"><span>Back to Home Page</span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Error Page -->

		<!-- Download App -->
		<section class="download-app homec-bg-cover homec-bg-primary-color pd-top-15 pd-btm-15" style="background-image:url('img/download-vector.svg')">
			<div class="homec-shape">
				<div class="homec-shape-single homec-shape-11"><img src="img/anim-shape-10.svg" alt="#"></div>
				<div class="homec-shape-single homec-shape-12"><img src="img/anim-shape-10.svg" alt="#"></div>
				<div class="homec-shape-single homec-shape-13"><img src="img/anim-shape-10.svg" alt="#"></div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="download-app__middle">
							<div class="download-app__content">
								<div class="homec-section__head section-white mg-btm-30" data-aos="fade-up" data-aos-delay="400">
									<h2 class="homec-section__title">Download Our Mobile App</h2>						
									<p class="sec-head__text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered into the find to amke it  alteration.</p>
								</div>
								<!-- App Download Button -->
								<div class="download__app-button" data-aos="fade-up" data-aos-delay="500">
									<a href="#" class="homec-btn homec-btn-primary-overlay homec-btn__download">
										<div class="homec-btn__inside">
											<i class="fa-brands fa-apple"></i>
											<div class="btn-content"><span>DOWNLOAD ON THE</span><p>App Store</p></div>
										</div>
									</a>
									<a href="#" class="homec-btn homec-btn-primary-overlay homec-btn__download">
										<div class="homec-btn__inside">
											<i class="fa-brands fa-google-play"></i>
											<div class="btn-content"><span>GET IT ON</span><p>Google Play</p></div>
										</div>
									</a>
								</div>
								<!-- End App Download Button -->
							</div>
							<!-- Download Image -->
							<div class="download-app__img" data-aos="fade-up" data-aos-delay="700">
								<img src="https://placehold.co/425x425" alt="#">
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
@endsection