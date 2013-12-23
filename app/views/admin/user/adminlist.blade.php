@extends('admintemplate')

@section('content')

<div class="widget">
    <div class="whead"><h6>Administrator</h6><div class="clear"></div></div>
    <div id="dyn" class="hiddenpars">
        <a class="tOptions" title="Options"><img src="{{ URL::to('/') }}/adminpublic/images/icons/options.png" alt="" /></a>
        @if(count($admins) > 0)
        <table cellpadding="0" cellspacing="0" border="0" class="dTable" id="dynamic">
	        <thead>
		        <tr>
			        <th>&nbsp;</th>
			        <th>Username</th>
			        <th>Type</th>
			        <th>Username/Email</th>
			        <th>Date Created</th>
			        <th>Action</th>
		        </tr>
	        </thead>
	        <tbody>
	        	@foreach($admins as $row)
		        <tr class="gradeA">
			        <td class="center">
			        	<input type="checkbox" />
			        </td>
			        <td class="center">{{ $row->username }}</td>
			        <td class="center">
			        	{{ $row->usertype }}
			        </td>
			        <td class="center">
			        	<a href="mailto:{{ $row->email }}">{{ $row->email }}</a>
			        </td>
			        <td class="center">
			        	{{ $row->created_at }}
			        </td>
			        <td class="tableActs">
			        	<a href="#" class="tablectrl_small bDefault tipS" title="Setting"><span class="iconb" data-icon="&#xe1f7;"></span></a>
                        <a href="#" class="tablectrl_small bDefault tipS" title="Remove"><span class="iconb" data-icon="&#xe136;"></span></a>
                    </td>
		        </tr>
		        @endforeach
	        </tbody>
        </table> 
        @endif
    </div>
    <div class="clear"></div> 
</div>
<div class="btns">
	<a href="#" class="buttonL bRed">Delete selected</a>
</div>

@endsection

@section('subnav')

	@include('admin.user.subnav')

@endsection