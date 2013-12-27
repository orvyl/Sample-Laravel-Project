<div class="payment-3-left-holder fl">
	<div class="payment-3-left">
		<div class="p-3-top-left">
			<div class="payment-3-pic-holder payment-img fl"><img src="{{ URL::to('/') }}/images/home/carousel/carousel2.jpg" width="153" height="83" alt="" title=""/></div>
			<div class="p-3-racing payment-title fl">
				@foreach($cart as $prod)
				<p>{{ $prod->qty }} x ${{ $prod->price }} {{ $prod->name }}</p>
				@endforeach
			</div>
			<div class="clr"></div>
		</div>
		<div class="p-3-left-line"></div>
		<div class="p-3-mid-left">
			<div class="p-3-mid-inner-left fl">
				<ul class="p-3-inner-left fl">
					<li>Total =</li>
					@if(count($vouchers) > 0)
						@foreach($vouchers as $v)

						<li>
							Voucher
						</li>
						@endforeach
					@endif
					<li>Store Credit =</li>
				</ul>
				<ul class="p-3-inner-right fl">
					<li>$ {{ Cart::total() }}</li>
					<?php $tot = 0; ?>
					@if(count($vouchers) > 0)
						@foreach($vouchers as $v)

						<li>($ {{ Giftc::find($v)->price }})</li>
						<?php $tot += Giftc::find($v)->price ?>
						@endforeach
					@endif
					<li>($ {{ $store_credit }})</li>
				</ul>
				<div class="clr"></div>
			</div>
			<div class="clr"></div>
		</div>
		<div class="p-3-left-line"></div>
		<div class="p-3-bottm-left">
			<p>Order Total = <span>$ {{ $subtotal - $tot }}</span></p>
		</div>
	</div>
</div>