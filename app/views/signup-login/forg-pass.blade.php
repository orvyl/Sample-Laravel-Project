@extends('master')

@section('content')

<div class="group-gifts inner ">
	<div class="help forgot">
		<h1>retrieve password</h1>
		<div class="forgot-inner">
			<form action="{{ URL::to('login/goforgpassword') }}" method="post">
				<div class="gifts-form">
					<label>Email Address</label>
					<input type="email" name="email" value="{{ Input::old('email') }}"/>
					<div class="clr"></div>
					<div class="send-pic opac">
						<input type="submit" name="" value=""/>
					</div>
					<div class="submit-button fr"><input type="submit" name="" value="send"/></div>
					<div class="clr"></div>
				</div>
			</form>
			@foreach($errors->all('<p style="text-align: center">:message</p>') as $message)
			{{ $message }}
			@endforeach
			{{ Session::get('msg') }}
			<div class="forgot-arrow-top"></div>	
		</div>
	</div>
	<div class="clr"></div>
</div>

@endsection