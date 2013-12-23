@extends('master')

@section('content')

<div class="group-gifts inner">
	<div class="w-well-container">
		<h1>Would you like to create <br/>a wishing well?</h1>
		<div class="w-w-c-btn">
			<a href="{{ URL::to('registry/wishing-well/add') }}">yes</a>
			<a href="{{ URL::to('registry/setup') }}">no</a>
		</div>
		<div class="w-well-arrow">
			<img src="{{ URL::to('/') }}/images/wish/arrow.png" width="61" height="56" alt="" title=""/>
		</div>
	</div>
</div>

@endsection