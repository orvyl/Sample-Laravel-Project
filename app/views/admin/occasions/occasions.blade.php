@extends('admintemplate')

@section('content')
{{ Session::get('msg') }}

<div class="nNote nSuccess" id="msg-orderupd" style="display: none;">
    <p>Order successfully updated!</p>
</div>

<div class="widget">
    <div class="whead"><h6>{{ $occasion_title }}</h6><div class="clear"></div></div>
    <div id="dyn" class="hiddenpars">
        <a class="tOptions" title="Options"><img src="{{ URL::to('/') }}/adminpublic/images/icons/options.png" alt="" /></a>

        <table cellpadding="0" cellspacing="0" border="0" class="dTable" id="dynamic">
	        <thead>
		        <tr>
			        <th>&nbsp;</th>
			        <th>Occasion</th>
			        <th>Order</th>
			        <th>Date Created</th>
			        <th>Action</th>
		        </tr>
	        </thead>
	        <tbody>

	        	@foreach($occasions as $row)
			        <tr class="gradeA">
				        <td class="center">
				        	<input type="checkbox" value="{{ $row->id }}"/>
				        </td>
				        <td class="center">{{ $row->occasion_name }}</td>
				        <td class="center">
			        		<input type="text" name="order" value="{{ $row->order }}" class="order-txt" occid="{{ $row->id }}"/>
				        </td>
				        <td class="center">
				        	{{ $row->created_at }}
				        </td>
				        <td class="tableActs">
	                        <a href="#" class="tablectrl_small bDefault tipS delss" ot="{{ $occtid }}" oid="{{ $row->id }}" title="Remove"><span class="iconb" data-icon="&#xe136;"></span></a>
	                    </td>
			        </tr>
		        @endforeach

	        </tbody>
        </table> 
    </div>

    <div class="clear"></div> 
</div>
<div class="btns">
	<!-- <a href="#" class="buttonL bRed" >Delete selected</a> -->
	<a href="#" class="buttonL bGreen updorder1">Update order</a>
    <a href="#" class="buttonL bGreen" id="formDialog1_open">Add occasion here</a>
</div>

<!-- Add Occa -->
<div id="formDialog1" class="dialog" title="Add Occasion under {{ $occasion_title }}">
    <div class="msgdiv"></div>
    <form method="get" id="frmaddocc">
    	<label>Occasion Name</label>
        <input type="text" name="occname" occt = "{{ $occtid }}" class="clear" placeholder="Entere new occasion" required/>
    </form>
</div>

<script type="text/javascript">
	$('.delss').click(function(){
		var id = $(this).attr('oid');
		var ot = $(this).attr('ot');
		var a = confirm("Are you sure you want to delete?");

		if(a)
			window.location.href="{{ URL::to('admin/occasions/delocc') }}?id="+id+"&ot="+ot;
	});
</script>

@endsection

@section('subnav')

	@include('admin.occasions.osubnav')

@endsection
