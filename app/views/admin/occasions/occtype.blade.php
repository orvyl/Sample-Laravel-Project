@extends('admintemplate')

@section('content')

@if(Session::get('regadmin'))
<div class="nNote {{ Session::get('regadmin') }}">
    <p>{{ Session::get('addmsg') }}</p>
</div>
@endif

<div class="nNote nSuccess" id="msg-orderupd" style="display: none;">
    <p>Order successfully updated!</p>
</div>

<div class="widget">
    <div class="whead"><h6>Occasion Types</h6><div class="clear"></div></div>
    <div id="dyn" class="hiddenpars">
        <a class="tOptions" title="Options"><img src="{{ URL::to('/') }}/adminpublic/images/icons/options.png" alt="" /></a>

        <form method="post" action="{{ URL::to('admin/occasions/delmul') }}" id="frmdelmul">

	        <table cellpadding="0" cellspacing="0" border="0" class="dTable" id="dynamic">
		        <thead>
			        <tr>
				        <th>&nbsp;</th>
				        <th>Name</th>
				        <th>Order</th>
				        <th>Date Created</th>
				        <th>Last Updated</th>
				        <th>Action</th>
			        </tr>
		        </thead>
		        <tbody>
		        	@foreach($occasion_types as $row)
				        <tr class="gradeA">
					        <td class="center">
					        	<input type="checkbox" value="{{ $row->id }}" name="occt_id[]"/>
					        </td>
					        <td class="center">{{ $row->occasion_type }}</td>
					        <td class="center">
				        		<input type="text" name="order" occid = "{{ $row->id }}" value="{{ $row->order }}" class="order-txt" />
					        </td>
					        <td class="center">
					        	{{ $row->created_at }}
					        </td>
					        <td class="center">
					        	{{ $row->updated_at }}
					        </td>
					        <td class="tableActs">
					        	<a href="{{ URL::to('admin/occasions/edit/'.$row->id) }}" class="tablectrl_small bDefault tipS" title="Setting"><span class="iconb" data-icon="&#xe1f7;"></span></a>
		                        <!-- <a href="#" class="tablectrl_small bDefault tipS" title="Remove"><span class="iconb" data-icon="&#xe136;"></span></a> -->
		                    </td>
				        </tr>
			        @endforeach
		        </tbody>
	        </table>

	    </form>
    </div>

    <div class="clear"></div> 
</div>
<div class="btns">
	<a href="#" class="buttonL bRed" id="modal_open1">Delete selected</a>
	<input type="button" class="buttonL bGreen floatR updorder" value="+ Update" style="margin: 5px 5px;"/>
	<div class="clear"></div>
</div>

<div id="dialog-modal1" title="Please confirm...">
    <p>Are you sure you want to delete selected Occasiotn type(s)?</p>
</div>

<div id="dialog-modal2" title="Ooops!">
    <p>You did not select occasion type(s) to delete.</p>
</div>

@endsection

@section('subnav')

	@include('admin.occasions.osubnav')

@endsection
