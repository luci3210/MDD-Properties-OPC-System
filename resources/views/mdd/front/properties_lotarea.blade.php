@extends('mdd.front_master')
@section('content')
		
<section class="breadcrumbs__content" style="background-image: url({{ asset('mdd/front/img/1920x455/map.png') }});">
	<!-- <div class="homec-overlay"></div> -->
	<div class="container">
		<div class="row">
			<!-- Breadcrumb-Content -->
			<div class="col-12">
				<div class="homec-property homec-property__list-style homec-border">
	<div class="homec-property__head">
		<img src="{{ asset('mdd/assets/images/project')}}/{{ $property->skitch_img == null ? 'logo.png' : json_decode($property->skitch_img)[0] }}" alt="#">
	</div>
	<!-- Property Body-->
	<div class="homec-property__body">
		
		{{-- <div class="homec-property__topbar">
			<div class="homec-property__price">$3,976 <span>/month</span></div>
			<span class="homec-property__salebadge">To Sale</span>
		</div> --}}
		
		<h3 class="homec-property__title"><a href="property-single.html">{{ $property->projectName }} (Project-{{$property->projectsid }})</a></h3>
		<div class="homec-property__text">
			<img src="{{ asset('mdd/front/icon/mdd-location.png') }}" alt="#">
			<p>{{ $property->address }} - {{ $property->province . ', ' . $property->city . ', ' . $property->barangay }}</p>
		</div>

		<ul class="homec-property__list homec-border-top list-none">
			<li>- Near SM City Manila</li>
			<li>- 5min Away from Univercity Philippines</li>
			<li>- Over Looking</li>
		</ul> 
	</div>
</div>	
			</div>
		</div>
	</div>
</section>


<section class="pd-top-20 pd-btm-20">
    <div class="container">
        <div class="row">

<div class="col-12">
						<!-- Section TItle -->
						<div class="homec-section__head text-center mg-btm-30 mg-top-30">
							
							<h2 class="homec-section__title aos-init aos-animate" data-aos="fade-in" data-aos-delay="400">Explore our default Price, made for you!</h2>
						</div>
						<!-- Homec Search -->
						<div class="homec-search-form mg-top-10 mg-btm-30 aos-init aos-animate" data-aos="fade-up" data-aos-delay="500">
							<form class="homec-form__form">
								<input type="email" name="Email" placeholder="Enter prepared No. of Month" required="">
								<button type="submit" class="homec-btn"><span>Check Price</span></button>
							</form>
						</div>
						<!-- End Homec Search -->
					</div>

{{-- <div class="col-lg-12 ol-12">

<div class="homec-property homec-property__list-style homec-border">
	<div class="homec-property__head">
		<img src="{{ asset('mdd/assets/images/project')}}/{{ $property->skitch_img == null ? 'logo.png' : json_decode($property->skitch_img)[0] }}" alt="#">
	</div>

	<div class="homec-property__body">
		<h3 class="homec-property__title"><a href="property-single.html">{{ $property->projectName }} (Project-{{$property->projectsid }})</a></h3>
		<div class="homec-property__text">
			<img src="{{ asset('mdd/front/icon/mdd-location.png') }}" alt="#">
			<p>{{ $property->address }} - {{ $property->province . ', ' . $property->city . ', ' . $property->barangay }}</p>
		</div>
	</div>
</div>

</div>
 --}}


{{-- 
#############################################################
####################### ONE #################################
############################################################# 
--}}
<div class="col-lg-4 col-md-4 col-12 mg-top-20 aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
	<div class="homec-psingle">

	@php
	$sum = $property->misc_interest_amount + $property->misc_u_t_over_amount + $property->discount_f_paid_amount + $property->expanded_htax_amount + $property->lot_price + $property->term_amount;
	@endphp


	<div class="homec-psingle__head">
		<h4 class="homec-psingle__title">{{ $property->price_one}} Months</h4>
	    <div class="homec-psingle__amount" >
			<span class="homec-psingle__currency">₱ </span>{{ number_format($sum / $property->price_one, 2,'.',',') }}<span>/Per Month</span>
			<p id="amountONE">{{ $sum / $property->price_one}}</p>
		</div>
	</div>

	<div class="homec-psingle__body">
	    <ul class="homec-psingle__list">
	        <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>Block-{{ $property->block }} / Lot-{{ $property->lot }}</li>
	        <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>Class: {{ $property->prime }}</li>
	        <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>Lot Area: {{ $property->lot_area }}sqm</li>
	        <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>Price per SQM: ₱{{$property->sqm_price}} </li>
	    </ul>
	    <div class="homec-psingle__button">
	         <button type="button" class="homec-btn" id="applyButton_ONE"><span>Check Details</span></button>
	    </div>
	</div>

	</div>
</div>

{{-- 
#############################################################
####################### TWO #################################
############################################################# 
--}}
<div class="col-lg-4 col-md-4 col-12 mg-top-20 aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
	<div class="homec-psingle">

		@php
		$sum = $property->misc_interest_amount + $property->misc_u_t_over_amount + $property->discount_f_paid_amount + $property->expanded_htax_amount + $property->lot_price + $property->term_amount;
		@endphp


	    <div class="homec-psingle__head">
			<h4 class="homec-psingle__title">{{ $property->price_two}} Months</h4>
	        <div class="homec-psingle__amount" >
				<span class="homec-psingle__currency">₱ </span>{{ number_format($sum / $property->price_two, 2,'.',',') }}<span>/Per Month</span>
				<p id="amountTWO">{{ $sum / $property->price_two}}</p>
			</div>
	    </div>

	<div class="homec-psingle__body">
	    <ul class="homec-psingle__list">
	        <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>Block-{{ $property->block }} / Lot-{{ $property->lot }}</li>
	        <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>Class: {{ $property->prime }}</li>
	        <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>Lot Area: {{ $property->lot_area }}sqm</li>
	        <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>Price per SQM: ₱{{$property->sqm_price}} </li>
	    </ul>
	    <div class="homec-psingle__button">
	         <button type="button" class="homec-btn" id="applyButton_TWO"><span>Check Details</span></button>
	    </div>
	</div>

	</div>
</div>


{{-- 
#############################################################
####################### THREE ###############################
############################################################# 
--}}
<div class="col-lg-4 col-md-4 col-12 mg-top-20 aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
	<div class="homec-psingle">

		@php
		$sum = $property->misc_interest_amount + $property->misc_u_t_over_amount + $property->discount_f_paid_amount + $property->expanded_htax_amount + $property->lot_price + $property->term_amount;
		@endphp


	    <div class="homec-psingle__head">
			<h4 class="homec-psingle__title">{{ $property->price_three }} Months</h4>
	        <div class="homec-psingle__amount" >
				<span class="homec-psingle__currency">₱ </span>{{ number_format($sum / $property->price_three, 2,'.',',') }}<span>/Per Month</span>
				<p id="amountTHREE">{{ $sum / $property->price_three}}</p>
			</div>
	    </div>

	<div class="homec-psingle__body">
	    <ul class="homec-psingle__list">
	        <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>Block-{{ $property->block }} / Lot-{{ $property->lot }}</li>
	        <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>Class: {{ $property->prime }}</li>
	        <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>Lot Area: {{ $property->lot_area }}sqm</li>
	        <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>Price per SQM: ₱{{$property->sqm_price}} </li>
	    </ul>
	    <div class="homec-psingle__button">
	         <button type="button" class="homec-btn" id="applyButton_THREE"><span>Check Details</span></button>
	    </div>
	</div>

	</div>
</div>


<div class="mg-top-20">
<div class="col-12 homec-border" style="padding:15px; border-radius: 5px;">
	<div class="homec-gmap-canvas homec-gmap-canvas--map">
		<div id="map" style="height: 400px;"></div>
	</div>
</div>
</div>


    </div>
</div>
</section>


<script type="text/javascript">

	document.addEventListener('DOMContentLoaded', function() {
    
        var isAuthenticated = @json(auth()->check());

		function valueONE() {

				

        	if (isAuthenticated) {

        			var amountONElement = document.getElementById("amountONE");
			    	var amount = amountONElement.textContent;
			    	


			     	$.ajax({
		            url: '{{ route("xendit_checkout") }}',
		            type: 'POST',
		            data: {
		            	_token: $('meta[name="csrf-token"]').attr('content'), 
		                amount: amount
		            },
		            success: function(response) {

		                window.location.href = response.redirectz_url;
		            }
		        });

			} else {

	 			alert('User is not authenticated!');

			}
	    }

		function valueTWO() {

        	if (isAuthenticated) {

        			var amountTWOlement = document.getElementById("amountTWO");
			    	var amount = amountTWOlement.textContent;



			     	$.ajax({
		            url: '{{ route("xendit_checkout") }}',
		            type: 'POST',
		            data: {
		            	_token: $('meta[name="csrf-token"]').attr('content'), 
		                amount: amount
		            },
		            success: function(response) {
		                window.location.href = response.redirectz_url;
		            }
		        });

			} else {

	 			alert('User is not authenticated!');

			}
	    }

        function valueTHREE() {

        	if (isAuthenticated) {

        			var amountTHREElement = document.getElementById("amountTHREE");
			    	var amount = amountTHREElement.textContent;

			     	$.ajax({
		            url: '{{ route("xendit_checkout") }}',
		            type: 'POST',
		            data: {
		            	_token: $('meta[name="csrf-token"]').attr('content'), 
		                amount: amount
		            },
		            success: function(response) {
		                window.location.href = response.redirectz_url;
		            }
		        });

			} else {

	 			alert('User is not authenticated!');

			}
	    }

	    var buttonONE = document.getElementById("applyButton_ONE");
   		buttonONE.addEventListener("click", valueONE);

   		var buttonTWO = document.getElementById("applyButton_TWO");
   		buttonTWO.addEventListener("click", valueTWO);

   		var buttonTHREE = document.getElementById("applyButton_THREE");
   		buttonTHREE.addEventListener("click", valueTHREE);


    });




 function initMap() {

 	  var mapOptions = {
      center: { lat: 14.687627438281512, lng: 121.03947008270569 }, // Set the initial center of the map
      zoom: 5 // Set the initial zoom level
    };

    var map = new google.maps.Map(document.getElementById('map'), mapOptions);

    // Create a marker and set its position
    var marker = new google.maps.Marker({
      position: { lat: 14.687627438281512, lng: 121.03947008270569 },
      map: map,
      title: 'My Remark' // The title will appear as the tooltip when hovering over the marker
    });

    // Create an info window and set its content
    var infoWindow = new google.maps.InfoWindow({
      content: 'This is my remark!' // The content will appear in the info window when the marker is clicked
    });

    // Open the info window when the marker is clicked
    marker.addListener('click', function() {
      infoWindow.open(map, marker);
    });

    // Fit the map within the Bootstrap div
    var bounds = new google.maps.LatLngBounds();
    bounds.extend(marker.getPosition());
    map.fitBounds(bounds);
  }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIW4o9nUn7zuqakLiKQ4duzLVzjPyKRnU&callback=initMap" async defer></script>
{{-- <script async defer src="https://maps.googleapis.com/maps/api/js?callback=initMap"></script> --}}
@endsection