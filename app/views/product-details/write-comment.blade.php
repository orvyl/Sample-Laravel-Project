<div class="write-review">
	<h4>Write Review</h4>

	<form method="post" action="{{ URL::to('shop/addreview') }}">
		<div class="write-review-list">
			<ul>
				<li>
					<p class="fl">Quality</p>
					<div class="rate-star fl">
						<span rated="" atrb="score_quality" val="1" ></span>
						<span rated="" atrb="score_quality" val="2" ></span>
						<span rated="" atrb="score_quality" val="3" ></span>
						<span rated="" atrb="score_quality" val="4" ></span>
						<span rated="" atrb="score_quality" val="5" ></span>
					</div>
					<div class="clr"></div>
				</li>
				<li>
					<p class="fl">Value</p>
					<div class="rate-star fl">
						<span rated="" atrb="score_value" val="1" ></span>
						<span rated="" atrb="score_value" val="2" ></span>
						<span rated="" atrb="score_value" val="3" ></span>
						<span rated="" atrb="score_value" val="4" ></span>
						<span rated="" atrb="score_value" val="5" ></span>
					</div>
					<div class="clr"></div>
				</li>
				<li>
					<p class="fl">Service</p>
					<div class="rate-star fl">
						<span rated="" atrb="score_service" val="1" ></span>
						<span rated="" atrb="score_service" val="2" ></span>
						<span rated="" atrb="score_service" val="3" ></span>
						<span rated="" atrb="score_service" val="4" ></span>
						<span rated="" atrb="score_service" val="5" ></span>
					</div>
					<div class="clr"></div>
				</li>
				<li>
					<p class="fl">Fun</p>
					<div class="rate-star fl">
						<span rated="" atrb="score_fun" val="1" ></span>
						<span rated="" atrb="score_fun" val="2" ></span>
						<span rated="" atrb="score_fun" val="3" ></span>
						<span rated="" atrb="score_fun" val="4" ></span>
						<span rated="" atrb="score_fun" val="5" ></span>
					</div>
					<div class="clr"></div>
				</li>
			</ul>
			<div class="clr"></div>
		</div>
		<div>
			<textarea name="comment" id="" cols="0" rows="0" required></textarea>
			<input type="hidden" name="product_id" value="{{ $product->id }}" />
			<input type="hidden" name="score_quality" value="0" />
			<input type="hidden" name="score_value" value="0" />
			<input type="hidden" name="score_service" value="0" />
			<input type="hidden" name="score_fun" value="0" />
		</div>
		<div class="fr">
			<input type="hidden" name="redirect_to" value="{{ URL::to('registry/add-gift/'.$product->id) }}"/>
			<input type="submit" name="" value="submit" />
		</div>
	</form>
	<div class="clr"></div>
</div>