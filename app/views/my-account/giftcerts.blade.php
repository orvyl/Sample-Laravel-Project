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
							<th class="first-t-h">Code</th>
							<th>Title</th>
							<th>Discount</th>
							<th class="last-t-h">Status</th>
						</tr>

						<tr>
							<td style="text-align: left">
								<code>01-fhdhhuUGBJff487</code>
							</td>
							<td>Gift Certificate Cute</td>
							<td>$ 12.36</td>
							<td>
								available
							</td>
						</tr>

						<tr>
							<td class="first-f-c">&nbsp;</td>
							<td>&nbsp;</td>
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