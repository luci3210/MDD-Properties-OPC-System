<!DOCTYPE html>
<html class="no-js" lang="ZXX">
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="Site keywords here">
		<meta name="description" content="#">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>{{ $pageName }}</title>

		<link rel="icon" href="img/favicon.png">

		<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500&display=swap" rel="stylesheet"> 

		<link rel="stylesheet" href="{{ url('mdd/front/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ url('mdd/front/css/animate.min.css') }}">
		<link rel="stylesheet" href="{{ url('mdd/front/css/aos.min.css') }}">
		<link rel="stylesheet" href="{{ url('mdd/front/css/font-awesome-all.min.css') }}">
		<link rel="stylesheet" href="{{ url('mdd/front/css/swiper-slider.min.css') }}">
		<link rel="stylesheet" href="{{ url('mdd/front/css/select2-min.css') }}">
		<link rel="stylesheet" href="{{ url('mdd/front/css/video-popup.min.css') }}">
		<link rel="stylesheet" href="{{ url('mdd/front/css/jquery-ui.min.css') }}">
		<link rel="stylesheet" href="{{ url('mdd/front/css/theme-default.css') }}">
		<link rel="stylesheet" href="{{ url('mdd/front/style.css') }}">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		
		<style>
			.error {
				color:red;
				font-style:italic;
				font-size:12px;
			}
		</style>
		
	</head>

	<body>
		<div class="preloader">
			<div class="preloader-inner">
				<div class="preloader-icon">
					<span></span>
					<span></span>
				</div>
			</div>
		</div>
		<!-- End Preloader -->

		@yield('iocontent')


		<a href="#" class="scrollToTop">Up Now<i class="fa-solid fa-angle-right"></i></a>

		<script src="{{ url('mdd/front/js/jquery.min.js') }}"></script>
		<script src="{{ url('mdd/front/js/jquery-migrate.js') }}"></script>
		<script src="{{ url('mdd/front/js/jquery-ui.min.js') }}"></script>
		<script src="{{ url('mdd/front/js/bootstrap.min.js') }}"></script>
		<script src="{{ url('mdd/front/js/aos.min.js') }}"></script>
		<script src="{{ url('mdd/front/js/ckeditor.min.js') }}"></script>
		<script src="{{ url('mdd/front/js/select2-js.min.js') }}"></script>
		<script src="{{ url('mdd/front/js/video-popup.min.js') }}"></script>
		<script src="{{ url('mdd/front/js/swiper-slider.min.js') }}"></script>
		<script src="{{ url('mdd/front/js/waypoints.min.js') }}"></script>
		<script src="{{ url('mdd/front/js/jquery.counterup.min.js') }}"></script>
		<script src="{{ url('mdd/front/js/easing.min.js') }}"></script>
		<script src="{{ url('mdd/front/js/active.js') }}"></script>
		<script src="{{ url('mdd/assets/js/bundle.js?ver=3.1.2') }}"></script>
	    <script src="{{ url('mdd/assets/js/scripts.js?ver=3.1.2') }}"></script>
	    <script src="{{ url('mdd/assets/js/charts/gd-default.js?ver=3.1.2') }}"></script>

		<script>
			var swiper = new Swiper(".homec-slider-agent", {
				autoplay: { 
					 delay: 344500,
				},
				navigation: {
				  nextEl: ".swiper-button-next",
				  prevEl: ".swiper-button-prev",
				},
				mousewheel: true,
				keyboard: true,
				loop: true,
				grabCursor: true,
				spaceBetween: 30,
				centeredSlides: false,
				pagination: {
					el: '.swiper-pagination__agent',
					type: 'bullets',
					clickable: true,
				},
				slidesPerView: "4",
				breakpoints: {
				  320: {
					slidesPerView: "1",
				  },
				  428: {
					slidesPerView:"2",
				  },
				  640: {
					slidesPerView: "2",
				  },
				  768: {
					slidesPerView: "3",
				  },
				  1024: {
					slidesPerView: "4",
				  },
				},
			});	
		 </script>
	</body>
</html>