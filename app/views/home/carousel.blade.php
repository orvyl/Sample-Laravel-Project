<div class="home-carousel">
	<div class="h-car-left"><img src="{{ URL::to('/') }}/images/home/carousel/left_curl.png" width="79" height="163" alt="" title="" /></div>
	<div class="h-car-right"><img src="{{ URL::to('/') }}/images/home/carousel/right_curl.png" width="79" height="162" alt="" title="" /></div>
	<div class="flexslider carousel">
		<ul class="slides">
			@foreach($randproducts as $prod)
			<li>
				<a href="{{ URL::to('shop/'.$prod->id) }}">
					<img src="{{ Product::get_primary($prod->id) }}" width="158" height="83" alt="" title="" />
					<span>{{ $prod->product_name }}</span>
				</a>
			</li>
			@endforeach
		</ul>
	</div>
</div>