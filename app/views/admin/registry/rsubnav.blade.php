<li {{ Request::segment(2) == 'registry' ? 'class="activeli"':'' }}>
	<a href="{{ URL::to('admin/registry') }}" title="" {{ Request::segment(2) == 'registry' ? 'class="this"':'' }}>
		<span class="icos-pencil"></span>
		Manage Registries
	</a>
</li>