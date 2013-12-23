@extends('master')

@section('content')

<div class="sign-up">
	<h1>Create a Registry</h1>
	<form action="{{ URL::to('registry/createmarriage') }}" method="post">
		<div class="sign-up-field create-registry ">
		{{ Session::get('msg') }}					
			<ul>
				<li>
					<label for="">Occasion Type:</label>
					<div class="c-r-select fl">
						<select name="occasion_type" id="acct-7" style="width:368px;">
							<option name="" title="">Personal</option>
							<option name="" title="" selected>Marriage</option>
							<option name="" title="">Others</option>
						</select>
					</div>
					<div class="clr"></div>
					{{ $errors->first('occasion_type','<span style="color: white;"> :message</span>') }}
				</li>
				<li>
					<label for="">Couple type:</label>
					<div class="c-r-select fl">
						<select name="couple_type" id="acct-8" style="width:368px;">
							<option name="one" value="" title="">...</option>
							<option name="" {{ Input::old('couple_type') == 'Bride and Groom' ? 'selected':'' }} title="">Bride and Groom</option>
							<option name="" {{ Input::old('couple_type') == 'Same Sex Couple' ? 'selected':'' }} title="">Same Sex Couple</option>
						</select>
					</div>
					<div class="clr"></div>
					{{ $errors->first('couple_type','<span style="color: white;"> :message</span>') }}
				</li>
				<li>
					<label for="" id="bridelabel1">Bride first name:</label>
					<input type="text" name="bride_fname" value="{{ Input::old('bride_fname') }}" required/>
					<div class="clr"></div>
					{{ $errors->first('bride_fname','<span style="color: white;"> :message</span>') }}
				</li>
				<li>
					<label for="" id="bridelabel2">Bride last name:</label>
					<input type="text" name="bride_lname" value="{{ Input::old('bride_lname') }}" required/>
					<div class="clr"></div>
					{{ $errors->first('bride_lname','<span style="color: white;"> :message</span>') }}
				</li>
				<li>
					<label for="" id="groomlabel1">Groom first name:</label>
					<input type="text" name="groom_fname" value="{{ Input::old('groom_fname') }}" required/>
					<div class="clr"></div>
					{{ $errors->first('groom_fname','<span style="color: white;"> :message</span>') }}
				</li>
				<li>
					<label for="" id="groomlabel2">Groom last name:</label>
					<input type="text" name="groom_lname" value="{{ Input::old('groom_lname') }}" required/>
					<div class="clr"></div>
					{{ $errors->first('groom_lname','<span style="color: white;"> :message</span>') }}
				</li>
				<li>
					<label for="">Address:</label>
					<input type="text" name="address" value="{{ Input::old('address') }}" required/>
					<div class="clr"></div>
					{{ $errors->first('address','<span style="color: white;"> :message</span>') }}
				</li>
				<li>
					<label for="">Suburb:</label>
					<input type="text" name="suburb" value="{{ Input::old('suburb') }}"/>
					<div class="clr"></div>
				</li>
				<li>
					<label for="">Country</label>
					<div class="c-r-select fl">
						<select name="country" id="acct-4" style="width:368px;">
							<option name="one" value="" selected="selected" title="">...</option>

							@foreach($countries as $country)
								<option name="" value="{{ $country->country_id }}" title="" {{ $country->country_id == Input::old('country') ? 'selected':'' }}>{{ $country->country }}</option>
							@endforeach

						</select>
					</div>
					<div class="clr"></div>
					{{ $errors->first('country','<span style="color: white;"> :message</span>') }}
				</li>
				<li>
					<label for="">State:</label>
					<div class="c-r-select fl">
						<select name="state" id="acct-14" style="width:368px;">
							<option name="one" value="" selected="selected" title="">...for Australia only</option>

							@foreach($states as $state)
								<option name="" value="{{ $state->state_id }}" title="" {{ $state->state_id == Input::old('state') ? 'selected':'' }}>{{ $state->state }}</option>
							@endforeach

						</select>
					</div>
					<div class="clr"></div>
					{{ $errors->first('state','<span style="color: white;"> :message</span>') }}
				</li>
				<li>
					<label for="">Postcode</label>
					<input type="text" name="postcode" value="{{ Input::old('postcode') }}"/>
					<div class="clr"></div>
				</li>
				<li>
					<label for="">Contact Number:</label>
					<input type="text" name="contact_number" value="{{ Input::old('contact_number') }}"/>
					<div class="clr"></div>
				</li>
				<li>
					<label for="">Email:</label>
					<input type="email" name="email" value="{{ Input::old('email') }}" required/>
					<div class="clr"></div>
					{{ $errors->first('email','<span style="color: white;"> :message</span>') }}
				</li>
				<li>
					<label for="">Date of Party:</label>
					<input type="text" name="date_party" value="{{ Input::old('date_party') }}" id="dt1" required/>
					<div class="clr"></div>
					{{ $errors->first('date_party','<span style="color: white;"> :message</span>') }}
				</li>	
				<input type="hidden" name="registry_currency" value="AUD"/>				
				<li>
					<label for="">&nbsp;</label>
					<div class="r-c-checkcox fl">
						<!-- <select name="registry_currency" id="acct-5" style="width:368px;">
							<option name=""  title="" {{ Input::old('registry_currency') == 'AUD' ? 'selected':'' }}>AUD</option>
							<option name="" title="" {{ Input::old('registry_currency') == 'USD' ? 'selected':'' }}>USD</option>
						</select> -->
						<p>Where would you like your gifts delivered? </p>
						<div>
							<input type="checkbox" id="c1" name="cc" class="cc_info" value="same" {{ Input::old('cc') == 'same' || Input::old('cc') == '' ? 'checked':'' }}/>
							<label for="c1" style="width:100% !important;"><span></span>Same as above</label>			
							<div class="clr"></div>
						</div>
						<div>
							<input type="checkbox" id="c2" name="cc" class="cc_info" value="notsame" {{ Input::old('cc') == 'notsame' ? 'checked':'' }}/>
							<label for="c2" style="width:100% !important;"><span></span>Another delivery address</label>	
							<div class="clr"></div>
						</div>
					</div>
					<div class="clr"></div>
				</li>
				<li>
					<label for="">Address:</label>
					<input type="text" name="delivery_address" value="{{ Input::old('delivery_address') }}"/>
					<div class="clr"></div>
					{{ $errors->first('delivery_address','<span style="color: white;"> :message</span>') }}
				</li>
				<li>
					<label for="">Suburb:</label>
					<input type="text" name="delivery_suburb" value="{{ Input::old('delivery_suburb') }}"/>
					<div class="clr"></div>
				</li>
				<li>
					<label for="">Country:</label>
					<div class="c-r-select fl">
						<select name="delivery_country" id="acct-1" style="width:368px;">
							<option name="one" value="" selected="selected" title="">...</option>

							@foreach($countries as $country)
								<option name="" value="{{ $country->country_id }}" title="" {{ Input::old('delivery_country') == $country->country_id ? 'selected':'' }}>{{ $country->country }}</option>
							@endforeach

						</select>
					</div>
					<div class="clr"></div>
					{{ $errors->first('delivery_country','<span style="color: white;"> :message</span>') }}
				</li>
				<li>
					<label for="">Postcode:</label>
					<input type="text" name="delivery_postcode" value="{{ Input::old('delivery_postcode') }}"/>
					<div class="clr"></div>
				</li>
				<li>
					<label for="">State:</label>
					<div class="c-r-select r-c-checkcox fl">
						<select name="delivery_state" id="acct-6" style="width:368px;">
							<option name="one" value="" selected="selected" title="">...for Australia only</option>

							@foreach($states as $state)
								<option name="" value="{{ $state->state_id }}" title="" {{ Input::old('delivery_state') == $state->state_id ? 'selected':'' }}>{{ $state->state }}</option>
							@endforeach

						</select>
						<div class="clr"></div>
						{{ $errors->first('delivery_state','<span style="color: white;"> :message</span>') }}
						<div>
							<input type="checkbox" id="c3" name="agree" {{ Input::old('agree') ? 'checked':'' }} />
							<label for="c3" style="width:100% !important;" ><span></span>I agree to the <a href="{{ URL::to('terms-and-conditions') }}">Terms and Conditions</a></label>	
							<div class="clr"></div>
							{{ $errors->first('agree','<span style="color: white;"> :message</span>') }}
						</div>
					</div>
					<div class="clr"></div>
				</li>							
			</ul>
			<div class="submit-reg"><input type="submit" name="" value="submit"/></div>
		</div>
	</form>
</div>

@endsection