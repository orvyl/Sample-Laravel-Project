@extends('master')

@section('content')

<?php $totalPrice = 0.00 ?>

<div class="group-gifts inner ">
	<div class="help about">
		<h1>Registry Detail</h1>
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
					<p>Order Total = <span>$ {{ $totalPrice }}</span></p>
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
				<p>
					<a href="{{ URL::to('registry/contributors?reg='.$registry->id) }}" class="view-det-order" >[ contributors ]</a>
				</p>
			</div>
		</div>
		<div class="payment-3-right-holder payment-4 fr">
			<div class="p-3-r-top">
				<h5>Setup overview</h5>
				<p>Date created: {{ $registry->created_at }}</p>
				<p>Last updated: {{ $registry->updated_at }}</p>
				<p>Occasion type: {{ $registry->occasion_type == 'personal' ? 'Personal':'Marriage' }}</p>
				<p>Registry code: <code style="font-weight: bold; font-size: 16px;">{{ $registry->code }}</code></p>
				<p>Registry link: <br/><a class="view-det-order" style="font-size: 13px;color: #539BAD" target="_blank" href="{{ URL::to('the-registry?c='.$registry->code) }}">{{ URL::to('the-registry?c='.$registry->code) }}</a></p>
				<p>
					<a href="{{ URL::to('my-account/registry-gotosetup') }}?id={{ $registry->id }}" class="view-det-order" >[ edit setup here ]</a>
				</p>
			</div>
			<div class="p-3-left-line"></div>
			<div class="p-3-r-mid">
				<h5>Information</h5>
				<p>Party date / Deadline: {{ date('d M Y', strtotime($registry->party_date)) }}</p>

				@if($registry->occasion_type == 'personal')
				<p>Person name - {{ $addinfo->first_name }} {{ $addinfo->last_name }}</p>
				<p>Birthday - {{ date('d M Y',strtotime($addinfo->bday)) }}</p>
				@else
				<p>Partner 1 / Groom - {{ $addinfo->groom_fname }} {{ $addinfo->groom_lname }}</p>
				<p>Partner 2 / Bride - {{ $addinfo->bride_fname }} {{ $addinfo->bride_lname }}</p>
				<p>Couple type - {{ $addinfo->couple_type }}</p>
				@endif

				<p>Contact email - {{ $registry->email }}</p>
				<p>Address - {{ $registry->address }}</p>
				<p>Suburb - {{ $registry->suburb }}</p>
				<p>Country - {{ DB::table('country')->where('country_id',$registry->country_id)->pluck('country') }}</p>
				<p>Postcode - {{ $registry->postcode }}</p>
				<p>Contact - {{ $registry->contact }}</p>
				<p>
					<a href="#" class="view-det-order" >[ edit information here ]</a>
				</p>
			</div>
			
		</div>
		<div class="clr"></div>
	</div>
	</div>
	<div class="clr"></div>
</div>

@endsection