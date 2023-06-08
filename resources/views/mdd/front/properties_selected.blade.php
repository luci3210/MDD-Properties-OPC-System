@extends('mdd.front_master')
@section('content')
		
<section class="breadcrumbs__content" style="background-image: url({{ asset('mdd/front/img/1920x455/map.png') }});">
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="breadcrumb-content">
				<h2 class="breadcrumb__title m-0">Project Properties</h2>
				<ul class="breadcrumb__menu list-none">
					<li><a href="{{ route('homes') }}">Home</a></li>
					<li class="active"><a href="{{ route('front-properties-index') }}">Project Properties</a></li>
				</ul>
			</div>	
		</div>
	</div>
</div>
</section>

<section class="pd-top-0 homec-bg-third-color pd-btm-80 homec-bg-cover" style="background-image: url('img/property-single-bg.svg');">
<div class="container">
    <div class="row">                                                   
        <div class="col-lg-12 ol-12">
            <div class="homec-pdetails-tab">
                <div class="tab-content" id="nav-tabContent">

                    <div class="tab-pane fade show active" id="homec-pd-tab4" role="tabpanel">
                        <div class="homec-pdetails-tab__inner m-0">
							<div class="row">
								


<div class="col-12">
<div class="homec-property homec-property__list-style homec-border">
<div class="homec-property__head">
<img src="{{ asset('mdd/assets/images/project')}}/{{ $properties->skitch_img == null ? 'logo.png' : json_decode($properties->skitch_img)[0] }}" alt="#">
</div>
<!-- Property Body-->
<div class="homec-property__body">

{{-- <div class="homec-property__topbar">
<div class="homec-property__price">$3,976 <span>/month</span></div>
<span class="homec-property__salebadge">To Sale</span>
</div> --}}

<h3 class="homec-property__title"><a href="property-single.html">{{ $properties->projectName }} (Project-{{$properties->projectsid }})</a></h3>
<div class="homec-property__text">
<img src="{{ asset('mdd/front/icon/mdd-location.png') }}" alt="#">
<p>{{ $properties->address }} - {{ $properties->province . ', ' . $properties->city . ', ' . $properties->barangay }}</p>
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
                           

                            <div class="col-lg-12 col-md-12 col-12">
									<div class="homec-location-card mg-top-20">
										<h4 class="homec-ptdetails-features__title">Lot Properties</h4>
                                        <table class="homec-invoice-table">
                                    <thead class="homec-invoice-table__head">
                                        <tr>
                                            <th class="homec-invoice-table__column1">Block</th>
                                            <th class="homec-invoice-table__column2">Lot</th>
                                            <th class="homec-invoice-table__column3">Area</th>
                                            <th class="homec-invoice-table__column4">Price</th>
                                            <th class="homec-invoice-table__column6">Claxss</th>
                                            <th class="homec-invoice-table__column7">Status</th>
                                            <th class="homec-invoice-table__column8">Details</th>
                                        </tr>
                                    </thead>
<tbody class="homec-invoice-table__body">
@foreach($project as $properties)
<tr>
<td class="homec-invoice-table__column1">
    <p class="homec-invoice-table__text">{{ $properties->block }}ddd</p>
</td>
<td class="homec-invoice-table__column2">
    <p class="homec-invoice-table__text">{{ $properties->lot }}</p>
</td>
<td class="homec-invoice-table__column3">
    <p class="homec-invoice-table__text">{{ $properties->lot_area }}</p>
</td>
<td class="homec-invoice-table__column4">
    <p class="homec-invoice-table__text">{{ $properties->price }}</p>
</td>
<td class="homec-invoice-table__column6">
    <p class="homec-invoice-table__text">{{ $properties->prime }}</p>
</td>
<td class="homec-invoice-table__column7">
    <p class="homec-invoice-table__text">available</p>
</td>

<td class="homec-invoice-table__column8">
    {{-- <button type="button"  value="{{ $properties->property_id }}" class="homec-invoice-table--btn ShowDetails">Sample</button> --}}
    <a href="{{ route('front-proprtyLotArea',[$properties->area, $properties->property_id]) }}" class="homec-invoice-table--btn">Continue</a>
</td>


</tr>
@endforeach
</tbody>
                                </table>
									</div>
								</div>







<div class="homec-gmap-canvas mg-top-30">
                                <iframe id="homec-gmap-canvas"  class="homec-gmap-iframe" src="https://maps.google.com/maps?q=&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
                            </div>




                        </div>
                    </div>
                    <!--  End Property Map -->
                    <!--  Property Review -->
                    
                    <!--  End Property Review -->
                </div>
            </div>
        </div>


      

       
    </div>
</div>
</section>
		<!-- End Proterty Details -->

		<!-- Modal  -->
		<div class="homec-modal modal fade" id="ShowinBoxDetails" tabindex="-1" aria-labelledby="invoice_view" aria-hidden="true">
			<div class="homec-modal__width modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<button type="button" class="homec-moal__close" data-bs-dismiss="modal" aria-label="Close">
						<svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M8.96538 11.4998C8.84252 11.3642 8.73942 11.243 8.62945 11.1289C5.9368 8.31163 3.24501 5.49253 0.546342 2.68062C0.107304 2.2226 -0.122954 1.71338 0.0660637 1.06407C0.359901 0.0591085 1.48284 -0.323477 2.28531 0.307878C2.42192 0.415649 2.5422 0.546769 2.66335 0.6734C5.31733 3.44669 7.97132 6.22088 10.6227 8.99687C10.7336 9.11272 10.8212 9.25282 10.9501 9.42166C11.1253 9.24743 11.2482 9.13068 11.3651 9.00854C14.0491 6.20292 16.7349 3.39909 19.4147 0.58898C19.8485 0.134548 20.3288 -0.124101 20.956 0.0600065C21.9346 0.347394 22.3212 1.5634 21.6975 2.40222C21.6012 2.53154 21.4844 2.6447 21.3727 2.76055C18.7101 5.54552 16.0467 8.33138 13.3807 11.1128C13.2707 11.2277 13.1264 11.3067 12.9743 11.4208C13.1539 11.622 13.2544 11.7414 13.3618 11.8546C16.0553 14.6719 18.7471 17.4901 21.4449 20.3029C21.8942 20.7717 22.1314 21.2944 21.9269 21.9607C21.6202 22.9576 20.4783 23.3222 19.693 22.6747C19.5702 22.5732 19.4619 22.4511 19.3511 22.3344C16.6876 19.5503 14.0242 16.7653 11.3599 13.9803C11.2499 13.8654 11.1357 13.7558 11.0051 13.6247C10.8788 13.7495 10.7636 13.8564 10.6545 13.9696C7.94812 16.7976 5.24087 19.6212 2.54306 22.4547C2.10918 22.9109 1.61515 23.104 1.02662 22.9325C0.0841064 22.6586 -0.300803 21.4902 0.265392 20.6549C0.37193 20.4978 0.508538 20.3604 0.639133 20.2229C3.30171 17.4371 5.96515 14.653 8.62859 11.868C8.7377 11.754 8.84252 11.6345 8.96538 11.4998Z" fill="#EB5757"></path>
						</svg>
					</button>
					<div class="homec-modal__inner">
						<div class="homec-header__logo">
							<a href="index.html"><img src="img/logo.png" alt="#"></a>
						</div>

						<div class="homec-invoices  homec-invoice-table--v2 mg-top-30">
							<table class="homec-invoice-table m-0">
								<thead class="homec-invoice-table__head">
									<tr>
										<th class="homec-invoice-table__column1">PROJECT NAME</th>
										<th class="homec-invoice-table__column2">Block</th>
										<th class="homec-invoice-table__column3">Lot</th>
										<th class="homec-invoice-table__column4">Lot Area</th>
										<th class="homec-invoice-table__column5">Price SQM</th>
									</tr>
								</thead>
								<tbody class="homec-invoice-table__body">
									<tr>
										<td class="homec-invoice-table__column1">
											<p class="homec-invoice-table__text" id="the_name"></p>
										</td>
										<td class="homec-invoice-table__column2">
											<p class="homec-invoice-table__text" id="the_block"></p>
										</td>
										<td class="homec-invoice-table__column3">
											<p class="homec-invoice-table__text" id="the_lot"></p>
										</td>
										<td class="homec-invoice-table__column4">
											<p class="homec-invoice-table__text" id="the_area"></p>
										</td>
										<td class="homec-invoice-table__column5">
											<p class="homec-invoice-table__text" id="the_price"></p>
										</td>
									</tr>
								</tbody>
							</table>
						</div>

						<div class="row">
							<div class="col-lg-6 col-md-6 col-12">
								<ul class="homec-modal__list list-none">
									<li><span>Months Term to Pay : </span><p id="the_micsMonth"></p></li>
									<li></li>
									<li></li>
									<li></li>
								</ul>
								</div>
							<div class="col-lg-6 col-md-6 col-12">
<ul class="homec-modal__list homec-modal__list--v2 list-none">
<li><span>Ex. No. of Months to Pay : <span class="text-danger"> 60</span></li>
<li><span>Terms Interest :</span> <span class="text-danger" id="the_term"></span></li>
<li><span>Terms Amount :</span> <span class="text-danger" id="the_term_amount"></span></li>
<li><span>Miscellaneous Interest :</span> <span class="text-danger" id="the_micsInterest"></span></li>
<li><span>Miscellaneous Amount :</span> <span class="text-danger" id="the_misc_interest_amount"></span></li>
<li><span>Miscellaneous Upon Turnover :</span> <span class="text-danger" id="the_UTO"></span></li>
<li><span>Misc Upon Turnover Amount :</span> <span class="text-danger" id="the_misc_u_t_over_amount"></span></li>
<li><span>Discount for Full Paid :</span> <span class="text-danger" id="the_fullPaid"></span></li>
<li><span>Discount Amount :</span> <span class="text-danger" id="the_discount_f_paid_amount"></span></li>
<li><span>Expanded Hoding Tax :</span> <span class="text-danger" id="the_tax"></span></li>
<li><span>Expanded Hoding Tax Amount :</span> <span class="text-danger" id="the_expanded_htax_amount"></span></li>
<li><span>Total Contract Price (TCP) :</span> <span class="text-danger" id="the_lot_price"></span></li>
<li><span>Net TCP with Interest & Misc. :</span> <span id="the_net"></span></li>
<div id="the_net"></div>
</ul>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<!-- End Modal  -->


<script type="text/javascript">

$(document).ready(function () {

    $(document).on('click','.ShowDetails', function() {

        var id = $(this).val();
        var currency = 'PHP'; 

        $('#ShowinBoxDetails').modal('show');

        var xhr = new XMLHttpRequest();
        var the_name = document.getElementById('the_name');
        var the_block = document.getElementById('the_block');
        var the_lot = document.getElementById('the_lot');
        var the_area = document.getElementById('the_area');
        var the_price= document.getElementById('the_price');
        var the_term = document.getElementById('the_term');
        var the_micsInterest = document.getElementById('the_micsInterest');
        var the_UTO = document.getElementById('the_UTO');
        var the_fullPaid = document.getElementById('the_fullPaid');
        var the_lot_price = document.getElementById('the_lot_price');
        var the_term_amount = document.getElementById('the_term_amount');
        var the_misc_interest_amount = document.getElementById('the_misc_interest_amount');
        var the_misc_u_t_over_amount = document.getElementById('the_misc_u_t_over_amount');
        var the_discount_f_paid_amount = document.getElementById('the_discount_f_paid_amount');
        var the_expanded_htax_amount = document.getElementById('the_expanded_htax_amount');

        var the_net = document.getElementById('the_net');
	


       		
 

    xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {

        var data = JSON.parse(xhr.responseText);
        the_name.textContent = data.projectName;
        the_block.textContent  = data.block;
        the_lot.textContent   = data.lot;
        the_area.textContent = data.lot_area;
        the_price.textContent = data.sqm_price;
        the_term.textContent = data.percent_term + '%';
        the_micsInterest.textContent = data.percent_misc_interest + '%';
        the_UTO.textContent = data.percent_misc_u_t_over + '%';
        the_fullPaid.textContent = data.percent_discount_f_paid + '%';
        the_tax.textContent = data.percent_expanded_htax + '%';

        the_lot_price.textContent = parseFloat(data.lot_price.toFixed(2)).toLocaleString('en-PH', {
		  style: 'currency',
		  currency: currency
		});

        the_term_amount.textContent = parseFloat(data.term_amount.toFixed(2)).toLocaleString('en-PH', {
		  style: 'currency',
		  currency: currency
		});

        the_misc_interest_amount.textContent = parseFloat(data.misc_interest_amount.toFixed(2)).toLocaleString('en-PH', {
		  style: 'currency',
		  currency: currency
		});

        the_misc_u_t_over_amount.textContent = parseFloat(data.misc_u_t_over_amount.toFixed(2)).toLocaleString('en-PH', {
		  style: 'currency',
		  currency: currency
		});

        the_discount_f_paid_amount.textContent = parseFloat(data.discount_f_paid_amount.toFixed(2)).toLocaleString('en-PH', {
		  style: 'currency',
		  currency: currency
		});

        the_expanded_htax_amount.textContent = parseFloat(data.expanded_htax_amount.toFixed(2)).toLocaleString('en-PH', {
		  style: 'currency',
		  currency: currency
		});

		the_net.textContent = data.lot_price + data.term_amount + data.misc_interest_amount + data.misc_u_t_over_amount + data.discount_f_paid_amount + data.expanded_htax_amount;
    }
};

    xhr.open('GET', 'http://127.0.0.1:8000/home/properties/selected/lot/' + id, true);
    xhr.send();
    });
});
</script>

@endsection