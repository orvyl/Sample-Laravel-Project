@extends('admintemplate')

@section('content')

<div class="widget">
    <div class="whead"><h6>Clients</h6><div class="clear"></div></div>
    <div id="dyn" class="hiddenpars">
        <a class="tOptions" title="Options"><img src="{{ URL::to('/') }}/adminpublic/images/icons/options.png" alt="" /></a>

        @if(count($clients) > 0)
	        <table cellpadding="0" cellspacing="0" border="0" class="dTable" id="dynamic">
		        <thead>
			        <tr>
				        <th>&nbsp;</th>
				        <th>Name</th>
				        <th>Email</th>
				        <th>Date Registered</th>
				        <th>Action</th>
			        </tr>
		        </thead>
		        <tbody>

		        	@foreach($clients as $row)
				        <tr class="gradeA">
					        <td class="center">
					        	<input type="checkbox" />
					        </td>
					        <td class="center">{{ $row->first_name }} {{ $row->last_name }}</td>
					        <td class="center">
					        	<a href="mailto:{{ $row->email }}">{{ $row->email }}</a>
					        </td>
					        <td class="center">
					        	{{ $row->created_at }}
					        </td>
					        <td class="tableActs">
					        	<!-- <a href="#" class="tablectrl_small bDefault tipS" title="Setting"><span class="iconb" data-icon="&#xe1f7;"></span></a> -->
		                        <a href="#" class="tablectrl_small bDefault tipS delss" uid="{{ $row->id }}" title="Remove"><span class="iconb" data-icon="&#xe136;"></span></a>		                    </td>
				        </tr>
			        @endforeach

		        </tbody>
	        </table> 
        @else
        	<p style="text-align: center;">0 Clients</p>
        @endif
    </div>

    <div class="clear"></div> 
</div>
<div class="btns">
	<!-- <a href="#" class="buttonL bRed">Delete selected</a> -->
</div>

<script type="text/javascript">
	$('.delss').click(function(){
		var a = confirm("Are you sure you want to delete this account?");
		var id = $(this).attr('uid');

		if(a)
			window.location.href = "{{ URL::to('admin/users/delsuper') }}?uid="+id;
	});
</script>

@endsection

@section('subnav')

	@include('admin.user.subnav')

@endsection
