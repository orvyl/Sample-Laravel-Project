<div class="user-search fr">
	<div class="user-s-inner">					
		<div class="search fr">
			<form class="tab-hide-top" action="{{ URL::to('shop') }}" method="get">
				<div class="checkout fl"><a href="{{ URL::to('cart') }}">my cart</a></div>
				<p class="search-d fl"><span>|</span> Search by Occasion or Product</p>
				<div class="search-d fl"><input type="text" name="st[]" value="" /></div>
				<div class="search-d fl opac"><input type="submit" name="" value="" /></div>
				<div class="fl"></div>
			</form>
			<form action="{{ URL::to('shop') }}" method="get">
				<div class="search-tablet fl">
					<p class="fl"> Search by Occasion or Product</p>
					<div class="fl"><input type="text" name="st[]" value="" /></div>
					<div class="fl opac"><input type="submit" name="" value="" /></div>
					<div class="clr"></div>
				</div>
			</form>
			<div class="clr"></div>
		</div>
		<div class="fr">
			<div class="shopping-cart"><a href="{{ URL::to('cart') }}"><div class="shop-basket"><img src="{{ URL::to('/') }}/images/page_template/shopping_basket.png" width="51" height="46" alt="" title="" /></div> <span>{{ Cart::count(false) }}</span></a></div>
			<div class="clr"></div>
		</div>
		<div class="clr"></div>
	</div>				
</div>