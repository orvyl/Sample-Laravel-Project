<div class="product-top-reviews">
	<div class="product-review-slider fl">
		<div id="slider" class="flexslider">
			<ul class="slides">

				@if(count($images) > 0)
					@foreach($images as $img)
					<li><img src="{{ URL::to('/') }}/uploads/products/press_{{ $img->image }}" alt=""/></li>
					@endforeach
				@else
					<li><img src="{{ URL::to('/') }}/uploads/products/default.jpg" alt=""/></li>
				@endif
			</ul>
		</div>

		@if(count($images) > 1)
		<div id="carousel" class="flexslider">
			<ul class="slides">

				@foreach($images as $img)
				<li><img src="{{ URL::to('/') }}/uploads/products/press_{{ $img->image }}" alt=""/></li>
				@endforeach

			</ul>
		</div>
		@endif

	</div>
	<div class="product-review-right fr">
		<h4>{{ $product->product_name }}</h4>
		<div class="product-review-middle">
			<div class="p-d-location fl">
				<p>LOCATION:{{ Product::get_location($product->id) }}</p>
				<p>FOR: {{ Product::get_recipient($product->id) }}</p>
				<div class="p-r-m-review">
					<p>Product Rating</p>
					<div class="rate-star1 fl">
						{{ Mylibrary::displayRate($ratings['overall']) }}
					</div>
					<p class="product-details-p fl">{{ $ratings['votes'] }} vote(s)</p>
					<div class="clr"></div>
				</div>
			</div>
			<div class="fr">
				<div class="gift-price">
					<div class="g-price-arrow"><img src="{{ URL::to('/') }}/images/gift_boxes/price_arrow.png" width="22" height="21" alt="" title="" /></div>
					<p><strong> $ {{ $product->price }}</strong></p>
				</div>

				@if(Request::segment(2) == 'add-gift')

				<div class="product-btn product-d-btn">
					<a href="{{ URL::to('registry/additem?additem='.$product->id) }}">add to registry</a>
				</div>

				@else

				<div class="product-btn product-d-btn">
					<a href="{{ URL::to('cart/addprod/'.$product->id) }}">add to cart</a>
				</div>

				@endif

			</div>
			<div class="clr"></div>
			<div class="fl">
				<p><a href="">Valid for {{ $product->validity }}</a> <br/><a href="">{{ $product->free_exchange ? 'Free exchange':'&nbsp;' }}</a></p>
			</div>

			@if(Request::segment(2) == 'add-gift')

			<div class="product-btn fr">
				<a href="{{ URL::to('registry/additem?additem='.$product->id) }}">add to registry</a>
			</div>

			@else

			<div class="product-btn fr">
				<a href="{{ URL::to('cart/addprod/'.$product->id) }}">add to cart</a>
			</div>

			@endif

			<div class="clr"></div>
		</div>
		<p style="color:#fff;">Estimated Delivery Time: {{ $product->delivery_date != '1970-01-01' ? date('M d, Y',strtotime($product->delivery_date)):'N/A' }}</p>
		<p style="color:#fff;">Estimated Delivery Costs: $ {{ $product->delivery_cost }}</p>
	</div>
	<div class="clr"></div>
</div>