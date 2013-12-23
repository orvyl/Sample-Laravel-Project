@extends('master')

@section('content')

<div class="group-gifts inner">
	<div class="help about">
		<h1>Order Review</h1>

		{{ Session::get('error') }}

		<form method="post" action="{{ URL::to('cart/pay') }}">
			<div class="payment-3">
			
				@include('cart.order-det-pay')

				<div class="payment-3-right-holder fr">
					<div class="p-3-r-top">
						<div class="p-3-radio1 payment-3">
							<input type="radio" name="type_card" value="credit" {{ Input::old('type_card') == 'credit' || !isset($_POST['type_card']) ? 'checked':'' }}/><label for=""><h5>Credit Card</h5></label>
							<div class="clr"></div>
						</div>
						<div class="p-3-card-type">

							@include('cart.frm-pay-credit')

						</div>
					</div>
					<div class="p-3-left-line"></div>
					<div class="p-3-r-mid">
						<div class="p-3-radio1">
							<input type="radio" name="type_card" value="paypal" {{ Input::old('type_card') == 'paypal' ? 'checked':'' }}/><label for=""><h5>Paypal</h5></label>
							<div class="clr"></div>
						</div>
						<div class="paypal fl"><img src="{{ URL::to('/') }}/images/payment_3/paypal.jpg" width="96"  height="59" alt="" title=""/></div>
						<div class="paypal-content fl">
							<p>Pay securely with PayPal by selecting this payment option and pressing the Place Order button to be taken to your PayPal account.</p>
						</div>
						<div class="clr"></div>
					</div>
					<!-- <div class="p-3-left-line"></div>
					<div class="p-3-right-bottom1">
						<div class="p-3-radio1  p-3-buttom1">
							<input type="radio" name="card" value="store-credit"/><label for=""><h5>Credit</h5></label>
							<p class="fr">$ 99.00</p>
							<div class="clr"></div>
						</div>
					</div> -->
					<div class="p-3-left-line"></div>
					<div class="p-3-right-last">
						<input type="checkbox" id="c1" name="agree" />
						<label for="c1"><span></span>I agree to the<a href="{{ URL::to('terms-and-conditions') }}">Terms and Conditions</a></label>
					</div>
					<div class="clr"></div>
					
				</div>
				<div class="p-3-confirm fr">
					<input type="submit" value="confirm payment" />
				</div>
				<div class="clr"></div>
			</div>
		</form>

	</div>
	<div class="clr"></div>
</div>

@endsection