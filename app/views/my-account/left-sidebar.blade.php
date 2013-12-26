<div class="giftboxes-left gift-boxes-mobile fl">
	<div class="giftboxes-tab my-account">
		<h2>My Account:</h2>
		<div class="giftboxes-selection-tab my-acct-sidebar">
			<ul>
				<li {{ Request::segment(2) == '' ? 'class="my-click"':'' }}><a href="{{ URL::to('my-account') }}">Account Info</a></li>
				<li {{ Request::segment(2) == 'payment-information' ? 'class="my-click"':'' }}><a href="{{ URL::to('my-account/payment-information') }}">Payment Info</a></li>
				<li {{ Request::segment(2) == 'order-history' ? 'class="my-click"':'' }}><a href="{{ URL::to('my-account/order-history') }}">Order History</a></li>
				<li {{ Request::segment(2) == 'registry' ? 'class="my-click"':'' }}><a href="{{ URL::to('my-account/registry') }}">Registry</a></li>
				<li {{ Request::segment(2) == 'giftcerts' ? 'class="my-click"':'' }}><a href="{{ URL::to('my-account/giftcerts') }}">Gift Certificates</a></li>
			</ul>
		</div>
	</div>
</div>