<li {{ Request::segment(2) == 'products' && Request::segment(3) == '' ? 'class="activeli"':'' }}>
	<a href="{{ URL::to('admin/products') }}" title="" {{ Request::segment(3) == 'products' && Request::segment(3) == '' ? 'class="this"':'' }}>
		<span class="icos-cog2"></span>
		Products
	</a>
</li>

<li {{ Request::segment(3) == 'create' ? 'class="activeli"':'' }}>
	<a href="{{ URL::to('admin/products/create') }}" title="" {{ Request::segment(3) == 'create' ? 'class="this"':'' }}>
		<span class="icos-cog2"></span>
		Add Product
	</a>
</li>

<li {{ Request::segment(2) == 'recipient' ? 'class="activeli"':'' }}>
	<a href="{{ URL::to('admin/recipient') }}" title="" {{ Request::segment(2) == 'recipient' ? 'class="this"':'' }}>
		<span class="icos-cog2"></span>
		Add Recipient
	</a>
</li>

<li {{ Request::segment(2) == 'gift-certs' ? 'class="activeli"':'' }}>
	<a href="{{ URL::to('admin/gift-certs') }}" title="" {{ Request::segment(2) == 'gift-certs' ? 'class="this"':'' }}>
		<span class="icos-cog2"></span>
		Gift Certificate
	</a>
</li>