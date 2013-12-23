<div class="bottom-tab-content home-occasion">
	<h4>Gifts by Occasion</h4>
	<ul>
		@foreach($occtypes as $occ)
		<li><a href="#" class="queryst" dtype="occasion-main" dval="{{ $occ->id }}"><span>{{ $occ->occasion_type }}</span></a></li>
		@endforeach
	</ul>
</div>