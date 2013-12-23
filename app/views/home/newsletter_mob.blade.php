<div class="subcription-m">
	<div class="newsletter fl">
		<div class="newsletter-logo"><img src="{{ URL::to('/') }}/images/home/newsletter.png" width="107" height="152" alt="" title="" /></div>
		<h3>Subscribe to our Newsletter <br/>for great deals</h3>
		<div class="newsletter-field">
			<form action="{{ URL::to('add-newsletter') }}" method="post">
				<div class="fl"><input type="text" name="em" placeholder="EMAIL ADDRESS" {{ Input::old('em') }}/></div>
				<div class="opac fl"><input type="submit" name="btn" value="" /></div>
				<div class="clr"></div>
				<p style="color: red">{{ $errors->first('em') }}</p>
				<p>{{ Session::get('success_newsletter') }}</p>
			</form>
		</div>
		<h3>Connect with us</h3>
		<div class="social opac">
			<a href="http://www.facebook.com/" target="_blank"><img src="{{ URL::to('/') }}/images/home/social1.jpg" width="43" height="37" alt="" title="Like us on Facebook" /></a>
			<a href="http://www.twitter.com/" target="_blank"><img src="{{ URL::to('/') }}/images/home/social2.jpg" width="43" height="37" alt="" title="Follow us on Twitter" /></a>
			<a href="http://www.plus.google.com/" target="_blank"><img src="{{ URL::to('/') }}/images/home/social3.jpg" width="43" height="37" alt="" title="Find us on Google+" /></a>
		</div>
	</div>					
	<div class="clr"></div>
</div>