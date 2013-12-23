@extends('master')

@section('content')

<style type="text/css">
	.errorsmsg{ color: red !important; font-size: 12px !important; text-align: center; }
</style>

<div class="sign-up">
	<h1>Sign up</h1>
	<form action="{{ URL::to('signup') }}" method="post">
		<div class="sign-up-field create-registry">
			<div class="sing-up-top"></div>
			
			<p class="errorsmsg">{{ Session::get('someerror') }}</p>
			<ul>
				<li>
					<label for="">First Name</label>
					<input type="text" name="first_name" value="{{ Input::old('first_name') }}" required />
					<div class="clr"></div>
					<span class="errorsmsg">{{ $errors->first('first_name') }}</span>
				</li>
				<li>
					<label for="">Last Name</label>
					<input type="text" name="last_name" value="{{ Input::old('last_name') }}" required />
					<div class="clr"></div>
					<span class="errorsmsg">{{ $errors->first('last_name') }}</span>
				</li>
				<li>
					<label for="">Email</label>
					<input type="email" name="email" value="{{ Input::old('email') }}" required/>
					<div class="clr"></div>
					<span class="errorsmsg">{{ $errors->first('email') }}</span>
				</li>
				<li>
					<label for="">Confirm Email</label>
					<input type="text" name="email_confirmation" value="{{ Input::old('email_confirmation') }}" autocomplete="off"/>
					<div class="clr"></div>
				</li>
				<li>
					<label for="">Password</label>
					<input type="password" name="password" value="{{ Input::old('password') }}" required/>

					<div class="clr"></div>
					<span class="errorsmsg">{{ $errors->first('password') }}</span>
				</li>
				<li>
					<label for="">Confirm Password</label>
					<input type="password" name="password_confirmation" value=""/>
					<div class="clr"></div>
				</li>
				<li>
					<label for="">Birthday:</label>
					<!-- <div class="date-event fl">
						<div class="c-r-select1 fl" style="margin-right:5px;">
							<select name="acct-1" id="acct-1" style="width:160px;" >
								<option name="one" value="msDropDown" selected="selected" title="">...</option>
								<option name="" value="" title="">Sample</option>
								<option name="" value="" title="">Sample</option>
								<option name="" value="" title="">Sample</option>
								<option name="" value="" title="">Sample</option>
							</select>
						</div>
						<div class="c-r-select1 fl" style="margin-right:5px;">
							<select name="acct-2" id="acct-2" style="width:78px;">
								<option name="one" value="msDropDown" selected="selected" title="">...</option>
								<option name="" value="" title="">Sample</option>
								<option name="" value="" title="">Sample</option>
								<option name="" value="" title="">Sample</option>
								<option name="" value="" title="">Sample</option>
							</select>
						</div>
						<div class="c-r-select1 fl">
							<select name="acct-3" id="acct-3" style="width:115px;">
								<option name="one" value="msDropDown" selected="selected" title="">...</option>
								<option name="" value="" title="">Sample</option>
								<option name="" value="" title="">Sample</option>
								<option name="" value="" title="">Sample</option>
								<option name="" value="" title="">Sample</option>
							</select>
						</div>
						<div class="clr"></div>
					</div> -->
					<input type="text" name="birthday" value="{{ Input::old('birthday') }}" id="datepicker" required/>
					<div class="clr"></div>
					<span class="errorsmsg">{{ $errors->first('birthday') }}</span>
				</li>	
				<li>
					<label for="">Country</label>
					<div class="c-r-select fl">
						<select name="country" id="acct-4" style="width:368px;"  required >
							<option name="one" value="" title="">...</option>
							@foreach($countries as $country)

							<option name="" title="" {{ Input::old('country') == $country->country ? 'selected':'' }} >{{ $country->country }}</option>

							@endforeach

						</select>
					</div>

					<input type="hidden" name="old_password" value="*yhbgt^5^#*@*3JJmjghikh" required/>
					
					<div class="clr"></div>
					<span class="errorsmsg">{{ $errors->first('country') }}</span>
				</li>
				<li>
					<label for="">State</label>
					<div class="c-r-select fl">
						<select name="state" id="acct-5" style="width:368px;">
							<option name="one" value="" selected="selected" title="">...for Australia only</option>
							@foreach($states as $state)

							<option name="" title="" {{ Input::old('state') == $state->state ? 'selected':'' }} >{{ $state->state }}</option>

							@endforeach
						</select>
					</div>
					<div class="clr"></div>
				</li>
				<li>
					<label for="">Phone</label>
					<div class="last-field fl">
						<input type="text" name="phone" value="{{ Input::old('phone') }}"/>
						<div class="clr"></div>
						<div>
							<input type="checkbox" id="c1" name="agree" {{ Input::old('agree') == 'on' ? 'checked':'' }}/>
							<label for="c1" style="width:100% !important;"><span></span>I agree to the <a href="{{ URL::to('terms-and-conditions') }}">Terms and Conditions</a></label>			
							<div class="clr"></div>
							<span class="errorsmsg">{{ $errors->first('agree') == '' ? '':'*please accept Terms and Conditions' }}</span>
						</div>								
						<div class="clr"></div>
						<div>
							<input type="checkbox" id="c2" name="newsletter" {{ Input::old('newsletter') == 'on' ? 'checked':'' }}/>
							<label for="c2" style="width:100% !important;"><span></span>Sign me up for the Group Gifts newsletter</label>			
							<div class="clr"></div>
						</div>
					</div>						
					<div class="clr"></div>
				</li>					
			</ul>
			<p class="login-signup">already have an account? <a href="{{ URL::to('login') }}">login</a></p>
			<div class="sign-up-btn"><input type="submit" name="" value=""/></div>	
			<div class="submit-button submit-sign-up fr"><input type="submit" name="" value="send"/></div>
			<div class="clr"></div>					
		</div>
	</form>
</div>

@endsection