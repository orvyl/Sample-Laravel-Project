@extends('master')

@section('content')

<div class="group-gifts inner ">
	<div class="help">
		<h1>Founder</h1>
		<div class="founder-inner-container">
			<div class="founder-holder fl">
				<div class="founder-left"></div>
				<div class="founder-mid">							
					<p class="mobile-none">Leaving behind a successful corporate marketing and sales career Richard left his job with a clear vision on how he was going to change the group gifting market forever.  Richard hails from Melbourne Australia where he studied Bachelor of Business Managements and Bachelor of Business Marketing at Monash University. This included a stint studying overseas at the University of Arizona. The idea for Group Gifts came to Richard after wasting many hours organising, sorting and chasing up people for wedding, baby and birthday presents. You can read more about <a href="#"> Richard on his Blog </a> or how the company came about <a href="#">here</a> .</p>
					<p class="info-d-block">Leaving behind a successful corporate marketing and sales career Richard left his job with a clear vision on how he was going to change the group gifting market forever.  Richard hails from Melbourne Australia where he studied Bachelor of Business Managements and Bachelor of Business Marketing at Monash University. This included a stint studying overseas at the University of Arizona.The idea for Group Gifts came to Richard after wasting many hours organising,sorting and chasing up people for wedding, baby and birthday presents.  </p>
					<div class="mobile-profile fr"><img src="{{ URL::to('/') }}/images/founder/mobile_founder.png" width="139" height="204" alt="" title=""/></div>							
					<p class="info-d-block">You can read more about <a href="#"> Richard on his Blog </a> or how the company came about <a href="#">here</a> .</p>
				</div>
				<div class="founder-bottom"></div>
			</div>
			<div class="founder-right fl">
				<img src="{{ URL::to('/') }}/images/founder/pic.png" width="220" height="322" alt="" title=""/>
			</div>
			<div class="clr"></div>
			
			<div class="clr"></div>
		</div>
	</div>
</div>

@endsection