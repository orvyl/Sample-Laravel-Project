<div class="product-tab-content2" id="comment-area" {{ Session::get('addrevmsg') != '' ? 'style="display: block;"':'' }}>
	<div class="top-review">
		<h4>Product Reviews</h4>
		<p class="fl">Overall Rating</p>
		<div class="rate-star1 fl">
			{{ Mylibrary::displayRate($ratings['overall']) }}
		</div>
		<p class="fl">{{ $ratings['votes'] }} vote(s)</p>
		<div class="clr"></div>
		{{ Session::get('addrevmsg') }}
	</div>
	<div class="bottom-review">
		<div class="review-rate">
			<ul>
				<li>
					<p class="fl">Quality</p>
					<div class="rate-bar1 fl">
						{{ Mylibrary::displayRate($ratings['quality']) }}
					</div>
					<p class="fl">{{ $ratings['quality'] }}/5</p>
					<div class="clr"></div>
				</li>
				<li>
					<p class="fl">Value</p>
					<div class="rate-bar1 fl">
						{{ Mylibrary::displayRate($ratings['value']) }}
					</div>
					<p class="fl">{{ $ratings['value'] }}/5</p>
					<div class="clr"></div>
				</li>
				<li>
					<p class="fl">Service</p>
					<div class="rate-bar1 fl">
						{{ Mylibrary::displayRate($ratings['service']) }}
					</div>
					<p class="fl">{{ $ratings['service'] }}/5</p>
					<div class="clr"></div>
				</li>
				<li>
					<p class="fl">Fun</p>
					<div class="rate-bar1 fl">
						{{ Mylibrary::displayRate($ratings['fun']) }}
					</div>
					<p class="fl">{{ $ratings['fun'] }}/5</p>
					<div class="clr"></div>
				</li>
			</ul>
			<div class="clr"></div>
		</div>
		@if(Rate::allowToRate($product->id))
			@include('product-details.write-comment')
		@endif

		<div class="review-text">
			<ul>

			@foreach($reviews as $rev)
				<li>
					<div class="review-text-left fl">
						<div class="rate-star1">
							{{ Mylibrary::displayRate(intval($rev->votes)) }}
						</div>
						<h4>{{ $rev->first_name.' '.$rev->last_name }}</h4>
						<p><span>Posted {{ date('M d Y',strtotime($rev->date_posted)) }}</span></p>
						<p>{{ $rev->comment }}</p>
					</div>
					<div class="review-text-right fr">
						<div class="review-rate">
							<ul>
								<li>
									<p>Quality</p>
									<div class="rate-bar1 fl">
										{{ Mylibrary::displayRate($rev->score_quality) }}
									</div>
									<p class="fl">{{ $rev->score_quality }}/5</p>
									<div class="clr"></div>
								</li>
								<li>
									<p>Value</p>
									<div class="rate-bar1 fl">
										{{ Mylibrary::displayRate($rev->score_value) }}
									</div>
									<p class="fl">{{ $rev->score_value }}/5</p>
									<div class="clr"></div>
								</li>
								<li>
									<p>Service</p>
									<div class="rate-bar1 fl">
										{{ Mylibrary::displayRate($rev->score_service) }}
									</div>
									<p class="fl">{{ $rev->score_service }}/5</p>
									<div class="clr"></div>
								</li>
								<li>
									<p>Fun</p>
									<div class="rate-bar1 fl">
										{{ Mylibrary::displayRate($rev->score_fun) }}
									</div>
									<p class="fl">{{ $rev->score_fun }}/5</p>
									<div class="clr"></div>
								</li>
							</ul>
							<div class="clr"></div>
						</div>
					</div>
					<div class="clr"></div>
				</li>
			@endforeach

			</ul>
		</div>
	</div>
</div>

<!-- 
				<li>
					<div class="review-text-left fl">
						<div class="rate-star1">
							<span class="rate"></span>
							<span class="rate"></span>
							<span class="rate"></span>
							<span class="rate"></span>
							<span></span>
						</div>
						<h4>Nikki Gil</h4>
						<p><span>Posted January 71 2013</span></p>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
					</div>
					<div class="review-text-right fr">
						<div class="review-rate">
							<ul>
								<li>
									<p>Quality</p>
									<div class="rate-bar1 fl">
										<span class="rate"></span>
										<span class="rate"></span>
										<span class="rate"></span>
										<span class="rate"></span>
										<span></span>
									</div>
									<p class="fl">4/5</p>
									<div class="clr"></div>
								</li>
								<li>
									<p>Value</p>
									<div class="rate-bar1 fl">
										<span class="rate"></span>
										<span class="rate"></span>
										<span class="rate"></span>
										<span class="rate"></span>
										<span></span>
									</div>
									<p class="fl">4/5</p>
									<div class="clr"></div>
								</li>
								<li>
									<p>Service</p>
									<div class="rate-bar1 fl">
										<span class="rate"></span>
										<span class="rate"></span>
										<span class="rate"></span>
										<span class="rate"></span>
										<span></span>
									</div>
									<p class="fl">4/5</p>
									<div class="clr"></div>
								</li>
								<li>
									<p>Fun</p>
									<div class="rate-bar1 fl">
										<span class="rate"></span>
										<span class="rate"></span>
										<span class="rate"></span>
										<span class="rate"></span>
										<span></span>
									</div>
									<p class="fl">4/5</p>
									<div class="clr"></div>
								</li>
							</ul>
							<div class="clr"></div>
						</div>
					</div>
					<div class="clr"></div>
				</li>
 -->