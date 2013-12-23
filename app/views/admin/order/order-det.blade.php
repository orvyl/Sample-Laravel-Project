@extends('admintemplate')

@section('content')
{{ Session::get('msg') }}

<div class="widget">
	<div class="whead"><h6>Order detail</h6><div class="clear"></div></div>

    <div class="formRow">
        <div class="grid3">
            <label><b>Transaction ID:</b> {{ $order->paypaltrans_id }}</label>
        </div>
        <div class="clear"></div>
    </div>
    <div class="formRow">
        <div class="grid3"><label><b>Name:</b> {{ $order->first_name }} {{ $order->last_name }}</label></div>
        <div class="clear"></div>
    </div>
    <div class="formRow">
        <div class="grid3"><label><b>Email:</b> <a href="mailto:{{ User::find($order->user_id)->email }}">{{ User::find($order->user_id)->email }}</a></label></div>
        <div class="clear"></div>
    </div>
    <div class="formRow">
        <div class="grid3">
            <label><b>Payment type:</b> {{ $order->payment_type == 'credit_card' ? 'Credit card':'Paypal' }}</label>
        </div>
        <div class="clear"></div>
    </div>
    <div class="formRow">
        <div class="grid3">
        	<label><b>Payer ID:</b> {{ $order->payer_id == '' ? 'n/a':$order->payer_id }}</label>
        </div>
        <div class="clear"></div>
    </div>

    <div class="formRow">
        <div class="grid3">
        	<label><b>Date of purchase:</b> {{ $order->created_at }}</label>
        </div>
        <div class="clear"></div>
    </div>
    <div class="formRow">
        <div class="grid3">
            <label><b>Total:</b> $ {{ Order::getTotalAmountItem($order->id) }}</label>
            <div class="clear"></div>
            <label><b>Store Credit:</b> ($ {{ $order->store_credit }})</label>
            <div class="clear"></div>
            <!-- <label><b>Voucher:</b> ($ 00.00) - code: 46hewbwyyfy68ji0iO</label>
            <div class="clear"></div> -->
        	<label><b>SUB TOTAL:</b> $ {{ $order->total }}</label>
        </div>
        <div class="clear"></div>
    </div>
</div>

<div class="widget">
    <div class="whead"><h6>Items</h6><div class="clear"></div></div>
    <div id="dyn" class="hiddenpars">
        <a class="tOptions" title="Options"><img src="{{ URL::to('/') }}/adminpublic/images/icons/options.png" alt="" /></a>

        <table cellpadding="0" cellspacing="0" border="0" class="dTable" id="dynamic">
	        <thead>
		        <tr>
			        <th>Name</th>
			        <th>Quantity</th>
			        <th>Unit price</th>
			        <th>Total</th>
		        </tr>
	        </thead>
	        <tbody>
                @foreach($orderProd as $prod)

                <tr class="gradeA">
                    <td class="center">{{ $prod->product_name }}</td>
                    <td class="center">
                        {{ $prod->quantity }}
                    </td>
                    <td class="center">
                        {{ $prod->price }}
                    </td>
                    <td class="center">{{ $prod->price * $prod->quantity }}</td>
                </tr>

                @endforeach

	        </tbody>
        </table> 
    </div>
    <div class="clear"></div> 
</div>

<div class="btns">
	<a href="#" class="buttonL bRed">Delete order</a>
</div>

@endsection

@section('subnav')

	@include('admin.registry.rsubnav')

@endsection
