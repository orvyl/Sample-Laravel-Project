@extends('master')

@section('content')

<div class="group-gifts ">
	<div class="giftboxes product-details">
		{{ Session::get('msg') }}
		@include('product-details.tags')

		<div class="product-right fr">
			
			@include('product-details.top')

		</div>
		<div class="clr"></div>
		<div id="product-tabs" class="product-tab">
			<div class="product-tab-select">
				<ul>
					<li class="active" id="product1"><a onClick="Animate2id('#product-tabs');return false" href="#">Details</a></li>
					<li id="product2"><a onClick="Animate2id('#product-tabs');return false" href="#">Reviews</a></li>
				</ul>
				<div class="clr"></div>
			</div>
			<div class="product-tab-main-content">
				<div class="product-tab-content">
					
					@include('product-details.details-tab')

					@include('product-details.review-tab')

				</div>
			</div>
		</div>
	</div>
</div>

@endsection