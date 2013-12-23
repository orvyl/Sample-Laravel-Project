@extends('admintemplate')

@section('content')

@if(Session::get('regadmin'))
<div class="nNote {{ Session::get('regadmin') }}">
    <p>{{ Session::get('addmsg') }}</p>
</div>
@endif

<form method="post">
	<div class="widget">
	    <div class="whead"><h6>Editor</h6><div class="clear"></div></div>
	    <textarea id="editor" name="content" rows="" cols="16">{{ $page->content }}</textarea>
	</div>
	<div class="formRow">
		<input type="hidden" name="pid" value="{{ $page->id }}" />
	    <input type="submit" class="buttonL bGreen floatR" value="Update" name="btn"/>
	    <div class="clear"></div>
	</div>
</form>

@endsection

@section('subnav')

	@foreach($pages as $row)

		<li {{ $_GET['page'] == $row->id ? 'class="activeli"':'' }}>
			<a href="{{ URL::to('admin/cms') }}?page={{ $row->id }}" title="" {{ $_GET['page'] == $row->id ? 'class="this"':'' }}>
				<span class="icos-cog2"></span>
				{{ $row->title }}
			</a>
		</li>

	@endforeach

@endsection