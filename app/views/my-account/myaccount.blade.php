@extends('master')

@section('content')

<div class="group-gifts inner">
	<div class="giftboxes">
		
		@include('my-account.left-sidebar')

		<style type="text/css">
			.msg{ text-align: center; margin: 5px; color: #fff; font-size: 15px; }
			.errorsmsg{ color: red !important; font-size: 12px !important; text-align: center; width: 150px; margin: auto; display: block; }
		</style>

		<div class="my-accont-mobile fr">
			<div class="giftboxes-right my-account-bg">
				<div class="giftboxes-right-content my-account-bg">
					<form action="" method="post">
						<div class="my-account-info">
							<p class="msg">{{ Session::get('msg') }}</p>
							<ul>
								<li>
									<label for="">First Name</label>
									<input type="text" name="first_name" value="{{ $personinfo->first_name }}"/>
									<div class="clr"></div>
									<span class="errorsmsg">{{ $errors->first('first_name') }}</span>
								</li>
								<li>
									<label for="">Last Name</label>
									<input type="text" name="last_name" value="{{ $personinfo->last_name }}"/>
									<div class="clr"></div>
									<span class="errorsmsg">{{ $errors->first('last_name') }}</span>
								</li>
								<li>
									<label for="">Email</label>
									<input type="text" name="email" value="{{ $personinfo->email }}" readonly style="background-color: #55ABA8;color: white"/>
									<div class="clr"></div>
									<span class="errorsmsg">{{ $errors->first('email') }}</span>
								</li>
<!-- 								<li>
									<label for="">Confirm Email</label>
									<input type="text" name="email_confirmation" value=""/>
									<div class="clr"></div>
								</li> -->
								<li>
									<label for="">Old Password</label>
									<input type="password" name="old_password" value="{{ Input::old('old_password') }}" placeholder="Fill to change password"/>
									<div class="clr"></div>
									<span class="errorsmsg">{{ $errors->first('old_password') }}</span>
								</li>
								<li>
									<label for="">Password</label>
									<input type="password" name="password" value="" placeholder="Fill to change password"/>
									<div class="clr"></div>
									<span class="errorsmsg">{{ $errors->first('password') }}</span>
								</li>
								<li>
									<label for="">Confirm Password</label>
									<input type="password" name="password_confirmation" value="" placeholder="Fill to change password"/>
									<div class="clr"></div>
								</li>
								<li>
									<label for="">Birthday</label>
									<!-- <div class="date-event fr">
										<div class="r-c-select1 fl" style="margin-right:5px;">
											<select name="acct-1" id="acct-1" style="width:160px;" >
												<option name="one" value="msDropDown" selected="selected" title="">...</option>
												<option name="" value="" title="">Sample</option>
												<option name="" value="" title="">Sample</option>
												<option name="" value="" title="">Sample</option>
												<option name="" value="" title="">Sample</option>
											</select>
										</div>
										<div class="r-c-select1 fl" style="margin-right:5px;">
											<select name="acct-2" id="acct-2" style="width:78px;">
												<option name="one" value="msDropDown" selected="selected" title="">...</option>
												<option name="" value="" title="">Sample</option>
												<option name="" value="" title="">Sample</option>
												<option name="" value="" title="">Sample</option>
												<option name="" value="" title="">Sample</option>
											</select>
										</div>
										<div class="r-c-select1 fl">
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
									<input type="text" name="birthday" value="{{ date('m/d/Y',strtotime($personinfo->birthday)) }}" id="datepicker"/>
									<div class="clr"></div>
									<span class="errorsmsg">{{ $errors->first('birthday') }}</span>
								</li>
								<li>
									<label for="">Country</label>
									<div class="r-c-select fr">
										<select name="country" id="acct-4" style="width:368px;">
											<option name="one" value="" title="">...</option>
											@foreach($countries as $country)

											<option name="" title="" {{ $personinfo->country == $country->country ? 'selected':'' }}>{{ $country->country }}</option>

											@endforeach
										</select>
									</div>
									<div class="clr"></div>
									<span class="errorsmsg">{{ $errors->first('country') }}</span>
								</li>
								<li>
									<label for="">State</label>
									<div class="r-c-select fr">
										<select name="state" id="acct-5" style="width:368px;">
											<option name="one" value="" title="">...</option>
											@foreach($states as $state)

											<option name="" title="" {{ $personinfo->state == $state->state ? 'selected':'' }}>{{ $state->state }}</option>

											@endforeach
										</select>
									</div>
									<div class="clr"></div>
								</li>
								<li>
									<label for="">Phone</label>
									<input type="text" name="phone" value="{{ $personinfo->phone }}"/>
									<div class="clr"></div>
								</li>
								<div class="my-acct-btn"><input type="submit" name="" value="save"/></div>
							</ul>
						</div>
					</form>
					<div class="clr"></div>
				</div>
			</div>
		</div>
		<div class="clr"></div>
	</div>
</div>

@endsection