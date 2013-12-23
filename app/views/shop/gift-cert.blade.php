@extends('master')

@section('content')

<div class="group-gifts inner">
	<div class="gift giftboxes">
		{{ Session::get('msg') }}
		{{ $content }}
		<div class="gift-inner">
			<ul>
				@foreach($gfs as $gf)

				<li>
					<h2 style="font-size: 30px;">${{ $gf->price }}</h2>
					<p>gift certificate</p>
					<div class="buy"><a href="{{ URL::to('cart/addgc/'.$gf->id) }}"><img src="{{ URL::to('/') }}/images/gift_certificate/buy.png" width="77" height="57" alt="" title=""/></a></div>
				</li>

				@endforeach

				<div class="clr"></div>
			</ul>
			
		</div>
	</div>
</div>

@endsection