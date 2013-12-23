@extends('master')

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=250915141718306";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

@section('content')
<div class="group-gifts home ">
	<div class="home-banner"><img src="{{ URL::to('/') }}/images/home/banner.png" width="1024" height="234" alt="" title="" /></div>
	
	@include('home.carousel')

	<div class="mobile-view-home">
		<div class="top-gift"><img src="{{ URL::to('/') }}/images/mobile_nav/top.png" width="320" height="255" alt="" title=""/></div>
		<ul>
			<li>						
				<p class="mobile-listingsa fl">Gifts by Location</p>						
				<div class="clr"></div>
				<div class="bottom-tab-content home-location">		
					<div class="map">
						<ul>
							<li>
								<div class="tab-map tab-map-1">
									<img src="{{ URL::to('/') }}/images/home/tag_map.png" width="36" height="34" alt="" title=""/>
									<div class="hover-tag-map">
										<a href="#" class="queryst" dtype="location" dval="Western Australia"><span>WA</span>
									</div>
								</div>
							</li>
							<li>
								<div class="tab-map tab-map-2">
									<img src="{{ URL::to('/') }}/images/home/tag_map.png" width="36" height="34" alt="" title=""/>
									<div class="hover-tag-map">
										<a href="#" class="queryst" dtype="location" dval="Northern Territory"><span>NT</span></a>
									</div>
								</div>
								
							</li>
							<li>
								<div class="tab-map tab-map-3">
									<img src="{{ URL::to('/') }}/images/home/tag_map.png" width="36" height="34" alt="" title=""/>
									<div class="hover-tag-map">
										<a href="#" class="queryst" dtype="location" dval="South Australia"><span>SA</span></a>
									</div>
								</div>								
							</li>
							<li>
								<div class="tab-map tab-map-4">
									<img src="{{ URL::to('/') }}/images/home/tag_map.png" width="36" height="34" alt="" title=""/>
									<div class="hover-tag-map">
										<a href="#" class="queryst" dtype="location" dval="Queensland"><span>QLD</span></a>
									</div>
								</div>								
							</li>
							<li>
								<div class="tab-map tab-map-5">
									<img src="{{ URL::to('/') }}/images/home/tag_map.png" width="36" height="34" alt="" title=""/>
									<div class="hover-tag-map">
										<a href="#" class="queryst" dtype="location" dval="New South Wales"><span>NSW</span></a>
									</div>
								</div>
							</li>
							<li>
								<div class="tab-map tab-map-6">
									<img src="{{ URL::to('/') }}/images/home/tag_map.png" width="36" height="34" alt="" title=""/>
									<div class="hover-tag-map">
										<a href="#" class="queryst" dtype="location" dval="Australian Capital Territory"><span>ACT</span></a>
									</div>
								</div>								
							</li>
							<li>
								<div class="tab-map tab-map-7">
									<img src="{{ URL::to('/') }}/images/home/tag_map.png" width="36" height="34" alt="" title=""/>
									<div class="hover-tag-map">
										<a href="#" class="queryst" dtype="location" dval="Victoria"><span>VIC</span></a>
									</div>
								</div>								
							</li>
							<li>
								<div class="tab-map tab-map-8">
									<img src="{{ URL::to('/') }}/images/home/tag_map.png" width="36" height="34" alt="" title=""/>
									<div class="hover-tag-map">
										<a href="#" class="queryst" dtype="location" dval="Tasmania"><span>TAS</span></a>
									</div>
								</div>								
							</li>							
						</ul>
					</div>					
				</div>
			</li>
			<li>												
				
				@include('home.occasion_mob')

			</li>
			<li>												
				
				@include('home.giftrange_mob')

			</li>
		</ul>
	</div>
	<div class="bottom-tabs">
		<ul>
			<li class="mobile-listing">
				<div class="bottom-tab-content home-location">
					<h4>Gifts by Location</h4>							
					<div class="map">
						<ul>
							<li>
								<div class="tab-map tab-map-1">
									<img src="{{ URL::to('/') }}/images/home/tag_map.png" width="36" height="34" alt="" title=""/>
									<div class="hover-tag-map">
										<a href="#" class="queryst" dval="Western Australia" dtype="location"><span>WA</span></a>
									</div>
								</div>
								
							</li>
							<li>
								<div class="tab-map tab-map-2">
									<img src="{{ URL::to('/') }}/images/home/tag_map.png" width="36" height="34" alt="" title=""/>
									<div class="hover-tag-map">
										<a href="#" class="queryst" dval="Northern Territory" dtype="location"><span>NT</span></a>
									</div>
								</div>
								
							</li>
							<li>
								<div class="tab-map tab-map-3">
									<img src="{{ URL::to('/') }}/images/home/tag_map.png" width="36" height="34" alt="" title=""/>
									<div class="hover-tag-map">
										<a href="#" class="queryst" dval="South Australia" dtype="location"><span>SA</span></a>
									</div>
								</div>								
							</li>
							<li>
								<div class="tab-map tab-map-4">
									<img src="{{ URL::to('/') }}/images/home/tag_map.png" width="36" height="34" alt="" title=""/>
									<div class="hover-tag-map">
										<a href="#" class="queryst" dval="Queensland" dtype="location"><span>QLD</span></a>
									</div>
								</div>								
							</li>
							<li>
								<div class="tab-map tab-map-5">
									<img src="{{ URL::to('/') }}/images/home/tag_map.png" width="36" height="34" alt="" title=""/>
									<div class="hover-tag-map">
										<a href="#" class="queryst" dval="New South Wales" dtype="location"><span>NSW</span></a>
									</div>
								</div>
							</li>
							<li>
								<div class="tab-map tab-map-6">
									<img src="{{ URL::to('/') }}/images/home/tag_map.png" width="36" height="34" alt="" title=""/>
									<div class="hover-tag-map">
										<a href="#" class="queryst" dval="Australian Capital Territory" dtype="location"><span>ACT</span></a>
									</div>
								</div>								
							</li>
							<li>
								<div class="tab-map tab-map-7">
									<img src="{{ URL::to('/') }}/images/home/tag_map.png" width="36" height="34" alt="" title=""/>
									<div class="hover-tag-map">
										<a href="#" class="queryst" dval="Victoria" dtype="location"><span>VIC</span></a>
									</div>
								</div>								
							</li>
							<li>
								<div class="tab-map tab-map-8">
									<img src="{{ URL::to('/') }}/images/home/tag_map.png" width="36" height="34" alt="" title=""/>
									<div class="hover-tag-map">
										<a href="#" class="queryst" dval="Tasmania" dtype="location"><span>TAS</span></a>
									</div>
								</div>								
							</li>							
						</ul>
					</div>					
				</div>
			</li>
			<li class="mobile-listing">
				
				@include('home.occasion_pc')

			</li>
			<li id="nletter">
				
				@include('home.newsletter_mob')

			</li>
			<li class="mobile-listing">
				
				@include('home.giftrange_pc')

			</li>
			<li class="mobile-listing">
				<div class="home-fb fr"><img src="{{ URL::to('/') }}/images/home/fb.jpg" width="456" height="213" alt="" title="" /></div>
			</li>
		</ul>
	</div>
	
	@include('home.newsletter_pc')
</div>

@endsection