
<script type="text/javascript">
	var filters = <?php echo json_encode($_GET) ?>;
</script>

<div class="giftboxes-left gift-boxes-mobile fl">
	<h4>Refine your Search</h4>

	<div class="giftboxes-tab">
		<h2>You have chosen:</h2>
		<div class="giftboxes-selection-tab refine-selected">
			@if(count($listfilters) == 0)
			<p style="text-align: center;font-size: 13px;">( none )</p>
			@else
			<ul>
				@foreach($listfilters as $val)
				<?php $v = explode('|', $val) ?>

				<li><span class="remqry" dtype="{{ $v[1] }}" dval="{{ $v[2] }}">{{ $v[0] }}</span></li>
				@endforeach
			</ul>
			@endif
		</div>
	</div>

	<div class="giftboxes-tab">
		<h2 class="click-tab"><span>Location</span></h2>
		<div class="giftboxes-selection-tab">
			<ul>
				@foreach($locations as $location)

				<li><a href="#" class="queryst" dtype="location" dval="{{ $location->state }}">{{ $location->state }} </a></li>

				@endforeach

			</ul>
		</div>
	</div>
	<div class="giftboxes-tab">
		<h2 class="click-tab"><span>Recipient</span></h2>
		<div class="giftboxes-selection-tab">
			<ul>
				@foreach($recipients as $recipient)

				<li><a href="#" class="queryst" dtype="recipient" dval="{{ $recipient->recipient_id }}">{{ $recipient->recipient }}</a></li>

				@endforeach
			</ul>
		</div>
	</div>

	<div class="giftboxes-tab">
		<h2 class="click-tab"><span>Occasion</span></h2>
		<div class="giftboxes-selection-tab birthday-container">
			<ul>
				@foreach($occasions as $occt)
					<?php $occs = Occasion::where('occasion_type','=',$occt->id)->get(); ?>
					@if(count($occs) > 0)

					<li>
						<a class="birthday-click" dtype="occasion" dval="sadsad">{{ $occt->occasion_type }}</a>
						<ul class="birthday-sub">
							@foreach($occs as $occ)
							<li><a href="#" class="queryst" dtype="occasion" dval="{{ $occ->id }}">{{ $occ->occasion_name }}</a></li>
							@endforeach
							<li><a href="#" class="queryst" dtype="occasion-main" dval="{{ $occt->id }}">All {{ $occt->occasion_type }}</a></li>
						</ul>
					</li>

					@endif
				@endforeach
			</ul>
		</div>
	</div>
	
	<div class="giftboxes-tab">
		<h2 class="click-tab"><span>Gifts by Price Range</span></h2>
		<div class="home-price-range">
			<form action="" method="post">
				<ul>
					<li>
						<input type="checkbox" class="prange" id="c1" dtype="pricer" dval="0-125" {{ isset($_GET['pricer']) && in_array('0-125',$_GET['pricer']) ? 'checked':'' }}/>
						<label for="c1"><span></span>$ 0 - 125</label>
					</li>
					<li>
						<input type="checkbox" class="prange" id="c2" dtype="pricer" dval="126-225" {{ isset($_GET['pricer']) && in_array('126-225',$_GET['pricer']) ? 'checked':'' }}/>
						<label for="c2"><span></span>$ 126 - 225</label>
					</li>
					<li>
						<input type="checkbox" class="prange" id="c3" dtype="pricer" dval="256-325" {{ isset($_GET['pricer']) && in_array('226-325',$_GET['pricer']) ? 'checked':'' }}/>
						<label for="c3"><span></span>$ 226 - 325</label>
					</li>
					<li>
						<input type="checkbox" class="prange" id="c4" dtype="pricer" dval="326-500" {{ isset($_GET['pricer']) && in_array('326-500',$_GET['pricer']) ? 'checked':'' }}/>
						<label for="c4"><span></span>$ 326 - 500</label>
					</li>
					<li>
						<input type="checkbox" class="prange" id="c5" dtype="pricer" dval="501" {{ isset($_GET['pricer']) && in_array('501',$_GET['pricer']) ? 'checked':'' }}/>
						<label for="c5"><span></span>$ 501</label>
					</li>
				</ul>
				<div style="margin-top:25px;">
					<p class="fl">or</p>
					<p class="fl">$</p>
					<div class="seperate-class fl"><input type="text" name="" value="" class="prcnum1" /></div>
					<p class="seperate-info fl" style="margin:3px 10px;">to</p>
					<p class="fl">$</p>
					<div class="fl"><input type="text" name="" value="" class="prcnum2" /></div>
					<div class="clr"></div>
				</div>
				<div><input type="submit" name="" value="" id="btncustpr"/></div>
			</form>
		</div>
	</div>
</div>