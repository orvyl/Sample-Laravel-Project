<?php
	
	$h_recipient = DB::table('recipient')->orderBy('recipient')->get();
	$h_gc = Giftc::orderBy('price')->take(4)->get();
	$h_occtype = OccType::orderBy('order')->get();

?>
<div class="menu-sub">
	<div class="menu-category fl">
		<h4>Recipient</h4>

		@foreach($h_recipient as $rec)

			<a href="{{ URL::to('shop') }}?recipient%5B0%5D={{ $rec->recipient_id }}">{{ $rec->recipient }}</a>

		@endforeach

	</div>

	@foreach($h_occtype as $occtype)

	<div class="menu-category fl">
		<h4>{{ $occtype->occasion_type }}</h4>

		<?php $occs = Occasion::where('occasion_type',$occtype->id)->orderBy('order')->get(); ?>
		@foreach($occs as $oc)

		<a href="{{ URL::to('shop') }}?occasion%5B0%5D={{ $oc->id }}">{{ $oc->occasion_name }}</a>

		@endforeach
	</div>

	@endforeach

	<div class="menu-category fl">
		<h4>Gift Certificates</h4>
		
		@foreach($h_gc as $gc)

		<a href="{{ URL::to('gift-certificates') }}">{{ $gc->gc_name }}</a>

		@endforeach

		@if(count($h_gc) > 4)
			<a href="{{ URL::to('gift-certificates') }}"><span>More »</span></a>
		@endif
	</div>
	<div class="clr"></div>
	<div class="menu-btn fr"><a href="{{ URL::to('shop') }}">shop all occasions</a></div>
	<div class="clr"></div>
</div>