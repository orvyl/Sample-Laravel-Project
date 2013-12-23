@extends('master')

@section('content')

<?php $totalPrice = 0; ?>
	
<div class="group-gifts inner">
	<div class="help about">
		<h1>Contribute to registry</h1>

		{{ Session::get('error') }}

		<form method="post" action="{{ URL::to('the-registry/processcontribute') }}">
			<div class="payment-3">
				<div class="payment-3-left-holder fl">
					<div class="payment-3-left">
						<div class="p-3-top-left">
							<div class="payment-3-pic-holder payment-img fl"><img src="{{ URL::to('/') }}/images/home/carousel/carousel2.jpg" width="153" height="83" alt="" title=""/></div>
							<div class="p-3-racing payment-title fl">
								@foreach($regProds as $prod)

								<p>${{ $prod->price }} x {{ $prod->qty }} | {{ $prod->product_name }}</p>
								<?php $totalPrice += $prod->price ?>

								@endforeach

								@foreach($wishlists as $wish)

								<p>${{ $wish->wish_amount }} x 1 | {{ $wish->wish_title }} - [wish]</p>
								<?php $totalPrice += $wish->wish_amount ?>
								
								@endforeach
							</div>
							<div class="clr"></div>
						</div>
						<div class="p-3-left-line"></div>
						<div class="p-3-bottm-left">
							<p>Total = <span>$ {{ $totalPrice }}</span></p>
						</div>
					</div>
					<?php

					$pip = ($sumContribution / $totalPrice) * 100;
					$paidInPercent = round(($pip > 100 ? 100:$pip), 2);

					?>

					<div class="payment-3-left-2 payment-getting-done">
						<h5>Paid Status</h5>
						<div class="payment-3-load-holder">
							<div class="payment-load" style="width: {{ $paidInPercent }}%"></div>
						</div>
						<p>{{ $paidInPercent }}% paid</p>
						<p>Payment Deadline: {{ date('d M Y', strtotime($registry->party_date)) }}</p>
					</div>
				</div>
				<div class="payment-3-right-holder fr">

					<div class="p-3-r-top">
						<div class="p-3-radio1 payment-3">
							<label for=""><h5>How much do you want to contribute?</h5></label>
							<div class="clr"></div>
						</div>
						<div class="p-3-card-type">
							
							<ul>
								<li>
									<label>Amount ($)</label>
									<input type="text" name="amountcontribute" value="{{ Input::old('amountcontribute') }}" placeholder = "0.00"/>
									<div class="clr"></div>
								</li>
							</ul>

						</div>
					</div>
					<div class="p-3-left-line"></div>

					<div class="p-3-r-mid">
						<div class="p-3-radio1 payment-3">
							<input type="radio" name="type_card" value="credit" {{ Input::old('type_card') == 'credit' || !isset($_POST['type_card']) ? 'checked':'' }}/><label for=""><h5>Credit Card</h5></label>
							<div class="clr"></div>
						</div>
						<div class="p-3-card-type">
							
							@include('registry.payment.frmcredit')

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
							<input type="radio" name="card" id=""/><label for=""><h5>Credit</h5></label>
							<p class="fr">$ 99.00</p>
							<div class="clr"></div>
						</div>
					</div> -->
					<div class="p-3-left-line"></div>
					<div class="p-3-right-last">
						<input type="checkbox" id="c1" name="agree" />
						<label for="c1"><span></span>I agree to the<a href="#">Terms and Conditions</a></label>
					</div>
					<div class="clr"></div>
					
				</div>
				<div class="p-3-confirm fr">
					<input type="submit" value="contribute" />
				</div>
				<div class="clr"></div>

				<input type="hidden" name="rid" value="{{ Request::segment(3) }}" />

			</div>
		</form>
	</div>
	<div class="clr"></div>
</div>

@endsection