@extends('master')

@section('content')

<div class="group-gifts inner">
	<div class="sign-up-field create-registry " style="width:70%; margin:0 auto;" >
		<p style="text-align: center;color: white;font-size: 16px;">Thank you for trusting Group Gifts.</p>
		<p style="text-align: center;color: white;font-size: 16px;">View your order history <a href="{{ URL::to('my-account/order-history') }}" class="view-order">here</a></p>
	</div>
	<div class="clr"></div>
</div>

@endsection