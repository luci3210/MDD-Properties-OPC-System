<!DOCTYPE html>
<html class="no-js">
    <head>
        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="Site keywords here">
        <meta name="description" content="#">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title></title>
        <link rel="icon" href="{{ url('mdd/front/img/favicon.png') }}">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500&display=swap" rel="stylesheet"> 

        <link rel="stylesheet" href="{{ url('mdd/front/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('mdd/front/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ url('mdd/front/css/aos.min.css') }}">
        <link rel="stylesheet" href="{{ url('mdd/front/css/font-awesome-all.min.css') }}">
        <link rel="stylesheet" href="{{ url('mdd/front/css/swiper-slider.min.css') }}">
        <link rel="stylesheet" href="{{ url('mdd/front/css/flex-slider.css') }}">
        <link rel="stylesheet" href="{{ url('mdd/front/css/select2-min.css') }}">
        <link rel="stylesheet" href="{{ url('mdd/front/css/video-popup.min.css') }}">
        <link rel="stylesheet" href="{{ url('mdd/front/css/jquery-ui.min.css') }}">
        <link rel="stylesheet" href="{{ url('mdd/front/css/theme-default.css') }}">
        <link rel="stylesheet" href="{{ url('mdd/front/style.css') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
       {{--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}

        <style>
            .error {
                color:red;
                font-style:italic;
                font-size:12px;
            }
 .modal-backdrop {
    z-index: 100000 !important;
  }

  .modal {
    z-index: 100001 !important;
  }
        </style>
    </head>

    <body>
        

    <!-- Spinner Start -->
    @include('mdd.front.body.header')
    <!-- Navbar & Carousel End -->

    @yield('content')
                
    <!-- Footer Start -->
    @include('mdd.front.body.footer')
    <!-- Footer End -->

        <!-- Scrool Top -->
        <a href="#" class="scrollToTop">Go Top<i class="fa-solid fa-angle-right"></i></a>
        {{-- <script src="{{ url('mdd/front/js/jquery.min.js') }}"></script> --}}
        {{-- <script src="{{ url('mdd/front/js/jquery-migrate.js') }}"></script> --}}
        <script src="{{ url('mdd/front/js/jquery-ui.min.js') }}"></script>
        <script src="{{ url('mdd/front/js/bootstrap.min.js') }}"></script>
        <script src="{{ url('mdd/front/js/aos.min.js') }}"></script>
        <script src="{{ url('mdd/front/js/ckeditor.min.js') }}"></script>
        <script src="{{ url('mdd/front/js/select2-js.min.js') }}"></script>
        <script src="{{ url('mdd/front/js/video-popup.min.js') }}"></script>
        <script src="{{ url('mdd/front/js/swiper-slider.min.js') }}"></script>
        <script src="{{ url('mdd/front/js/flex-slider.js') }}"></script>
        <script src="{{ url('mdd/front/js/waypoints.min.js') }}"></script>
        <script src="{{ url('mdd/front/js/jquery.counterup.min.js') }}"></script>
        <script src="{{ url('mdd/front/js/easing.min.js') }}"></script>
        <script src="{{ url('mdd/front/js/active.js') }}"></script>
        <script src="{{ url('mdd/assets/js/bundle.js?ver=3.1.2') }}"></script>
        <script src="{{ url('mdd/assets/js/scripts.js?ver=3.1.2') }}"></script>
        <script src="{{ url('mdd/assets/js/charts/gd-default.js?ver=3.1.2') }}"></script>

        <script>
            /* Home Featured Slider */
            var swiper = new Swiper(".homec-slider-pcard", {
                autoplay: { 
                    delay: 2500,
                },
                navigation: {
                  nextEl: ".swiper-button-next",
                  prevEl: ".swiper-button-prev",
                },
                effect: 'fade',
                mousewheel: true,
                keyboard: true,
                loop: true,
                grabCursor: true,
                speed: 500,
                spaceBetween: 15,
                centeredSlides: false,
                pagination: {
                    el: '.swiper-pagination__featured',
                    type: 'bullets',
                    clickable: true,
                },
                slidesPerView: "1",
            }); 

         </script>

    </body>
</html>
