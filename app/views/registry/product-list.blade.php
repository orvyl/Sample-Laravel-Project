<div class="giftboxes-right">
	<div class="giftboxes-right-content add-gift-main">

		@if(count($products) > 0)

		<ul>
			<?php $ctrCh = 0 ?>
			@foreach($products as $product)

			<li>
				<div class="add-gift-check fl">
					<input class="checkall" type="checkbox" id="c10{{ $ctrCh }}" value="{{ $product->id }}" name="add_product_registry[]" />
					<label for="c10{{ $ctrCh }}"><span></span></label>
				</div>
				<div class="giftboxes-img loader fl">
					<a href="{{ URL::to('registry/add-gift/'.$product->id) }}">
						<img src="{{ Product::get_primary($product->id) }}" width="158" height="83" alt="" title="" />
					</a>
				</div>
				<div class="gift-amount mobile-price fr">
					<div class="gift-price add-to-registry">
						<!-- <div class="g-price-arrow">
							<img src="{{ URL::to('/') }}/images/gift_boxes/price_arrow.png" width="22" height="21" alt="" title="" />
						</div> -->
						<!-- <p class="line-trought-text">Was $399</p> -->
						<p><strong> $ {{ $product->price }}</strong></p>
					</div>
					<div class="clr"></div>
					<div class="gift-btn m-h-add-btn"><a href="{{ URL::to('registry/additem?additem='.$product->id) }}">add to registry</a></div>
					<div class="gift-btn m-d-add-btn"><a href="{{ URL::to('registry/additem?additem='.$product->id) }}">add</a></div>
				</div>
				<div class="giftboxes-text fl">
					<h4>{{ $product->product_name }}</h4>
					<p>{{ $product->short_description }}</p>
					<p><span>LOCATION: {{ Product::get_location($product->id) }}</span></p>
				</div>
				<div class="gift-amount desktop-price add-gift-price fr">
					<div class="gift-price">
						<!-- <div class="g-price-arrow"><img src="{{ URL::to('/') }}/images/gift_boxes/price_arrow.png" width="22" height="21" alt="" title="" /></div> -->
						<!-- <p class="line-trought-text">Was $399</p> -->
						<p><strong> $ {{ $product->price }}</strong></p>
						<!-- <div class="arrow-container">
							<img src="{{ URL::to('/') }}/images/add_gifts/arrow.png" width="25" height="52" alt="" title=""/>
						</div> -->
					</div>
					<div class="gift-btn add-gift-btn"><a href="{{ URL::to('registry/additem?additem='.$product->id) }}">add to registry</a></div>
				</div>
				<div class="clr"></div>
			</li>
			<?php $ctrCh++; ?>
			@endforeach
		</ul>

		@else

		<p style="text-align: center;color: white;font-size: 15px;margin: 10px;"><span>No result found</span></p>

		@endif
	</div>
</div>