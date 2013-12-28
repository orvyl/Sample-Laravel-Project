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
							<th class="first-t-h">ID</th>
							<th>Date and Time</th>
							<th class="last-t-h">Price</th>
							<th>Action</th>
						</tr>
						@foreach($orders as $order)

						<tr>
							<td>{{ $order->paypaltrans_id }}</td>
							<td>{{ $order->created_at }}</td>
							<td>$ {{ $order->total }}</td>
							<td style="text-align: left">
								<a href="{{ URL::to('my-account/order-detail/'.$order->id) }}" class="view-det-order">view details</a>
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