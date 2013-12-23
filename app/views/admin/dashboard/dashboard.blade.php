@extends('admintemplate')

@section('content')

	

	<div class="fluid">
	    @include('admin.dashboard.activity-feeds')
	    
	    @include('admin.dashboard.admin-accounts')
	</div>

@endsection