@extends('master');

@section('content')

<div class="group-gifts ">
	<div class="giftboxes product-details">
		<h1 class="g-l-t">Gift Registry - {{ ucfirst($registry->occasion_type) }}</h1>
		<div class="g-r-top-content" style="width:930px; margin:0 auto;">
			<div class="g-r-t-text" style="padding:5px 0px;">
				<h2 style="font-family:'Helvetica'; font-size:18px; font-weight:bold; color:#fff; padding-bottom:10px; text-shadow:0px 1px 2px #999;">{{ $registry->registry_title }}</h2>
				<h3 style="font-family:'Helvetica'; font-size:16px; font-weight:normal; line-height:normal; color:#fff; text-shadow:0px 1px 2px #999;">{{ $registry->registry_welcome }}</div>

				@if($registry->occasion_type == 'marriage')
				<span style="display:block; font-family:'Helvetica'; font-size:13px; line-height:normal; color:#3b3b3b;">Partner 1 / Bride: {{ $addinfo->bride_fname }} {{ $addinfo->bride_lname }}</span>
				<span style="display:block; font-family:'Helvetica'; font-size:13px; line-height:normal; color:#3b3b3b;">Partner 2 / Groom: {{ $addinfo->groom_fname }} {{ $addinfo->groom_lname }}</span>
				@else
				<span style="display:block; font-family:'Helvetica'; font-size:13px; line-height:normal; color:#3b3b3b;">{{ $addinfo->first_name }} {{ $addinfo->last_name }}</span>
				@endif

				<span style="display:block; font-family:'Helvetica'; font-size:13px; line-height:normal; color:#3b3b3b;">Ends: {{ date('d M Y',strtotime($registry->party_date)) }}</span>
				<label style="display:block; font-family:'Helvetica'; font-size:13px; color:#3b3b3b;">Location: {{ Registry::addressFormat($registry) }}</label>
			</div>
			<div class="clr"></div>
		</div>
		<div class="gift-list-container">
			<ul>

				@foreach($regProds as $prod)

				<li>
					<div class="gift-list-left fl">
						<div class="g-l-l-img fl"><img src="{{ Product::get_primary($prod->id) }}" width="" height="" alt="" title=""/></div>
						<div class="g-l-l-text fr">
							<p>{{ $prod->product_name }}</p>
							<p><span>{{ $prod->short_description }}</span></p>
							<label for="">LOCATION: {{ Product::get_location($prod->id) }}</label>
							<div class="tablet-gift-l">
								<div class="tablet-g-btn fl">
									<a class="view-d" href="{{ URL::to('shop/'.$prod->id) }}" target="_blank">View Detail</a>
									<!-- <a href="">Contribute</a> -->
								</div>
								<div class="g-l-r-price fr">
									<ul>
										<li>
											<label for=""><span>${{ $prod->price }}</span></label>
										</li>
									</ul>
									<div class="g-l-r-arrow"></div>
								</div>
								<div class="clr"></div>
							</div>
						</div>
						<div class="clr"></div>
					</div>
					<div class="gift-list-right fr">
						<div class="g-l-r-price">
							<ul>
								<li>
									<label for=""><span>${{ $prod->price }}</span></label>
								</li>
							</ul>
							<div class="g-l-r-arrow"></div>
						</div>
						<a class="view-d" href="{{ URL::to('shop/'.$prod->id) }}" target="_blank">View Detail</a>
					</div>
					<div class="clr"></div>
				</li>

				@endforeach

				@foreach($wishlists as $wish)

				<li>
					<div class="gift-list-left fl">
						<div class="g-l-l-img fl"><img src="{{ Wishlist::get_img($wish->wish_image) }}" width="" height="" alt="" title=""/></div>
						<div class="g-l-l-text fr">
							<p>{{ $wish->wish_title }}</p>
							<p><span>{{ $wish->wish_desc }}</span></p>
							<label for="">( GIFT CETIFICATE )</label>
							<div class="tablet-gift-l">
								<div class="tablet-g-btn fl">
									<!-- <a class="view-d" href="#" target="_blank">View Detail</a> -->
									<!-- <a href="">Contribute</a> -->
								</div>
								<div class="g-l-r-price fr">
									<ul>
										<li>
											<label for=""><span>${{ $wish->wish_amount }}</span></label>
										</li>
									</ul>
									<div class="g-l-r-arrow"></div>
								</div>
								<div class="clr"></div>
							</div>
						</div>
						<div class="clr"></div>
					</div>
					<div class="gift-list-right fr">
						<div class="g-l-r-price">
							<ul>
								<li>
									<label for=""><span>${{ $wish->wish_amount }}</span></label>
								</li>
							</ul>
							<div class="g-l-r-arrow"></div>
						</div>
						<!-- <a class="view-d" href="#" target="_blank">View Detail</a> -->
					</div>
					<div class="clr"></div>
				</li>

				@endforeach

			</ul>
		</div>
		<div class="registry-btn">
			<a href="{{ URL::to('the-registry/contribute/'.$registry->id) }}">view status and contribute</a>
			<a href="{{ URL::to('registry') }}">cancel</a>
			<div class="clr"></div>
		</div>
		<div style="width: 270px; margin: auto;">
			<a href="{{ URL::to('the-registry/fbshare?id='.$registry->id) }}" style="margin: auto;">
				<img src="{{ URL::to('/') }}/images/fb/share.png" />
			</a>
		</div>
	</div>
</div>

@endsection