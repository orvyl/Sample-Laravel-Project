<li {{ Request::segment(3) == 'manage' ? 'class="activeli"':'' }}>
	<a href="{{ URL::to('admin/occasions/manage') }}" title="" {{ Request::segment(3) == 'manage' ? 'class="this"':'' }}>
		<span class="icos-pencil"></span>
		Manage Occasion Types
	</a>
</li>

<li {{ Request::segment(3) == 'create' ? 'class="activeli"':'' }}>
	<a href="{{ URL::to('admin/occasions/create') }}" title="" {{ Request::segment(3) == 'create' ? 'class="this"':'' }}>
		<span class="icos-pencil"></span>
		Create Occasion Type
	</a>
</li>

@foreach($occasion_types as $ot)

<li {{ Input::get('otype') == $ot->id ? 'class="activeli"':'' }}>
	<a href="{{ URL::to('admin/occasions?otype='.$ot->id) }}" title="" {{ Input::get('otype') == $ot->id ? 'class="this"':'' }}>
		<span class="icos-cog2"></span>
		{{ $ot->occasion_type }}
	</a>
</li>

@endforeach