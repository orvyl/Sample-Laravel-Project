@extends('master')

@section('content')

<div class="group-gifts ">
	<div class="giftboxes product-details">
		<h1 style="font-size:35px;">Contributors</h1>
		<div class="detail-page-top" style="padding:10px;">
			<div class="contributors">
				<h3>Invited Contributors</h3>

				@if(count($contributors) > 0)
				<ul>
					@foreach($contributors as $cont)
					<li>
						<div class="contributors-name">
							<label for="">Name:</label>
							<span>{{ $cont->name }}</span>
						</div>
						<div class="contributors-name">
							<label for="">Email:</label>
							<span>{{ $cont->email }}</span>
						</div>
						<div class="contributors-delete">
							<a href=""><img src="{{ URL::to('/') }}/images/page_template/x.png" width="14" height="14" alt="" title=""/></a>
						</div>
					</li>
					@endforeach
				</ul>
				@else
				<p style="text-align: center;font-size: 14px; color: white;">No contributors invited</p>
				@endif

			</div>
			<div class="add-contributors">
				<h3>Invite Contributors</h3>
				@if(isset($_GET['err']))
				<p style="color: red">Ooops! Something went wrong. Please try again later.</p>
				@elseif(isset($_GET['suc']))
				<p>New contributor added!</p>
				@endif

				@foreach($errors->all('<p style="text-align: center">:message</p>') as $message)
		            {{ $message }}
		        @endforeach

				<form method="post" action="{{ URL::to('registry/contributors/addcontri') }}">
					<ul>
						<li>
							<label for="">Name</label>
							<input type="text" name="cname" value="" required />
						</li>
						<li>
							<label for="">Email</label>
							<input type="email" name="cemail" value="" required />
						</li>
						<li>
							<input type="hidden" name="regid" value="{{ Input::get('reg') }}"/>
							<input type="submit" value="Add" style="border: none;"/>
						</li>
					</ul>
				</form>
				<!-- <a class="contri-cancel" href="">Cancel</a> -->
				<a href="">Send invitation</a>
			</div>
		</div>
	</div>
</div>

@endsection