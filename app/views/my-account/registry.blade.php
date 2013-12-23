@extends('master')

@section('content')

<div class="group-gifts inner table-box">
	<div class="giftboxes">
		
		@include('my-account.left-sidebar')

		<!-- <p style="color: white; text-align: center;font-size: 16px;">No Order</p> -->
		<div class="my-account-order fr">
			<div class="giftboxes-right my-account-bg ">
				<div class="m-a-order">
					<table>
						<tr>														
							<th class="first-t-h">Title</th>
							<th>Type</th>
							<th class="last-t-h">Date created</th>
							<th>Action</th>
						</tr>
						@foreach($registries as $reg)

						<tr>
							<td>{{ $reg->registry_title }}</td>
							<td>{{ $reg->created_at }}</td>
							<td>{{ $reg->created_at }}</td>
							<td>
								<a href="{{ URL::to('my-account/registry/'.$reg->id) }}" class="view-det-order">view details</a>
							</td>
						</tr>

						@endforeach

						<tr>
							<td class="first-f-c">&nbsp;</td>
							<td>&nbsp;</td>
							<td class="last-f-c">&nbsp;</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="clr"></div>
	</div>
</div>

@endsection