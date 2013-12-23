@extends('master')

@section('content')

<div class="group-gifts inner">
	<div class="help contact-us">
		<h1>we want to hear from you.</h1>
		<div class="forgot-inner contact-us-inner">
			<div class="gifts-form contact-form">
				<form action="{{ URL::to('contact-us') }}" method="post">
					<style type="text/css">
						.msg{ text-align: center; margin: 5px; color: #fff; font-size: 15px; }
						.errorsmsg{ color: red !important; font-size: 12px !important; text-align: center; width: 150px; margin: auto; display: block; }
					</style>
					<p class="msg">{{ Session::get('msg') }}</p>
					<ul>
						<li>
							<label>Name</label>
							<input type="text" name="client_name" value="" required/>
							<div class="clr"></div>
							<span class="errorsmsg">{{ $errors->first('client_name') }}</span>
						</li>
						<li>
							<label>Email Address</label>
							<input type="email" name="email" value="" required/>
							<div class="clr"></div>
							<span class="errorsmsg">{{ $errors->first('email') }}</span>
						</li>
						<li>
							<label>Message</label>
							<textarea name="msg" id="" cols="0" rows="0" required></textarea>
							<div class="clr"></div>
							<span class="errorsmsg">{{ $errors->first('msg') }}</span>
						</li>
					</ul>
					<div class="send-pic contact-us-pic opac">
						<input type="submit" name="" value=""/>
					</div>
					<div class="send-input fr"><input type="submit" name="" value="Send"/></div>
					<div class="clr"></div>
				</form>
			</div>
			<div class="forgot-arrow-top"></div>
		</div>
	</div>
	<div class="clr"></div>
</div>

@endsection