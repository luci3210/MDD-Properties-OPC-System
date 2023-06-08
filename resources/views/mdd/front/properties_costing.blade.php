@extends('mdd.front_master')
@section('content')


		
<section class="breadcrumbs__content" style="background-image: url(https://placehold.co/1920x455);">
			<!-- <div class="homec-overlay"></div> -->
</section>



<section class="pd-top-90 pd-btm-120">
    <div class="container">
        <div class="row">


<div class="col-lg-4 col-md-4 col-12 mg-top-30 aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
<div class="homec-psingle">
    <div class="homec-psingle__head">
		<h4 class="homec-psingle__title">24-Months</h4>
        <div class="homec-psingle__amount">
			<span class="homec-psingle__currency">$</span>00<span>/Per Month</span>
		</div>
    </div>

<div class="homec-psingle__body">
    <ul class="homec-psingle__list">
        <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>Block-{{ $property->block }} / Lot-{{ $property->lot }}</li>
        <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>Lot Area {{ $property->lot_area }}</li>
        <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>Price per SQM {{$property->sqm_price}} </li>
        <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>3 Photo</li>
        <li><span class="homec-psingle__icon homec-remove-color"><i class="fas fa-remove"></i></span>Featured Property</li>
        <li><span class="homec-psingle__icon homec-remove-color"><i class="fas fa-remove"></i></span>0 Featured Property</li>
        <li><span class="homec-psingle__icon homec-remove-color"><i class="fas fa-remove"></i></span>Top Property</li>
        <li><span class="homec-psingle__icon homec-remove-color"><i class="fas fa-remove"></i></span>Urgent Property</li>
    </ul>
    <div class="homec-psingle__button">
        <a href="#" class="homec-btn homec-btn__thrid"><span>Apply for Plan Now</span></a>
    </div>
</div>

</div>
</div>


					<div class="col-lg-4 col-md-4 col-12 mg-top-30 aos-init aos-animate" data-aos="fade-up" data-aos-delay="600">
						<!-- Pricing Single -->
                        <div class="homec-psingle homec-psingle__active">
                            <div class="homec-psingle__head">
								<h4 class="homec-psingle__title">30-Months</h4>
                                <div class="homec-psingle__amount">
									<span class="homec-psingle__currency">$</span>49<span>/Per Month</span>
								</div>
                            </div>
                            <div class="homec-psingle__body">
                                <ul class="homec-psingle__list">
									<li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>5 Property Submission</li>
                                    <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>7 Amenity</li>
                                    <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>5 Nearest Place</li>
                                    <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>3 Photo</li>
                                    <li><span class="homec-psingle__icon homec-remove-color"><i class="fas fa-remove"></i></span>Featured Property</li>
                                    <li><span class="homec-psingle__icon homec-remove-color"><i class="fas fa-remove"></i></span>0 Featured Property</li>
                                    <li><span class="homec-psingle__icon homec-remove-color"><i class="fas fa-remove"></i></span>Top Property</li>
                                    <li><span class="homec-psingle__icon homec-remove-color"><i class="fas fa-remove"></i></span>Urgent Property</li>
                                </ul>
                                <div class="homec-psingle__button">
                                    <a href="#" class="homec-btn homec-btn__thrid"><span>Apply for Plan Now</span></a>
                                </div>
                            </div>
                        </div>
						<!-- End Pricing Single -->
                    </div>
					<div class="col-lg-4 col-md-4 col-12 mg-top-30 aos-init aos-animate" data-aos="fade-up" data-aos-delay="800">
						<!-- Pricing Single -->
                        <div class="homec-psingle">
                            <div class="homec-psingle__head">
								<h4 class="homec-psingle__title">45-Months</h4>
                                <div class="homec-psingle__amount">
									<span class="homec-psingle__currency">$</span>99<span>/Per Month</span>
								</div>
                            </div>
                            <div class="homec-psingle__body">
                                <ul class="homec-psingle__list">
									<li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>5 Property Submission</li>
                                    <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>7 Amenity</li>
                                    <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>5 Nearest Place</li>
                                    <li><span class="homec-psingle__icon homec-check-color"><i class="fas fa-check"></i></span>3 Photo</li>
                                    <li><span class="homec-psingle__icon homec-remove-color"><i class="fas fa-remove"></i></span>Featured Property</li>
                                    <li><span class="homec-psingle__icon homec-remove-color"><i class="fas fa-remove"></i></span>0 Featured Property</li>
                                    <li><span class="homec-psingle__icon homec-remove-color"><i class="fas fa-remove"></i></span>Top Property</li>
                                    <li><span class="homec-psingle__icon homec-remove-color"><i class="fas fa-remove"></i></span>Urgent Property</li>
                                </ul>
                                <div class="homec-psingle__button">
                                    <a href="#" class="homec-btn homec-btn__thrid"><span>Apply for Plan Now</span></a>
                                </div>
                            </div>
                        </div>
						<!-- End Pricing Single -->
                    </div>
                </div>
            </div>
        </section>


<section class="pd-top-0 homec-bg-third-color pd-btm-80 homec-bg-cover" style="background-image: url('img/property-single-bg.svg');">
            <div class="container">
                <div class="row">       












                    <div class="col-lg-12 ol-12">
                    	<form id="CheckOutForm">
                    		@csrf
                    	<div class="homec-testimonial homec-testimonial--review homec-border mg-top-30">    
                            <div class="homec-testimonial__bottom">
                                <div class="homec-testimonial__author">
                                    <img src="https://placehold.co/64x64" alt="#">
                                    <div class="homec-testimonial__author--info">
                                        <h5 class="homec-testimonial__author--title">{{ $property->projectName }}
                                        </h5>
                                        <p class="homec-testimonial__author--position">{{ $property->address }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>


						<div class="homec-package-detail">    
							<table class="homec-package-detail__table">
								<tbody><tr>
									<td><b>Block :</b> <span>{{ $property->block }}</span></td>
									<td>
										<b>Terms Interest :</b> <span>{{ $property->percent_term }}%</span> <b>for</b> <span>{{ $property->months_term }} </span> <b>Months</b>
										@if($property->months_term >= $months)
<p style="font-size: 14px; color: red; font-weight:600">₱0.00</p>
										@else
<p style="font-size: 14px; color: red; font-weight:600">₱{{ number_format($property->term_amount, 2,'.',',') }}</p>
										@endif
									</td>
								</tr>
								<tr>
									<td><b>Lot :</b> <span>{{ $property->lot }}</span></td>
									<td>
										<b>Misc Interest :</b> <span>{{ $property->percent_misc_interest }}%</span>
<p style="font-size: 14px; color: red; font-weight:600">₱{{ number_format($property->misc_interest_amount, 2,'.',',') }}</p>
    

									</td>
								</tr>
								<tr>
									<td><b>Lot Area :</b> <span>{{ $property->lot_area }}</span></td>
									<td>
										<b>Misc Upon Turnover :</b> <span>{{ $property->percent_misc_u_t_over }}%
<p style="font-size: 14px; color: red; font-weight:600">₱{{ number_format($property->misc_u_t_over_amount, 2,'.',',') }}</p>
									</td>
								</tr>
								<tr>
									<td><b>Price per SQM :</b> <span>₱{{ number_format($property->sqm_price, 2,'.',',') }}</span></td>
									<td>
										<b>Discount for Full Paid :</b> <span>{{ $property->percent_discount_f_paid }}%
<p style="font-size: 14px; color: red; font-weight:600">₱{{ number_format($property->discount_f_paid_amount, 2,'.',',') }}</p>
									</td>
								</tr>
								<tr>
									<td><b>Lot Price :</b> <span>₱{{ number_format($property->lot_price, 2,'.',',') }}</span></td>
									<td>
										<b>Expanded Hoding Tax :</b> <span>{{ $property->percent_expanded_htax }}%</span>
<p style="font-size: 14px; color: red; font-weight:600">₱{{ number_format($property->expanded_htax_amount, 2,'.',',') }}</p>
									</td>
								</tr>
								<tr>
									<td colspan="2"><b>Monthly Fee :</b> 

									@if($property->months_term >= $months)
											<?php 
												$sum = $property->misc_interest_amount + $property->misc_u_t_over_amount + $property->discount_f_paid_amount + $property->expanded_htax_amount + $property->lot_price + $property->term_amount;

												// echo $monthlyfee = $sum / $months;
											?>
<p style="font-size: 14px; color: red; font-weight:600">₱{{ number_format($sum / $months, 2,'.',',') }}</p>

										@else

											<?php 
												$sum = $property->misc_interest_amount + $property->misc_u_t_over_amount + $property->discount_f_paid_amount + $property->expanded_htax_amount + $property->lot_price;

												// echo $monthlyfee = $sum / $months;
											
											?>
<p style="font-size: 14px; color: red; font-weight:600">₱{{ number_format($sum / $months, 2,'.',',') }}</p>
										@endif

								</td>
								</tr>

								<tr>
									<td colspan="2"><b>Net TCP with Interest & Misc. :</b> 

										@if($property->months_term >= $months)
											<span style="font-size:22px">₱{{ number_format($sum = $property->misc_interest_amount + $property->misc_u_t_over_amount + $property->discount_f_paid_amount + $property->expanded_htax_amount + $property->lot_price, 2,'.',',') }}
											</span>
										@else
											<span style="font-size:22px">₱{{ number_format($sum = $property->misc_interest_amount + $property->misc_u_t_over_amount + $property->discount_f_paid_amount + $property->expanded_htax_amount + $property->lot_price + $property->term_amount, 2,'.',',') }}
											</span>
										@endif

									</td>
								</tr>
								</tbody>
							</table>


						</div>

		<div class="col-4 mg-top-5">

            <button type="button" id="payMent" class="homec-btn homec-btn__second homec-property-ag__button"><span>Continue Payment</span></button>
        </div>
    </form>


                    </div>
                </div>
            </div>
        </section>
<script type="text/javascript">
$(document).ready(function() {
    $('#payMent').click(function() {
        var name = $('#name').text(); // Fetch the value from the <p> tag
        
        $.ajax({
            url: '{{ route("xendit_checkout") }}', // Replace "controller_route" with your actual route name
            type: 'POST',
            data: {
                name: name, // Pass the value to the controller as "name" parameter
                _token: '{{ csrf_token() }}' // Include the CSRF token
            },
            success: function(response) {
                // Handle the response from the controller if needed
                console.log(response);
                window.location.href = response.redirect_url;
            }
        });
    });
});
</script>

@endsection