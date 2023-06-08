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

@endsection