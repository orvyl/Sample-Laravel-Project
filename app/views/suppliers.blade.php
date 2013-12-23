@extends('master')

@section('content')

<div class="group-gifts inner ">
	<div class="help">
		
		{{ $content }}

		<div class="suppliers-c"><!-- suppliers -->
			<div class="suppliers-img"><img src="{{ URL::to('/') }}/images/suppliers/suppliers2.png" width="251" height="107" alt="" title=""/></div>
			<div class="suppliers-img"><img src="{{ URL::to('/') }}/images/suppliers/supplier1.png" width="251" height="107" alt="" title=""/></div>
		</div>
		<div class="clr"></div>
	</div>
</div>

@endsection