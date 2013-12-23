<div class="giftboxes-right">
	<div class="giftboxes-right-content">

		@if(count($products) > 0)

		<ul>
			@foreach($products as $product)

			<li>
				<div class="giftboxes-img loader fl">
					<a href="{{ URL::to('shop/'.$product->id) }}">
						<img src="{{ Product::get_primary($product->id) }}" width="158" height="83" alt="" title="" />
					</a>
				</div>
				<div class="gift-amount mobile-price fr">
					<div class="gift-price">
						<div class="g-price-arrow"><img src="{{ URL::to('/') }}/images/gift_boxes/price_arrow.png" width="22" height="21" alt="" title="" /></div>
						<p>
							<strong> $ {{ $product->price }}</strong>
						</p>
					</div>
					<div class="gift-btn"><a href="{{ URL::to('shop/'.$product->id) }}">view</a></div>
				</div>
				<div class="giftboxes-text fl">
					<h4>{{ $product->product_name }}</h4>
					<p>{{ $product->short_description }}</p>
					<p><span>LOCATION: {{ Product::get_location($product->id) }}</span></p>
				</div>
				<div class="gift-amount desktop-price fr">
					<div class="gift-price">
						<div class="g-price-arrow"><img src="{{ URL::to('/') }}/images/gift_boxes/price_arrow.png" width="22" height="21" alt="" title="" /></div>
						<p><strong> $ {{ $product->price }}</strong></p>
					</div>
					<div class="gift-btn"><a href="{{ URL::to('shop/'.$product->id) }}">view</a></div>
				</div>
				<div class="clr"></div>
			</li>

			@endforeach
		</ul>

		@else

		<p style="text-align: center;color: white;font-size: 15px;margin: 10px;"><span>No result found</span></p>

		@endif

	</div>
</div>