@extends('mdd.front_master')
@section('content')

<section class="breadcrumbs__content" style="background-image: url({{ asset('mdd/front/img/1920x455/map.png') }});">>
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
		<section class="homec-propertys pd-top-10 pd-btm-80">
			<div class="container">
				<div class="row">
					
					<div class="col-lg-12 col-12">

						<div class="tab-content" id="nav-tabContent">
							<!-- Grid Tab -->
							<div class="tab-pane fade show active" id="homec-grid" role="tabpanel">
								<div class="row">
@foreach($project as $projects)
<div class="col-md-4 col-12 mg-top-30">
	<div class="homec-property">
		<div class="homec-property__head">
			<img src="{{ asset('mdd/assets/images/project')}}/{{ $projects->skitch_img == null ? 'logo.png' : json_decode($projects->skitch_img)[0] }}" alt="#">
		</div>

		<div class="homec-property__body">
			<div class="homec-property__topbar">
				<span class="homec-property__salebadge">To Sale</span>
			</div>
			<h3 class="homec-property__title"><a href="{{ route('front-properties-selected',$projects->area) }}">{{ $projects->name }}</a></h3>
			<div class="homec-property__text">
				<img src="{{ url('mdd/front/icon/mdd-location.png') }}" alt="#"><p><a href="{{ route('front-properties-selected',$projects->area) }}">{{ $projects->address }}</a></p>
			</div>
		</div>
	</div>
</div>



@endforeach
									
</div>

{{-- <div class="row mg-top-40">
	<div class="homec-pagination">
		<ul class="homec-pagination__list list-none">
			<li class="homec-pagination__button"><a href="#">Prev</a></li>
			<li><a href="#">01</a></li>
			<li class="active"><a href="#">02</a></li>
			<li><a href="#">03</a></li>
			<li><a href="#">04</a></li>
			<li><a href="#">05</a></li>
			<li><a href="#">...</a></li>
			<li><a href="#">24</a></li>
			<li class="homec-pagination__button"><a href="#">Next</a></li>
		</ul>
	</div>
</div> --}}

</div>

						</div>
					</div>
				</div>
			</div>
		</section>
@endsection