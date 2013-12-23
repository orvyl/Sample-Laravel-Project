@extends('admintemplate')

@section('content')
{{ Session::get('msg') }}


<div class="widget">
    <div class="whead"><h6>List of orders</h6><div class="clear"></div></div>
    <div id="dyn" class="hiddenpars">
        <a class="tOptions" title="Options"><img src="{{ URL::to('/') }}/adminpublic/images/icons/options.png" alt="" /></a>

        <table cellpadding="0" cellspacing="0" border="0" class="dTable" id="dynamic">
	        <thead>
		        <tr>
			        <th>Transaction ID</th>
			        <th>Payment type</th>
			        <th>Name</th>
			        <th>Payer ID</th>
			        <th># of items</th>
			        <th>Date of purchase</th>
			        <th>Action</th>
		        </tr>
	        </thead>
	        <tbody>
	        	@foreach($orders as $order)
			        <tr class="gradeA">
				        <td class="center">{{ $order->paypaltrans_id }}</td>
				        <td class="center">
			        		{{ $order->payment_type == 'credit_card' ? 'Credit card':'Paypal' }}
				        </td>
				        <td class="center">
				        	{{ $order->first_name }} {{ $order->last_name }}
				        </td>
				        <td class="center">{{ $order->payer_id == '' ? 'n/a':$order->payer_id }}</td>
				        <td class="center">
				        	{{ $order->numItem }}
				        </td>
				        <td class="center">{{ $order->purchaseDate }}</td>
				        <td class="tableActs">
				        	<a href="{{ URL::to('admin/orders/orderdetail/'.$order->id) }}" class="tablectrl_small bDefault tipS" title="Setting"><span class="iconb" data-icon="&#xe1f7;"></span></a>
	                    </td>
			        </tr>
			    @endforeach
	        </tbody>
        </table> 
    </div>

    <div class="clear"></div> 
</div>

<!-- <div class="btns">
	<a href="#" class="buttonL bGreen updorder1">Update order</a>
    <a href="#" class="buttonL bGreen" id="formDialog1_open">Add occasion here</a>
</div> -->

@endsection

@section('subnav')

	@include('admin.registry.rsubnav')

@endsection
