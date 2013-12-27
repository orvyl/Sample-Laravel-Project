@extends('master')

@section('content')

<div id="main-wrapper">
	<div class="group-gifts inner">
		<div class="giftboxes add-payer">
			<h1>Shopping Cart</h1>
			<div class="add-payer-top">
				<div class="fl"><label for="">Product</label></div>
				<div class="fr">
					<label for="">Price</label>
					<label for="">Quantity</label>
					<!-- <label for="">Gifters</label> -->
					<label for="">Subtotal</label>
				</div>
				<div class="clr"></div>
			</div>
			@if(count($cart) > 0)
			<form method="post" action="{{ URL::to('cart/gocheckout') }}">
				@foreach($cart as $prod)
				<div class="add-payer-tab1 cart-tab">
					<div class="add-payer-new">
						<div class="add-payer-mobile">
							<div class="add-tab-mobile-container" style="display:none;">
								<div class="add-mobile-left fl">
									<div class="add-img-c-mobile">
										<img src="{{ Product::get_primary($prod->id) }}" width="158" height="82" alt="" title=""/>
									</div>
									<div class="break-down1">
										<a class="img-remove" href="{{ URL::to('cart/removeitem?id='.$prod->rowid) }}">Remove</a>
									</div>
								</div>
								<div class="main-discr">
									<p>{{ $prod->name }}</p>
									<label for="">Price:<span>${{ $prod->price }}</span></label>
									<div class="add-qty">
										<label for="">Qty</label>
										<input type="text" class="txtcart" value="" placeholder="{{ $prod->qty }}" name="qtys[]"/>
										<input type="hidden" name="rowids[]" value="{{ $prod->rowid }}" />
									</div>
									<div class="clr"></div>
									<!-- <div class="add-gifters">
										<label for="">Gifters</label>
										<input type="text" class="txtcart"/>
									</div> -->
								</div>
								<div class="clr"></div>
							</div>
						</div>
						<div class="cart-img-left fl">
							<div class="add-img-c fl"><img src="{{ Product::get_primary($prod->id) }}" width="158" height="82" alt="" title=""/></div>
							<div class="break-down1 fl">
								<p>{{ $prod->name }}</p>
								<a href="{{ URL::to('cart/removeitem') }}?id={{ $prod->rowid }}">Remove</a>
							</div>
							<div class="clr"></div>							
						</div>
						<div class="fr">
							<ul>
								<li>
									<label for="">$ {{ $prod->price }}</label>
								</li>
								<li>
									<input type="text" class="txtcart" value="{{ $prod->qty }}" name="qtys[]"/>
									<input type="hidden" name="rowids[]" value="{{ $prod->rowid }}" />
								</li>
								<!-- <li>
									<input type="text" class="txtcart"/>
								</li> -->
								<li>
									<label for="">$ {{ $prod->price }}</label>
								</li>
							</ul>
						</div>
						<div class="clr"></div>
					</div>
				</div>
				@endforeach
			@else
				<div class="add-payer-tab1 cart-tab">
					<p style="text-align: center; color: white; font-size: 15px;">Please choose gift(s) <a class="view-order" href="{{ URL::to('shop') }}">here</a></p>
				</div>
			@endif

			@if(count($cart) > 0)

			<div class="subtotal fr">
				<ul>
					<li>
						<p>Total</p>
						<label for="">$ {{ Cart::total() }}</label>
					</li>
					<li>
						<p>Store Credit</p>
						<label for="">($ {{ $store_credit }})</label>
					</li>
					<?php $tot = 0; ?>
					@if(count($vouchers) > 0)
						@foreach($vouchers as $v)

						<li>
							<p>Voucher</p>
							<label for="">($ {{ Giftc::find($v)->price }})</label>
						</li>
						<?php $tot += Giftc::find($v)->price ?>
						@endforeach
					@endif

					<li>
						<div class="p-3-left-line"></div>
					</li>
					<li>
						<p>Subtotal</p>
						<label for=""><b>$ {{ $subtotal - $tot }}</b></label>
					</li>
					<li>
						<div class="gift-btn">
							<!-- <a href="{{ URL::to('cart/payment') }}">checkout</a> -->
							<input type="submit" value="checkout" style="border: none;"/>
						</div>
					</li>
				</ul>
			</div>

			</form>

			<div class="cart-voucher fl">
				<form method="post" action="{{ URL::to('cart/applygc') }}">
					<ul>
						<li>
							<label for="">Voucher Code</label>
						</li>
						<li>
							<input type="text" name="vouch" value=""/>
						</li>
						<li>
							<div class="gift-btn">
								<input type="submit" value="use voucher" style="border: none;" />
							</div>
						</li>
					</ul>
					@if(isset($_GET['vnf']))
					<p style="text-align: center;">Voucher not found!</p>
					@endif
				</form>
			</div>
			
			@endif

			<div class="clr"></div>
		</div>
	</div>
</div>

@endsection