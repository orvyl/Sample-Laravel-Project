<p class="mobile-listingsa fl">Gifts by Occasion</p>							
<div class="clr"></div>
<div class="bottom-tab-content home-occasion">
	<ul>
		@foreach($occtypes as $occ)
		<li><a href="#" class="queryst" dtype="occasion-main" dval="{{ $occ->id }}"><span>{{ $occ->occasion_type }}</span></a></li>
		@endforeach
	</ul>
</div>