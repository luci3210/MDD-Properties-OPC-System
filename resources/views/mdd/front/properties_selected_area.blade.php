@extends('mdd.front_master')
@section('content')


		
        <!-- Property Single Slider -->
		<section class="pd-top-80 pd-btm-80">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="homec-property-slides">
							<div class="homec-property-main">
								<div class="flexslider" id="f1">
									
								</div>
								<div class="homec-property-thumbs mg-top-10">
									<div class="flexslider carousel" id="f2"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><br>
		<!-- End Property Single Slider -->

		<!-- Proterty Details -->
        <section class="pd-top-0 homec-bg-third-color pd-btm-80 homec-bg-cover" style="background-image: url('img/property-single-bg.svg');">
            <div class="container">
                <div class="row">                                                   
                    <div class="col-lg-8 ol-12">
                        <div class="list-group homec-list-tabs homec-list-tabs--v2" id="list-tab" role="tablist">
							<a class="list-group-item active" data-bs-toggle="list" href="#homec-pd-tab4" role="tab">Locations </a>
						</div>

                        <div class="homec-pdetails-tab">
                            <div class="tab-content" id="nav-tabContent">

                                <div class="tab-pane fade show active" id="homec-pd-tab4" role="tabpanel">
                                    <div class="homec-pdetails-tab__inner m-0">
										<div class="row">
											<div class="col-lg-6 col-md-6 col-12">
												<div class="homec-location-card mg-top-20">
													<div class="homec-location-card__icon">
														<img src="{{ url('mdd/front/icon/mdd-location.png') }}" alt="#">
													</div>
													<h4 class="homec-location-card__title">Address</h4>
													<p  class="homec-location-card__desc">{{ $project->address}}</p>
												</div>
											</div>

											<div class="col-lg-6 col-md-6 col-12">
												<div class="homec-location-card mg-top-20">
													<h4 class="homec-ptdetails-features__title">Additional Details</h4>
		                                            <ul class="homec-ptdetails-features__list">
		                                                <li><b>Airport:</b> <span>3 KM</span></li>
		                                                <li><b>Hospital:</b> <span>2 KM</span></li>
		                                                <li><b>Breach:</b> <span>3 KM</span></li>
		                                                <li><b>School:</b> <span>4 KM</span></li>
		                                                <li><b>Park:</b> <span>2 KM</span></li>
		                                            </ul>
												</div>
											</div>

											<div class="col-lg-12 col-md-12 col-12">
												<div class="homec-location-card mg-top-20">
													<h4 class="homec-ptdetails-features__title">Additional Details</h4>
		                                            <ul class="homec-ptdetails-features__list">
		                                                <li><b>Airport:</b> <span>3 KM</span></li>
		                                                <li><b>Hospital:</b> <span>2 KM</span></li>
		                                                <li><b>Breach:</b> <span>3 KM</span></li>
		                                                <li><b>School:</b> <span>4 KM</span></li>
		                                                <li><b>Park:</b> <span>2 KM</span></li>
		                                            </ul>
												</div>
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


                  

                    <div class="col-lg-4 col-12">
                        <!-- Property Agent Card -->
                        <div class="homec-property-ag homec-property-ag--side homec-bg-cover" style="background-image: url('img/property-ag-bg.svg');">
                            
                            <!-- End Property Profile -->
                            <form action="#" class="homec-property-ag__form">
                                <div class="form-group">
                                    <input type="text" name="first_name" placeholder="Full Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="fullname" placeholder="Your email">
                                </div>
                                <div class="form-group">
                                    <textarea name="Message" placeholder="Your Message" required="required"></textarea>
                                </div>
                                <button type="submit" class="homec-btn homec-btn__second homec-property-ag__button"><span>Send Message Now</span></button>
                                <hr>
                                <button type="submit" class="homec-btn homec-btn__second homec-property-ag__button"><span>Buy Property</span></button>
                            </form>
                        </div>
                        <!-- End Property Agent Card -->
                    </div>
                </div>
            </div>
        </section>
		<!-- End Proterty Details -->

		
@endsection