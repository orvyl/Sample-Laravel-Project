@extends('admintemplate')

@section('content')

@if(isset($_GET['delsuc']))
<div class="nNote nSuccess">
    <p>Subscriber successfully deleted!</p>
</div>
@endif

@if(isset($_GET['sendsuc']))
<div class="nNote nSuccess">
    <p>Newsletter successfully sent!</p>
</div>
@endif

<form method="post" action="{{ URL::to('admin/users/send') }}">
	<div class="widget">
	    <div class="whead"><h6>Create newsletter here</h6><div class="clear"></div></div>
	    <textarea id="editor" name="content" rows="" cols="16"></textarea>
	</div>
	<div class="formRow">
	    <input type="submit" class="buttonL bGreen floatR" value="Send Newsletter" name="btn"/>
	    <div class="clear"></div>
	</div>
</form>

<div class="widget">
    <div class="whead"><h6>Subscribers</h6><div class="clear"></div></div>
    <div id="dyn" class="hiddenpars">
        <a class="tOptions" title="Options"><img src="{{ URL::to('/') }}/adminpublic/images/icons/options.png" alt="" /></a>

        @if(count($subscribers) > 0)
	        <table cellpadding="0" cellspacing="0" border="0" class="dTable" id="dynamic">
		        <thead>
			        <tr>
				        <th>Email</th>
				        <th>Date Registered</th>
				        <th>Action</th>
			        </tr>
		        </thead>
		        <tbody>

		        	@foreach($subscribers as $row)
				        <tr class="gradeA">
					        <td class="center">
					        	<a href="mailto:{{ $row->email }}">{{ $row->email }}</a>
					        </td>
					        <td class="center">
					        	{{ $row->created_at }}
					        </td>
					        <td class="tableActs">
		                        <a href="#" class="tablectrl_small bDefault tipS dells" sid = "{{ $row->id }}" title="Remove"><span class="iconb" data-icon="&#xe136;"></span></a>
		                    </td>
				        </tr>
			        @endforeach

		        </tbody>
	        </table> 
        @else
        	<p style="text-align: center;">0 Subscribers</p>
        @endif
    </div>

    <div class="clear"></div> 
</div>

<script type="text/javascript">
	$('.dells').click(function(){
		var id = $(this).attr('sid');

		var a = confirm("Are you sure you want to delete this subscriber?");

		if(a)
			window.location.href = "{{ URL::to('admin/users/delsub') }}?sid="+id;
	})
</script>


@endsection

@section('subnav')

	@include('admin.user.subnav')

@endsection
