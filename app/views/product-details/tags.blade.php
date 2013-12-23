<div class="giftboxes-left product-details-left fl">
	<h4>Back to Listings</h4>
	<div class="giftboxes-tab">
		<h2>TAGS</h2>
		<div class="giftboxes-selection-tab">
			<ul class="select-desktop">
				@foreach($tags as $tag)

				<li><a href="">{{ $tag }}</a></li>

				@endforeach
			</ul>
			<ul class="select-tablet" style="display:none;">
				<li>
					@foreach($tags as $tag)

					<a href="">{{ $tag }}</a>

					@endforeach
				</li>
			</ul>
		</div>
	</div>
</div>