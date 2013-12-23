@extends('master')

@section('content')

<div class="group-gifts inner ">
	<div class="help about">
		<h1>Order Detail</h1>
	<div class="payment-3">
		<div class="payment-3-left-holder fl">
			<div class="payment-3-left">
				<div class="p-3-top-left">
					<div class="payment-3-pic-holder payment-img fl"><img src="{{ URL::to('/') }}/images/home/carousel/carousel2.jpg" width="153" height="83" alt="" title=""/></div>
					<div class="p-3-racing payment-title fl">
						@foreach($orderProds as $prod)

						<p>${{ $prod->price }} x {{ $prod->quantity }} | {{ $prod->product_name }}</p>

						@endforeach
					</div>
					<div class="clr"></div>
				</div>
				<div class="p-3-left-line"></div>
				<div class="p-3-mid-left">
					<div class="p-3-mid-inner-left fl">
						<ul class="p-3-inner-left fl">
							<li>Total =</li>
							<li>Store Credit =</li>
						</ul>
						<ul class="p-3-inner-right fl">
							<li>$ {{ $order->total + $order->store_credit }}</li>
							<li>($ {{ $order->store_credit }})</li>
						</ul>
						<div class="clr"></div>
					</div>
					<div class="clr"></div>
				</div>
				<div class="p-3-left-line"></div>
				<div class="p-3-bottm-left">
					<p>Order Total = <span>$ {{ $order->total }}</span></p>
				</div>
			</div>
		</div>
		<div class="payment-3-right-holder payment-4 fr">
			<div class="p-3-r-top">
				<h5>Payment Overview</h5>
				<p>Date: {{ date('d M Y',strtotime($order->created_at)) }}</p>
				<p>Payment method: {{ $order->payment_type == 'paypal' ? 'Paypal':'Credit Card' }}</p>
			</div>
			<div class="p-3-left-line"></div>
			<div class="p-3-r-mid">
				<h5>Transaction details</h5>
				<p>ID - {{ $order->paypaltrans_id }}</p>
				<p>Payer ID(paypal) - {{ $order->payer_id == '' ? 'n/a':$order->payer_id }}</p>
				<p>First Name - {{ $order->first_name }}</p>
				<p>Last Name - {{ $order->last_name }}</p>
			</div>
			
		</div>
		<div class="clr"></div>
	</div>
	</div>
	<div class="clr"></div>
</div>

@endsection