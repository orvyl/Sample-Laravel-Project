<div id="header-wrapper" class="">
	<div class="logo"><a href="{{ URL::to('/') }}"><img src="{{ URL::to('/') }}/images/page_template/logo.png" width="190" height="218" alt="" title="" /></a></div>
	<div class="user-control fr">
		<ul>
			@if(Auth::check() && Auth::user()->usertype == 'client')
			<li><a href="{{ URL::to('my-account') }}">my account</a></li>
			<li><a href="{{ URL::to('my-account/bye') }}">logout</a></li>
			@else
			<li><a href="{{ URL::to('signup') }}">signup</a></li>
			<li><a href="{{ URL::to('login') }}">login</a></li>
			@endif
		</ul>
	</div>
	<div class="clr"></div>
	<div class="header-content fr">
		<div class="menu fr">
			<ul>
				<li><a href="{{ URL::to('/') }}">Home</a></li>					
				<li><a href="{{ URL::to('how-it-works') }}">How It Works</a></li>
				<li><a href="{{ URL::to('registry') }}">Gift registry</a></li>					
				<li>
					<a href="{{ URL::to('shop') }}">Shop</a>
					
					@include('includes.shop-list-cat')

				</li>
				<li><a href="{{ URL::to('contact-us') }}">Contact Us</a></li>				
			</ul>
			<div class="clr"></div>
		</div>
		<div class="clr"></div>
		
		@include('includes.search-h')

		<div class="header-bottom-line"><img src="{{ URL::to('/') }}/images/page_template/header_bottom_line.png" width="38" height="36" alt="" title="" /></div>
		<div class="header-top-line"><img src="{{ URL::to('/') }}/images/page_template/header_top_line.png" width="40" height="14" alt="" title="" /></div>
		<div class="clr"></div>
	</div>
	<div class="clr"></div>
	<div class="top-content-mobile">
		<div class="user-control fr">
			<div class="shopping-cart m-shopping-cart"><a href="{{ URL::to('cart') }}"><div class="shop-basket"><img src="{{ URL::to('/') }}/images/page_template/shopping_basket.png" width="51" height="46" alt="" title="" /></div> <span>{{ Cart::count(false) }}</span></a></div>
			<ul>					
				<li><a href="{{ URL::to('cart') }}">checkout</a></li>
			</ul>
		</div>
		<div class="clr"></div>
		<div class="menu-mobile">
			<ul>
				<li class="fl"><form method="get" action="{{ URL::to('shop') }}"><input type="text" name="st[]" placeholder="Search"/></form></li>
				<li class="fr">
					<p>Menu</p>
					
				</li>					
			</ul>
			<div class="clr"></div>
			<div class="sub-menu">
				<ul>
					<li><a href="{{ URL::to('/') }}">Home</a></li>
					<li><a href="{{ URL::to('how-it-works') }}">How it Works</a></li>
					<li><a href="{{ URL::to('registry') }}">Gift Registry</a></li>
					<li><a href="{{ URL::to('shop') }}">Shop</a></li>
					<li><a href="{{ URL::to('contact-us') }}">Contact Us</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>