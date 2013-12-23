@extends('master')


@section('content')

<div class="group-gifts inner">
	<div class="giftboxes">
		
		@include('shop.sidebar-left')

		<div class="shop-listing-right fr">
			@if(count($listfilters) > 0)
				<h4 class="result-text fl">{{ count($products) }} Result(s)</h4>
			@endif
			<div class="result-text mobile-result-text fr">
				<h4 class="fl" style="font-weight:normal; margin-right:10px;">Sort:</h4>
				<div class="fl">
					<form method="get" id="frmsort" action="">
						<select name="sort" id="gift-1" style="width:195px;">
							
							<option name="" title="" >Name by ascending</option>
							<option name="" title="" >Name by descending</option>
							<option name="" title="" >Date by ascending</option>
							<option name="" title="" >Date by descending</option>
						</select>
					</form>
				</div>
			</div>
			<div class="clr"></div>
			
			@include('shop.product-list')

		</div>
		<div class="clr"></div>
	</div>
</div>

@endsection