<li {{ Request::segment(3) == '' ? 'class="activeli"':'' }}><a href="{{ URL::to('admin/users') }}" title="" {{ Request::segment(3) == '' ? 'class="this"':'' }}><span class="icos-cog2"></span>Manage Clients</a></li>
<li {{ Request::segment(3) == 'superusers' ? 'class="activeli"':'' }}>
	<a href="{{ URL::to('admin/users/superusers') }}" title="" {{ Request::segment(3) == 'superusers' ? 'class="this"':'' }}>
		<span class="icos-cog2"></span>
		Administrator Accounts
	</a>
</li>
<li {{ Request::segment(3) == 'addsuper' ? 'class="activeli"':'' }}>
	<a href="{{ URL::to('admin/users/addsuper') }}" title="" class="{{ Request::segment(3) == 'addsuper' ? 'this':'' }}">
		<span class="icos-cog2"></span>
		Add Admin
	</a>
</li>
<li {{ Request::segment(3) == 'newsletter' ? 'class="activeli"':'' }}>
	<a href="{{ URL::to('admin/users/newsletter') }}" title="" class="noBorderB {{ Request::segment(3) == 'newsletter' ? 'this':'' }}">
		<span class="icos-cog2"></span>
		Newsletter
	</a>
</li>