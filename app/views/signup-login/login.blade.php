@extends('master')

@section('content')

<div class="group-gifts inner ">
	<div class="help forgot">
		<h1>login</h1>
		<div class="forgot-inner">
			<div class="gifts-form">
				<style type="text/css">
				.msg{ text-align: center; margin: 5px; color: #fff; font-size: 15px; }
				</style>
				<form action="" method="post">
					<p class="msg">{{ Session::get('msg') }}</p>
					<ul>
						<li>
							<label>Email Address </label>
							<input type="text" name="email" value="{{ Input::old('email') }}"/>
							<div class="clr"></div>
						</li>
						<li>
							<label>Password</label>
							<input type="password" name="password" value=""/>
							<div class="clr"></div>
						</li>
						<li class="forgot-link fr">
							<a href="{{ URL::to('login/forgotpassword') }}">forgot password?</a>
							<a href="{{ URL::to('signup') }}">create an account</a>
						</li>
						<li class="forgot-link fr">
							<a href="{{ URL::to('login/forgotpassword') }}">
								<img src="{{ URL::to('/') }}/images/fb/login_btn.png" />
							</a>
						</li>
					</ul>
					<div class="send-pic login-pic opac">
						<input type="submit" name="" value=""/>
					</div>
					<div class="submit-button fr"><input type="submit" name="" value="send"/></div>
					<div class="clr"></div>
				</form>
			</div>
			<div class="forgot-arrow-top"></div>
		</div>
	</div>
	<div class="clr"></div>
</div>

@endsection