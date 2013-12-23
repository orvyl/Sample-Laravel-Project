<li {{ Request::segment(3) == '' ? 'class="activeli"':'' }}>
	<a href="{{ URL::to('admin/blog') }}" title="" {{ Request::segment(3) == '' ? 'class="this"':'' }}>
		<span class="icos-pencil"></span>
		Manage Blog
	</a>
</li>

<li {{ Request::segment(3) == 'create' ? 'class="activeli"':'' }}>
	<a href="{{ URL::to('admin/blog/create') }}" title="" {{ Request::segment(3) == 'create' ? 'class="this"':'' }}>
		<span class="icos-pencil"></span>
		Create New Blog
	</a>
</li>