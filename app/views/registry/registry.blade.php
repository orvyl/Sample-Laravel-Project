@extends('master')

@section('content')

	<div class="group-gifts inner">
			<div class="giftboxes gift-r-container">
				<h1>Gift Registry</h1>
				@foreach($errors->all('<p style="color: gray; font-size: 15px; margin: 20px;">- :message</p>') as $message)
		            {{ $message }}
		        @endforeach
				<div class="gift-r-c">
					<div class="g-r-c-inner">
						<div class="g-r-text-info fl">
							{{ $content }}
						</div>

						<form action="{{ URL::to('the-registry/checkcode') }}" method="post" >
							<div class="view-girl fr">														
								<div class="c-submit"><a href="{{ URL::to('registry/create-registry-personal') }}">Create</a></div>
								<div class="girl fr"><img src="{{ URL::to('/') }}/images/gift_registry/girl.png" width="394" height="302" alt="" title=""/></div>
								<div class="view-field fr">									
									<div class="bg-search"><input type="text" name="code" placeholder="Enter code" required/></div>
									<div class="btn-r">
										<div class="v-submit "><input type="submit" name="" value=""/></div>
										<div class="clr"></div>
									</div>									
								</div>
								<div class="clr"></div>
								<div class="clr"></div>														
							</div>
							<div class="clr"></div>
							<div class="submit-button view-btn-m fr">
								<input type="submit" name="" value="View"/>
							</div>
						</form>

						<div class="clr"></div>
					</div>															
					<div class="clr"></div>
				</div>			
			</div>
		</div>

@endsection