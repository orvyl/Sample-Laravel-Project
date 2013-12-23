@extends('master')

@section('content')

<div class="group-gifts inner">
	<div class="help about">
		<h1>about us</h1>
		<div class="about-us fl">
			{{ $content }}
			<div class="about-top"></div>
			<div class="gift1"></div>
		</div>
		<div class="gift3 fl"></div>
		<div class="gift2 fl"></div>
		<div class="clr"></div>
	</div>
	<div class="clr"></div>
</div>

@endsection